<?php
namespace App\Controller\Api;

use App\Model\Entity\TvShow;

/**
 * TvShows Controller
 *
 * @property \App\Model\Table\TvShowsTable $TvShows
 *
 * @method \App\Model\Entity\TvShow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class TvShowsController extends ApiController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $join = [];
        if ($this->request->getQuery('genre_ids')) {
            $join[] = [
                    'table' => 'tv_shows_genre',
                    'alias' => 'ShowsGenre',
                    'type' => 'inner',
                    'conditions' => [
                        'TvShows.id = ShowsGenre.tv_shows_id',
                        'ShowsGenre.genres_id IN (' . $this->request->getQuery('genre_ids') . ')'
                    ]
                ];
        }
        $this->paginate = [
            'join' => $join,
        ];
        $tvShows = $this->paginate($this->TvShows);

        return $this->response->withType('json')->withStringBody(json_encode($tvShows));

    }

    public function view($id)
    {
        $tvShow = $this->TvShows->get($id, [
            'contain' => ['Seasons', 'Genres']
        ]);

        return $this->response->withType('json')->withStringBody(json_encode($tvShow));
    }
}
