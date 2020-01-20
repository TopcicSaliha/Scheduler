<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * TvShows Controller
 *
 * @property \App\Model\Table\TvShowsTable $TvShows
 *
 * @method \App\Model\Entity\TvShow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TvShowsController extends AdminController
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

        $tvShows = $this->paginate($this->TvShows);

        $this->set(compact('tvShows'));
    }

    /**
     * View method
     *
     * @param string|null $id Tv Show id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tvShow = $this->TvShows->get($id, [
            'contain' => ['Genres']
        ]);

        $this->set('tvShow', $tvShow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tvShow = $this->TvShows->newEntity();

        if ($this->request->is('post')) {
            $tvShow = $this->TvShows->patchEntity($tvShow, $this->request->getData());
            $tvShowsGenresTable = TableRegistry::getTableLocator()->get('TvShowsGenre');


            try {
                $conn = ConnectionManager::get('default');
                $conn->begin();

                if (!$this->TvShows->save($tvShow)) {
                    throw new \Cake\Core\Exception\Exception(json_encode($tvShow->getErrors()));
                }

                $tvShowGenre = $tvShowsGenresTable->newEntity([
                    'tv_shows_id' =>  $tvShow->id,
                    'genres_id' => $this->request->getData('genre')
                ]);

                if(!$tvShowsGenresTable->save($tvShowGenre)){
                    throw new \Cake\Core\Exception\Exception(json_encode($tvShowGenre->getErrors()));
                }
                $conn->commit();
                $this->Flash->success(__('The tv show has been saved.'));

                return $this->redirect(['action' => 'index']);

            }catch (\Cake\Core\Exception\Exception $ex) {
                $conn->rollback();
                $this->Flash->error($ex->getMessage());
            }
        }

        $genres = $this->TvShows->Genres->find('list', ['limit' => 200]);
        $this->set(compact('tvShow', 'genres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tv Show id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tvShow = $this->TvShows->get($id, [
            'contain' => ['Genres']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $tvShow = $this->TvShows->patchEntity($tvShow, $this->request->getData());
            $tvShowsGenresTable = TableRegistry::getTableLocator()->get('TvShowsGenre');

            try {

                $conn = ConnectionManager::get('default');
                $conn->begin();

                if (!$this->TvShows->save($tvShow)) {
                    throw new \Cake\Core\Exception\Exception(json_encode($tvShow->getErrors()));
                }

              $tvShowsGenre = $tvShowsGenresTable->deleteAll(['tv_shows_id' => $tvShow->id]);

                $tvShowGenre = $tvShowsGenresTable->newEntity([
                    'tv_shows_id' => $tvShow->id,
                    'genres_id' => $this->request->getData('genre')
                ]);

                if (!$tvShowsGenresTable->save($tvShowGenre)) {
                    throw new \Cake\Core\Exception\Exception(json_encode($tvShowGenre->getErrors()));
                }

                $conn->commit();
                $this->Flash->success(__('The tv show has been saved.'));

                return $this->redirect(['action' => 'index']);

            } catch (\Cake\Core\Exception\Exception $ex) {
                $conn->rollback();
                $this->Flash->error($ex->getMessage());
            }
        }
        $genres = $this->TvShows->Genres->find('list', ['limit' => 200]);
        $this->set(compact('tvShow', 'genres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tv Show id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $tvShow = $this->TvShows->get($id);
        if ($this->TvShows->delete($tvShow)) {
            $this->Flash->success(__('The tv show has been deleted.'));
        } else {
            $this->Flash->error(__('The tv show could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
