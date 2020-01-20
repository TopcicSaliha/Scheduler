<?php
namespace App\Controller\Api;




use App\Model\Entity\User;
use Cake\Mailer\Email;
use Cake\ORM\Locator\TableLocator;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends ApiController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login', 'token', 'register', 'setPassword', 'resetPassword', 'verify']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        return $this->response->withType('json')->withStringBody(json_encode($users));
    }

    public function register()
    {
        try {

            $this->request->allowMethod('post');
            $newUser = $this->Users->newEntity($this->request->getData());
            $newUser->is_active = User::INACTIVE;
            $newUser->confirm_password = $this->request->getData('confirm_password');
            $newUser->reset_password_token = substr(number_format(time() * rand(),0,'',''),0,6);

            if (!$this->Users->save($newUser)) {
                throw new \Exception(json_encode($newUser->getErrors()));
            }

            $email = new Email('default');
            $email->setFrom('internship@wecastdemo.com')
                ->setTo($newUser->email)
                ->setSubject('Activation code')
                ->send('Your activation code is:' . ' ' . $newUser->reset_password_token);

            return $this->response->withStatus(204 );

        } catch (\Exception $ex) {
            return $this->response->withStatus(400 )->withType('json')->withStringBody($ex->getMessage());
        }
    }

    public function resetPassword()
    {
        try {

            $this->request->allowMethod('post');
            $user = $this->Users->find()->where(['email' => $this->request->getData('email')])->first();

            if(!$user){
                throw new \Exception('Please check your email.');
            }
            $user->reset_password_token = substr(number_format(time() * rand(),0,'',''),0,6);

            if(!(new TableLocator)->get('Users')->save($user)){
                throw new \Exception(json_encode($user->getErrors()));
            }
            $email = new Email('default');
            $email->setFrom('internship@wecastdemo.com')
                ->setTo($user->email)
                ->setSubject('Reset password')
                ->send('Your confirmation code is:' . ' ' . $user->reset_password_token);

            return $this->response->withStatus(204 );

        } catch (\Exception $ex) {
            return $this->response->withStatus(400 )->withType('json')->withStringBody($ex->getMessage());
        }
    }

    public function setPassword()
    {
        $this->request->allowMethod('post');
        $user = $this->Users->find()->where(['reset_password_token' => $this->request->getData('token')])->first();

        if (!$user) {
            return $this->response->withStatus(400, 'The user token could not be found');
        }

        $user->confirm_password = $this->request->getData('confirm_password');
        $user->password = $this->request->getData('password');
        $user->reset_password_token = '';

        $this->Users->patchEntity($user, $this->request->getData());

        if(!$this->Users->save($user)) {
            return $this->response->withStatus(400)->withType('json')->withStringBody(json_encode($user->getErrors()));
        }

        return $this->response->withStatus(204 );
    }

    public function verify()
    {
        $this->request->allowMethod('post');
        $user = $this->Users->find()->where(['reset_password_token' => $this->request->getData('activation_code')])->first();

        if (!$user) {
            return $this->response->withStatus(400, 'The activation code you entered does not match');
        }

        $user->is_active = User::ACTIVE;

        if(!$this->Users->save($user)) {
            return $this->response->withStatus(400)->withType('json')->withStringBody(json_encode($user->getErrors()));
        }

        return $this->response->withStatus(204 );
    }

    public function login()
    {
        $this->request->allowMethod('post');
        $user = $this->Auth->identify();

        if (!$user) {
            return $this->response->withStatus(400, 'Invalid username or password');
        }

        $token = JWT::encode([
            'sub' => $user['id'],
            'exp' =>  time() + 604800
        ],
            Security::getSalt());

        return $this->response->withType('json')->withStringBody(json_encode(['token' => $token]));
    }
}


