<?php

namespace Humble23\CartolaFcClient;

use GuzzleHttp\Client;
use Humble23\CartolaFcClient\Api\Athletes;
use Humble23\CartolaFcClient\Api\Game;
use Humble23\CartolaFcClient\Api\Leagues;
use Humble23\CartolaFcClient\Api\Market;
use Humble23\CartolaFcClient\Api\Teams;

class CartolaClient
{
    protected const BASE_URI = 'https://api.cartola.globo.com';

    /** @var Client */
    private $httpClient;

    /** @var ResponseInterface|null */
    protected $lastResponse;
    protected $responseType;

    public function __construct($responseType = 'array', $client = null)
    {
        $this->httpClient = $client ?? new Client([
            'base_uri' => self::BASE_URI,
        ]);
        $this->responseType = $responseType;
    }

    public function getHttpClient()
    {
        return $this->httpClient;
    }

    public function setLastResponse($response)
    {
        $this->lastResponse = $response;
    }

    public function setResponseType($responseType)
    {
        $this->responseType = $responseType;
    }

    public function getResponseType()
    {
        return $this->responseType;
    }

    public function market()
    {
        return (new Market($this));
    }

    public function teams()
    {
        return (new Teams($this));
    }

    public function game()
    {
        return (new Game($this));
    }

    public function leagues()
    {
        return (new Leagues($this));
    }

    public function athletes()
    {
        return (new Athletes($this));
    }
}
