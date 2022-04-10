<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Humble23\CartolaFcClient\CartolaClient;

function mockApiClient()
{
    $history = Middleware::history($container);
    $stack = HandlerStack::create();
    $stack->push($history);

    $clientHttp = new Client(['base_uri' => 'https://api.cartola.globo.com', 'handler' => $stack]);

    return (new CartolaClient('json', $clientHttp));
}
