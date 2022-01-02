<?php

use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use Humble23\CartolaFcClient\CartolaClient;

function mockApiClient()
{
    $history = Middleware::history($container);
    $stack = HandlerStack::create();
    $stack->push($history);

    $clientHttp = new Client(['base_uri' => 'https://api.cartolafc.globo.com', 'handler' => $stack]);

    return (new CartolaClient('json', $clientHttp));
}
