<?php
namespace App\Controller\Api;

use App\Model\Entity\Genre;

/**
 * Genres Controller
 *
 * @property \App\Model\Table\GenresTable $Genres
 *
 * @method \App\Model\Entity\Genre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class GenresController extends ApiController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $genres = $this->paginate($this->Genres);

        return $this->response->withType('json')->withStringBody(json_encode($genres));

    }
}
