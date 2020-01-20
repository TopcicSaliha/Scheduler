<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TvShowsGenre Controller
 *
 * @property \App\Model\Table\TvShowsGenreTable $TvShowsGenre
 *
 * @method \App\Model\Entity\TvShowsGenre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TvShowsGenreController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Genres', 'TvShows']
        ];
        $tvShowsGenre = $this->paginate($this->TvShowsGenre);

        $this->set(compact('tvShowsGenre'));
    }

    /**
     * View method
     *
     * @param string|null $id Tv Shows Genre id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tvShowsGenre = $this->TvShowsGenre->get($id, [
            'contain' => ['Genres', 'TvShows']
        ]);

        $this->set('tvShowsGenre', $tvShowsGenre);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tvShowsGenre = $this->TvShowsGenre->newEntity();
        if ($this->request->is('post')) {
            $tvShowsGenre = $this->TvShowsGenre->patchEntity($tvShowsGenre, $this->request->getData());
            if ($this->TvShowsGenre->save($tvShowsGenre)) {
                $this->Flash->success(__('The tv shows genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tv shows genre could not be saved. Please, try again.'));
        }
        $genres = $this->TvShowsGenre->Genres->find('list', ['limit' => 200]);
        $tvShows = $this->TvShowsGenre->TvShows->find('list', ['limit' => 200]);
        $this->set(compact('tvShowsGenre', 'genres', 'tvShows'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tv Shows Genre id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tvShowsGenre = $this->TvShowsGenre->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tvShowsGenre = $this->TvShowsGenre->patchEntity($tvShowsGenre, $this->request->getData());
            if ($this->TvShowsGenre->save($tvShowsGenre)) {
                $this->Flash->success(__('The tv shows genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tv shows genre could not be saved. Please, try again.'));
        }
        $genres = $this->TvShowsGenre->Genres->find('list', ['limit' => 200]);
        $tvShows = $this->TvShowsGenre->TvShows->find('list', ['limit' => 200]);
        $this->set(compact('tvShowsGenre', 'genres', 'tvShows'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tv Shows Genre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tvShowsGenre = $this->TvShowsGenre->get($id);
        if ($this->TvShowsGenre->delete($tvShowsGenre)) {
            $this->Flash->success(__('The tv shows genre has been deleted.'));
        } else {
            $this->Flash->error(__('The tv shows genre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
