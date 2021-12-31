<?php

namespace Humble23\CartolaFcClient\Api;

use Humble23\CartolaFcClient\CartolaClient;

class Api
{
    /** @var CartolaClient */
    protected $client;

    public function __construct(CartolaClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $uri
     * @param array $query
     * @return array
     * @throws Exception
     */
    public function get(string $uri, array $query = [])
    {
        $response = $this->client->getHttpClient()->request('GET', $uri, [
            'query' => $query,
        ]);
        $this->client->setLastResponse($response);

        return $response->getBody()->getContents();
    }
}
