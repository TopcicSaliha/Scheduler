<?php
namespace App\Controller\Api;

use App\Model\Entity\Season;

/**
 * TvShows Controller
 *
 * @property \App\Model\Table\SeasonsTable $Seasons
 *
 * @method \App\Model\Entity\Season[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class SeasonsController extends ApiController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id)
    {
        $season = $this->Seasons->get($id, [
            'contain' => ['Episodes']
        ]);
        return $this->response->withType('json')->withStringBody(json_encode($season));
    }
}
