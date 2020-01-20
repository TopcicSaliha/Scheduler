<?php
namespace App\Controller\Api;

use App\Model\Entity\Scheduler;
use Cake\I18n\Time;
use Cake\ORM\Locator\TableLocator;

/**
 * Schedulers Controller
 *
 * @property \App\Model\Table\SchedulersTable $Schedulers
 *
 * @method \App\Model\Entity\Scheduler[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class SchedulersController extends ApiController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function add() {

        $scheduler = $this->Schedulers->newEntity($this->request->getData());

        $scheduler->user_id = $this->Auth->user('id');
        $time = $this->request->getData('time');
        $date = $this->request->getData('date');
        $scheduler->start_on = date('Y-m-d H:i:s', strtotime("$date $time"));
        $scheduler->model_id = $this->request->getQuery('id');
        $scheduler->model = $this->request->getQuery('model');

        if(!$this->Schedulers->save($scheduler)) {
            return $this->response->withStatus(400)->withType('json')->withStringBody(json_encode($scheduler->getErrors()));
        }
        return $this->response->withStatus(204 );
    }
}
