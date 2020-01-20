<?php

namespace App\Components;

use Cake\Core\Configure;
use Exception;
use GuzzleHttp\Client;

class Notification implements NotificationInterface
{
    protected $url;
    protected $key;
    protected $errorMessage;

    public function __construct() {
        $FirebaseConfData = Configure::read('Firebase');
        $this->url = $FirebaseConfData['url'];
        $this->key = $FirebaseConfData['key'];
    }

    public function send(string $to, array $message): bool
    {
        try {
            $body = [
                'data' => $message,
                'to' => $to
            ];

            $response = (new Client())->request('POST', $this->url, [
                'headers' => [
                    'Authorization' => "key={$this->key}",
                    'Content-Type' => 'application/json'
                ],
                'json' => $body
            ]);

            $content = json_decode($response->getBody()->getContents(), true);
            if(!is_array($content) || !isset($content['success'])) {
                throw new Exception('No array or key found');
            }

            $success = $content['success'];
            if($success == 0) {
                throw new Exception('Unsuccessful noitification');
            }
            return true;
        } catch (Exception $ex) {
            $this->errorMessage = $ex->getMessage();
            return  false;
        }
    }
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}
