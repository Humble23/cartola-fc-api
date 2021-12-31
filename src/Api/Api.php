<?php

namespace Humble23\CartolaFcClient\Api;

use Humble23\CartolaFcClient\CartolaClient;
use Humble23\CartolaFcClient\Utils\ResponseTransform;

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
        $response = (new ResponseTransform($this->client))
            ->transform($response->getBody()->getContents());

        return $response;
    }
}
