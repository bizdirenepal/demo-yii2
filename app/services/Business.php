<?php

namespace app\services;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

/**
 * This is the model class for API business".
 *
 */
class Business extends Component
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

    public function fetchOne(int $id)
    {
        $response = $this->getClient()->createRequest()
            ->setMethod('GET')
            ->setUrl('businesses/' . $id)
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch business.');
        }
        return $response->data;
    }

    public function fetchAll(array $data)
    {
        $response = $this->getClient()->createRequest()
            ->setMethod('GET')
            ->setUrl('businesses')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch business.');
        }
        return $response->data;
    }

    public function create(array $data)
    {
        $response = $this->getClient()->createRequest()
            ->setMethod('POST')
            ->setUrl('businesses')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to create business.');
        }
        return $response->data;
    }

    public function update(int $id, array $data)
    {
        $response = $this->getClient()->createRequest()
            ->setMethod('PUT')
            ->setUrl('businesses/' . $id)
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to update business.');
        }
        return $response->data;
    }
}
