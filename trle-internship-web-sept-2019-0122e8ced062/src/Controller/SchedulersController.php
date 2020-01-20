<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Schedulers Controller
 *
 * @property \App\Model\Table\SchedulersTable $Schedulers
 *
 * @method \App\Model\Entity\Scheduler[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchedulersController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $schedulers = $this->paginate($this->Schedulers);

        $this->set(compact('schedulers'));
    }

    /**
     * View method
     *
     * @param string|null $id Scheduler id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scheduler = $this->Schedulers->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('scheduler', $scheduler);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scheduler = $this->Schedulers->newEntity();
        if ($this->request->is('post')) {
            $scheduler = $this->Schedulers->patchEntity($scheduler, $this->request->getData());
            if ($this->Schedulers->save($scheduler)) {
                $this->Flash->success(__('The scheduler has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheduler could not be saved. Please, try again.'));
        }

        $users = $this->Schedulers->Users->find('list', ['limit' => 200]);
        $this->set(compact('scheduler', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scheduler id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scheduler = $this->Schedulers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheduler = $this->Schedulers->patchEntity($scheduler, $this->request->getData());
            if ($this->Schedulers->save($scheduler)) {
                $this->Flash->success(__('The scheduler has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheduler could not be saved. Please, try again.'));
        }
        $users = $this->Schedulers->Users->find('list', ['limit' => 200]);
        $this->set(compact('scheduler', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scheduler id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scheduler = $this->Schedulers->get($id);
        if ($this->Schedulers->delete($scheduler)) {
            $this->Flash->success(__('The scheduler has been deleted.'));
        } else {
            $this->Flash->error(__('The scheduler could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
