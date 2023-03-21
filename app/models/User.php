<?php

namespace app\models;

use Yii;
use yii\httpclient\Client;

Class User extends \yii\base\Model
{
    public $id;
    public $username;
    public $auth_key;
    public $email;
    public $password_hash;

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $client = new Client([
            'baseUrl' => getenv('API_ENDPOINT'),
            'requestConfig' => [
                'format' => Client::FORMAT_JSON
            ],
            'responseConfig' => [
                'format' => Client::FORMAT_JSON
            ],
            'transport' => 'yii\httpclient\CurlTransport'
        ]);

        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('auth/check')
            ->setData(['username' => $username])
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch product.');
        }
        return $response->data['user'];
    }

}