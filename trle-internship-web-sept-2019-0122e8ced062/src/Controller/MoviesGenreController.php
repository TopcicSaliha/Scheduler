<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MoviesGenre Controller
 *
 * @property \App\Model\Table\MoviesGenreTable $MoviesGenre
 *
 * @method \App\Model\Entity\MoviesGenre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoviesGenreController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Genres', 'Movies']
        ];
        $moviesGenre = $this->paginate($this->MoviesGenre);

        $this->set(compact('moviesGenre'));
    }

    /**
     * View method
     *
     * @param string|null $id Movies Genre id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moviesGenre = $this->MoviesGenre->get($id, [
            'contain' => ['Genres', 'Movies']
        ]);

        $this->set('moviesGenre', $moviesGenre);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moviesGenre = $this->MoviesGenre->newEntity();
        if ($this->request->is('post')) {
            $moviesGenre = $this->MoviesGenre->patchEntity($moviesGenre, $this->request->getData());
            if ($this->MoviesGenre->save($moviesGenre)) {
                $this->Flash->success(__('The movies genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movies genre could not be saved. Please, try again.'));
        }
        $genres = $this->MoviesGenre->Genres->find('list', ['limit' => 200]);
        $movies = $this->MoviesGenre->Movies->find('list', ['limit' => 200]);
        $this->set(compact('moviesGenre', 'genres', 'movies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movies Genre id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moviesGenre = $this->MoviesGenre->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moviesGenre = $this->MoviesGenre->patchEntity($moviesGenre, $this->request->getData());
            if ($this->MoviesGenre->save($moviesGenre)) {
                $this->Flash->success(__('The movies genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movies genre could not be saved. Please, try again.'));
        }
        $genres = $this->MoviesGenre->Genres->find('list', ['limit' => 200]);
        $movies = $this->MoviesGenre->Movies->find('list', ['limit' => 200]);
        $this->set(compact('moviesGenre', 'genres', 'movies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movies Genre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moviesGenre = $this->MoviesGenre->get($id);
        if ($this->MoviesGenre->delete($moviesGenre)) {
            $this->Flash->success(__('The movies genre has been deleted.'));
        } else {
            $this->Flash->error(__('The movies genre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
