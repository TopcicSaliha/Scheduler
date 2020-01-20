<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EpisodeRatings Controller
 *
 * @property \App\Model\Table\EpisodeRatingsTable $EpisodeRatings
 *
 * @method \App\Model\Entity\EpisodeRating[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodeRatingsController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Episodes']
        ];
        $episodeRatings = $this->paginate($this->EpisodeRatings);

        $this->set(compact('episodeRatings'));
    }

    /**
     * View method
     *
     * @param string|null $id Episode Rating id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $episodeRating = $this->EpisodeRatings->get($id, [
            'contain' => ['Users', 'Episodes']
        ]);

        $this->set('episodeRating', $episodeRating);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $episodeRating = $this->EpisodeRatings->newEntity();
        if ($this->request->is('post')) {
            $episodeRating = $this->EpisodeRatings->patchEntity($episodeRating, $this->request->getData());
            if ($this->EpisodeRatings->save($episodeRating)) {
                $this->Flash->success(__('The episode rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode rating could not be saved. Please, try again.'));
        }
        $users = $this->EpisodeRatings->Users->find('list', ['limit' => 200]);
        $episodes = $this->EpisodeRatings->Episodes->find('list', ['limit' => 200]);
        $this->set(compact('episodeRating', 'users', 'episodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episode Rating id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $episodeRating = $this->EpisodeRatings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episodeRating = $this->EpisodeRatings->patchEntity($episodeRating, $this->request->getData());
            if ($this->EpisodeRatings->save($episodeRating)) {
                $this->Flash->success(__('The episode rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode rating could not be saved. Please, try again.'));
        }
        $users = $this->EpisodeRatings->Users->find('list', ['limit' => 200]);
        $episodes = $this->EpisodeRatings->Episodes->find('list', ['limit' => 200]);
        $this->set(compact('episodeRating', 'users', 'episodes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episode Rating id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $episodeRating = $this->EpisodeRatings->get($id);
        if ($this->EpisodeRatings->delete($episodeRating)) {
            $this->Flash->success(__('The episode rating has been deleted.'));
        } else {
            $this->Flash->error(__('The episode rating could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
