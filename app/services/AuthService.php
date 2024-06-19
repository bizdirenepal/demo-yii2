<?php

namespace app\services;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

/**
 * This is the model class for API "auth".
 */
class AuthService extends Component
{
    /**
     * Client client
     */
    private $_client;

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->_client = new Client([
            'baseUrl' => getenv('API_URL'),
            'requestConfig' => [
                'format' => Client::FORMAT_JSON
            ],
            'responseConfig' => [
                'format' => Client::FORMAT_JSON
            ],
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
    }

    /**
     * Fetch user details
     */
    public function fetch()
    {
        $data = Yii::$app->cache->getOrSet('profile', function () {
            $response = $this->_client->createRequest()
                ->setMethod('POST')
                ->setUrl('profile/me?expand=business,items')
                ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
                ->send();
            if (!$response->isOk) {
                throw new \Exception('Unable to fetch product.');
            }
            return $response->data;
        });

        return $data;
    }

    /**
     * Login client
     */
    public function login(array $data)
    {
        $response = $this->_client->createRequest()->setMethod('POST')->setUrl('auth/login')->setData($data)->send();

        if (!$response->isOk) {
            throw new \Exception('Unable to login user.');
        }
        return $response->data;
    }

    /**
     * Signup client
     */
    public function signup(array $data)
    {
        $response = $this->_client->createRequest()->setMethod('POST')->setUrl('auth/signup')->setData($data)->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to register user.');
        }
        return $response->data;
    }
}
