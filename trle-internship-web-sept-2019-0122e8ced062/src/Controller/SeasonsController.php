<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Seasons Controller
 *
 * @property \App\Model\Table\SeasonsTable $Seasons
 *
 * @method \App\Model\Entity\Season[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SeasonsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TvShows']
        ];
        $seasons = $this->paginate($this->Seasons);

        $this->set(compact('seasons'));
    }

    /**
     * View method
     *
     * @param string|null $id Season id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $season = $this->Seasons->get($id, [
            'contain' => ['TvShows']
        ]);

        $this->set('season', $season);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $season = $this->Seasons->newEntity();
        if ($this->request->is('post')) {
            $season = $this->Seasons->patchEntity($season, $this->request->getData());
            if ($this->Seasons->save($season)) {
                $this->Flash->success(__('The season has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The season could not be saved. Please, try again.'));
        }
        $tvShows = $this->Seasons->TvShows->find('list', ['limit' => 200]);
        $this->set(compact('season', 'tvShows'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Season id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $season = $this->Seasons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $season = $this->Seasons->patchEntity($season, $this->request->getData());
            if ($this->Seasons->save($season)) {
                $this->Flash->success(__('The season has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The season could not be saved. Please, try again.'));
        }
        $tvShows = $this->Seasons->TvShows->find('list', ['limit' => 200]);
        $this->set(compact('season', 'tvShows'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Season id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $season = $this->Seasons->get($id);
        if ($this->Seasons->delete($season)) {
            $this->Flash->success(__('The season has been deleted.'));
        } else {
            $this->Flash->error(__('The season could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
