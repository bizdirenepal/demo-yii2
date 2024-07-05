<?php

namespace app\services;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

/**
 * This is the model class for API business".
 *
 */
class BusinessService extends Component
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
            ->setUrl(array_merge(['businesses/' . $id], $data))
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch business.');
        }
        return $response->data;
    }

    public function findAll(array $data)
    {
        $response = $this->_client->createRequest()
            ->setMethod('GET')
            ->setUrl('businesses')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to fetch business.');
        }
        return $response->data;
    }

    public function create(array $data)
    {
        $response = $this->_client->createRequest()
            ->setMethod('POST')
            ->setUrl('businesses')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to create business.');
        }
        return $response->data;
    }

    public function update(int $id, array $data)
    {
        $response = $this->_client->createRequest()
            ->setMethod('PUT')
            ->setUrl('businesses/' . $id)
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to update business.');
        }
        return $response->data;
    }

    /**
     * Save business contact
     */
    public function saveContact(array $data)
    {
        $response = $this->_client->createRequest()
            ->setMethod('POST')
            ->setUrl('business-contacts')
            ->setHeaders(['Authorization' => 'Bearer ' . getenv('API_KEY')])
            ->setData($data)
            ->send();
        if (!$response->isOk) {
            throw new \Exception('Unable to send message business.');
        }
        return $response->getBody()->getContents();
    }
}
