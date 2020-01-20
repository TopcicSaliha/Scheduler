<?php
namespace App\Controller\Api;

use App\Components\Notification;
use App\Model\Entity\Movie;
use Cake\Core\Configure;

/**
 * Movies Controller
 *
 * @property \App\Model\Table\MoviesTable $Movies
 *
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class MoviesController extends ApiController
{
    public function index()
    {
        $join = [];
        if($this->request->getQuery('genre_ids')) {
            $join[] = [
                    'table' => 'movies_genre',
                    'alias' => 'MoviesGenre',
                    'type' => 'inner',
                    'conditions' => [
                            'Movies.id = MoviesGenre.movies_id',
                            'MoviesGenre.genres_id IN (' . $this->request->getQuery('genre_ids') . ')'
                    ]
                 ];
        }
        $this->paginate = [
            'join' => $join,
        ];
        $movies = $this->paginate($this->Movies);

        return $this->response->withType('json')->withStringBody(json_encode($movies));
    }

    public function view($id)
    {
        $movie =  $this->Movies->get($id, [
            'contain' => ['Genres']
        ]);

        return $this->response->withType('json')->withStringBody(json_encode($movie));
    }
}
