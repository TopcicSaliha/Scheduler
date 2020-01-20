<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MovieActors Controller
 *
 * @property \App\Model\Table\MovieActorsTable $MovieActors
 *
 * @method \App\Model\Entity\MovieActor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovieActorsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Actors', 'Movies']
        ];
        $movieActors = $this->paginate($this->MovieActors);

        $this->set(compact('movieActors'));
    }

    /**
     * View method
     *
     * @param string|null $id Movie Actor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movieActor = $this->MovieActors->get($id, [
            'contain' => ['Actors', 'Movies']
        ]);

        $this->set('movieActor', $movieActor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movieActor = $this->MovieActors->newEntity();
        if ($this->request->is('post')) {
            $movieActor = $this->MovieActors->patchEntity($movieActor, $this->request->getData());
            if ($this->MovieActors->save($movieActor)) {
                $this->Flash->success(__('The movie actor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie actor could not be saved. Please, try again.'));
        }
        $actors = $this->MovieActors->Actors->find('list', ['limit' => 200]);
        $movies = $this->MovieActors->Movies->find('list', ['limit' => 200]);
        $this->set(compact('movieActor', 'actors', 'movies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie Actor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movieActor = $this->MovieActors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movieActor = $this->MovieActors->patchEntity($movieActor, $this->request->getData());
            if ($this->MovieActors->save($movieActor)) {
                $this->Flash->success(__('The movie actor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie actor could not be saved. Please, try again.'));
        }
        $actors = $this->MovieActors->Actors->find('list', ['limit' => 200]);
        $movies = $this->MovieActors->Movies->find('list', ['limit' => 200]);
        $this->set(compact('movieActor', 'actors', 'movies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie Actor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movieActor = $this->MovieActors->get($id);
        if ($this->MovieActors->delete($movieActor)) {
            $this->Flash->success(__('The movie actor has been deleted.'));
        } else {
            $this->Flash->error(__('The movie actor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
