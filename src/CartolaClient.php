<?php

namespace Humble23\CartolaFcClient;

use GuzzleHttp\Client;

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
}
