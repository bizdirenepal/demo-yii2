<?php

namespace app\services;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

/**
 * This is the model class for API "user".
 */
class User extends Component
{
    private $_client;

    public function getClient()
    {
        if (!is_object($this->_client)) {
            $this->_client = new Client([
                'baseUrl' => getenv('API_ENDPOINT'),
                'requestConfig' => [
                    'format' => Client::FORMAT_JSON
                ],
                'responseConfig' => [
                    'format' => Client::FORMAT_JSON
                ],
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
        }
        return $this->_client;
    }

    public function fetch()
    {
        $response = $this->getClient()->createRequest()
            ->setMethod('POST')
            ->setUrl('profile/me?expand=business,items')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch product.');
        }
        return $response->data;
    }

    public function login(array $data)
    {
        $response = $this->getClient()->createRequest()->setMethod('POST')->setUrl('auth/login')->setData($data)->send();

        if (!$response->isOk) {
            throw new \Exception('Unable to login user.');
        }
        return $response->data;
    }

    public function sugnup(array $data)
    {
        $response = $this->getClient()->createRequest()->setMethod('POST')->setUrl('auth/signup')->setData($data)->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to register user.');
        }
        return $response->data;
    }
}
