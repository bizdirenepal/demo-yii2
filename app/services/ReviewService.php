<?php

namespace app\services;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

/**
 * This is the model class for API review".
 *
 */
class ReviewService extends Component
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

    public function findOne(int $id)
    {
        $response = $this->_client->createRequest()
            ->setMethod('GET')
            ->setUrl('business-reviews/' . $id)
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch product.');
        }
        return $response->data;
    }

    public function findAll(array $data)
    {
        $response = $this->_client->createRequest()
            ->setMethod('GET')
            ->setUrl('business-reviews')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch product.');
        }
        return $response->data;
    }

    public function create(array $data)
    {
        $response = $this->_client->createRequest()
            ->setMethod('POST')
            ->setUrl('business-reviews')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to create product.');
        }
        return $response->data;
    }

    public function update(int $id, array $data)
    {
        $response = $this->_client->createRequest()
            ->setMethod('PUT')
            ->setUrl('business-reviews/' . $id)
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to update product.');
        }
        return $response->data;
    }
}
