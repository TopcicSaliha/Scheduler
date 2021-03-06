<?php
namespace App\Controller;


/**
 * Actors Controller
 *
 * @property \App\Model\Table\ActorsTable $Actors
 *
 * @method \App\Model\Entity\Actor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActorsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $actors = $this->paginate($this->Actors);

        $this->set(compact('actors'));
    }

    /**
     * View method
     *
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actor = $this->Actors->get($id, [
            'contain' => []
        ]);

        $this->set('actor', $actor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actor = $this->Actors->newEntity();
        if ($this->request->is('post')) {
            $actor = $this->Actors->patchEntity($actor, $this->request->getData());
            if ($this->Actors->save($actor)) {
                $this->Flash->success(__('The actor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actor could not be saved. Please, try again.'));
        }
        $this->set(compact('actor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actor = $this->Actors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actor = $this->Actors->patchEntity($actor, $this->request->getData());
            if ($this->Actors->save($actor)) {
                $this->Flash->success(__('The actor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actor could not be saved. Please, try again.'));
        }
        $this->set(compact('actor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $actor = $this->Actors->get($id);
        if ($this->Actors->delete($actor)) {
            $this->Flash->success(__('The actor has been deleted.'));
        } else {
            $this->Flash->error(__('The actor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
