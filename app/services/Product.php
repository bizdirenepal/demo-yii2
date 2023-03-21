<?php

namespace app\services;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

/**
 * This is the model class for API product".
 *
 */
class Product extends Component
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
            ->setUrl('products/' . $id)
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch product.');
        }
        return $response->data;
    }

    public function fetchAll(array $data)
    {
        $response = $this->getClient()->createRequest()
            ->setMethod('GET')
            ->setUrl('products')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch product.');
        }
        return $response->data;
    }

    public function create(array $data)
    {
        $response = $this->getClient()->createRequest()
            ->setMethod('POST')
            ->setUrl('products')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to create product.');
        }
        return $response->data;
    }

    public function update(int $id, array $data)
    {
        $response = $this->getClient()->createRequest()
            ->setMethod('PUT')
            ->setUrl('products/' . $id)
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_AUTH_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to update product.');
        }
        return $response->data;
    }
}
