<?php

use Humble23\CartolaFcClient\Tests\ApiMocker;

it('Can list market informations', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->market()->status();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartolafc.globo.com/mercado/status');

    expect($value)->toBeJson();
});

it('Can list market highlights', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->market()->highlights();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartolafc.globo.com/mercado/destaques');

    expect($value)->toBeJson();
});
