<?php

namespace Humble23\CartolaFcClient\Api;

use Closure;
use GuzzleHttp\Exception\RequestException;
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
        try {
            $response = $this->client->getHttpClient()->request('GET', $uri, [
                'query' => $query,
            ]);
        } catch (RequestException $e) {
            if ($e->hasResponse()){
                $response = $e->getResponse();
            }
        } catch (\Exception $e) {

        }
        $this->client->setLastResponse($response);
        $response = (new ResponseTransform($this->client))
            ->transform($response->getBody()->getContents());

        return $response;
    }

    public function withTemporaryReturnType(Closure $callback, $type = 'array')
    {
        $lastResponseType = $this->client->getResponseType();
        $this->client->setResponseType($type);
        $return = $callback($this);
        $this->client->setResponseType($lastResponseType);

        return $return;
    }
}
