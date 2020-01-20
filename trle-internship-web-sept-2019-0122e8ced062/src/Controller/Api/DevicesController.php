<?php
namespace App\Controller\Api;

use App\Model\Entity\Device;

/**
 * Devices Controller
 *
 * @property \App\Model\Table\DevicesTable $Devices
 *
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class DevicesController extends ApiController
{
    public function add()
    {
        $device = $this->Devices->newEntity($this->request->getData());

        $device->user_id = $this->Auth->user('id');
        $device->device_number = $this->request->getData('device');
        $device->token = $this->request->getData('token');

        if(!$this->Devices->save($device)) {
            return $this->response->withStatus(400)->withType('json')->withStringBody(json_encode($device->getErrors()));
        }
        return $this->response->withStatus(204);
    }
}
