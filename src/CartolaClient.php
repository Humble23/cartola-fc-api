<?php

namespace Humble23\CartolaFcClient;

use GuzzleHttp\Client;
use Humble23\CartolaFcClient\Api\Market;

class CartolaClient
{
    protected const BASE_URI = 'https://api.cartolafc.globo.com';

    /** @var Client */
    private $httpClient;

    /** @var ResponseInterface|null */
    protected $lastResponse;

    public function __construct($client = null)
    {
        $this->httpClient = $client ?? new Client(['base_uri' => self::BASE_URI]);
    }

    public function getHttpClient()
    {
        return $this->httpClient;
    }

    public function setLastResponse($response)
    {
        $this->lastResponse = $response;
    }

    public function market()
    {
        return (new Market($this));
    }
}
