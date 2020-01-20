<?php
/**
 * Author: igor.golub@wetek.com
 * Date: 10/28/2019
 */

namespace App\Controller\Api;


use App\Controller\AppController;

class ApiController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);

        $this->loadComponent('Auth', [
            'storage' => 'Memory',
            'authenticate' => [
                'Form' => [
                    'scope' => ['Users.is_active' => 1],
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'userModel' => 'Users'
                ],
                'ADmad/JwtAuth.Jwt' => [
                    'parameter' => 'token',
                    'userModel' => 'Users',
                    'scope' => ['Users.is_active' => 1],
                    'fields' => [
                        'id' => 'id'
                    ],
                    'queryDatasource' => true
                ]
            ],
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Controller.initialize'
        ]);

        $this->autoRender = false;
    }
}
