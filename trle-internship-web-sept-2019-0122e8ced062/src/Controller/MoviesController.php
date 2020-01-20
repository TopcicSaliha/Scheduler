<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\Locator\TableLocator;
use Cake\ORM\TableRegistry;

/**
 * Movies Controller
 *
 * @property \App\Model\Table\MoviesTable $Movies
 *
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoviesController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Genres']
        ];

        $movies = $this->paginate($this->Movies);

        $this->set(compact('movies'));
    }

    /**
     * View method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movie = $this->Movies->get($id, [
            'contain' => ['Genres']
        ]);

        $this->set('movie', $movie);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movie = $this->Movies->newEntity();

        if ($this->request->is('post')) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            $moviesGenresTable = TableRegistry::getTableLocator()->get('MoviesGenre');

            try {
                $conn = ConnectionManager::get('default');
                $conn->begin();

                if (!$this->Movies->save($movie)) {
                    throw new \Cake\Core\Exception\Exception(json_encode($movie->getErrors()));
                }

                $movieGenre = $moviesGenresTable->newEntity([
                    'movies_id' => $movie->id,
                    'genres_id' => $this->request->getData('genre')

                ]);

                if(!$moviesGenresTable->save($movieGenre)){
                    throw new \Cake\Core\Exception\Exception(json_encode($moviesGenresTable->getErrors()));
                }
                $conn->commit();
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);

            } catch (\Cake\Core\Exception\Exception $ex) {
                $conn->rollback();
                $this->Flash->error($ex->getMessage());
            }
        }
        $genres = $this->Movies->Genres->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'genres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movie = $this->Movies->get($id, [
        'contain' => ['Genres']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            $moviesGenresTable = TableRegistry::getTableLocator()->get('MoviesGenre');

            try {

                $conn = ConnectionManager::get('default');
                $conn->begin();

                if (!$this->Movies->save($movie)) {
                    throw new \Cake\Core\Exception\Exception(json_encode($movie->getErrors()));
                }

                $moviesGenre = $moviesGenresTable->deleteAll(['movies_id' => $movie->id]);

                $movieGenre = $moviesGenresTable->newEntity([
                    'movies_id' => $movie->id,
                    'genres_id' => $this->request->getData('genre')

                ]);

                if(!$moviesGenresTable->save($movieGenre)){
                    throw new \Cake\Core\Exception\Exception(json_encode($moviesGenresTable->getErrors()));
                }

                $conn->commit();
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);

            } catch (\Cake\Core\Exception\Exception $ex) {
                $conn->rollback();
                $this->Flash->error($ex->getMessage());
            }
        }
        $genres = $this->Movies->Genres->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'genres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $movie = $this->Movies->get($id);
        if ($this->Movies->delete($movie)) {
            $this->Flash->success(__('The movie has been deleted.'));
        } else {
            $this->Flash->error(__('The movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
