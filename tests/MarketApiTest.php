<?php

use Humble23\CartolaFcClient\Tests\ApiMocker;

it('can list market informations', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->market()->status();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartola.globo.com/mercado/status');

    expect($value)->toBeJson();
});

it('can list market highlights', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->market()->highlights();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartola.globo.com/mercado/destaques');

    expect($value)->toBeJson();
});
