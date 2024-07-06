<?php

namespace app\services;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

/**
 * This is the model class for API product".
 *
 */
class ProductService extends Component
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
        if (!is_object($this->_client)) {
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
        return $this->_client;
    }

    public function findOne(int $id, array $data = [])
    {
        $response = $this->_client->createRequest()
            ->setMethod('GET')
            ->setUrl(array_merge(['products/' . $id], $data))
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
            ->setUrl(array_merge(['products'], $data))
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
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
            ->setUrl('products')
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
            ->setUrl('products/' . $id)
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to update product.');
        }
        return $response->data;
    }

    /**
     * Get product reviews by id
     *
     * @param int $id
     */
    public function getReviews(int $id)
    {
        $response = $this->_client->createRequest()
        ->setMethod('GET')
            ->setUrl('product-reviews' . $id)
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->setData(['product_id' => $id])
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch reviews.');
        }
        return $response->getBody()->getContents();
    }
}
