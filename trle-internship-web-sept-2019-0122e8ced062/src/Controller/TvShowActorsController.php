<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TvShowActors Controller
 *
 * @property \App\Model\Table\TvShowActorsTable $TvShowActors
 *
 * @method \App\Model\Entity\TvShowActor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TvShowActorsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Actors', 'TvShows']
        ];
        $tvShowActors = $this->paginate($this->TvShowActors);

        $this->set(compact('tvShowActors'));
    }

    /**
     * View method
     *
     * @param string|null $id Tv Show Actor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tvShowActor = $this->TvShowActors->get($id, [
            'contain' => ['Actors', 'TvShows']
        ]);

        $this->set('tvShowActor', $tvShowActor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tvShowActor = $this->TvShowActors->newEntity();
        if ($this->request->is('post')) {
            $tvShowActor = $this->TvShowActors->patchEntity($tvShowActor, $this->request->getData());
            if ($this->TvShowActors->save($tvShowActor)) {
                $this->Flash->success(__('The tv show actor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tv show actor could not be saved. Please, try again.'));
        }
        $actors = $this->TvShowActors->Actors->find('list', ['limit' => 200]);
        $tvShows = $this->TvShowActors->TvShows->find('list', ['limit' => 200]);
        $this->set(compact('tvShowActor', 'actors', 'tvShows'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tv Show Actor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tvShowActor = $this->TvShowActors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tvShowActor = $this->TvShowActors->patchEntity($tvShowActor, $this->request->getData());
            if ($this->TvShowActors->save($tvShowActor)) {
                $this->Flash->success(__('The tv show actor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tv show actor could not be saved. Please, try again.'));
        }
        $actors = $this->TvShowActors->Actors->find('list', ['limit' => 200]);
        $tvShows = $this->TvShowActors->TvShows->find('list', ['limit' => 200]);
        $this->set(compact('tvShowActor', 'actors', 'tvShows'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tv Show Actor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tvShowActor = $this->TvShowActors->get($id);
        if ($this->TvShowActors->delete($tvShowActor)) {
            $this->Flash->success(__('The tv show actor has been deleted.'));
        } else {
            $this->Flash->error(__('The tv show actor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
