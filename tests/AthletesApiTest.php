<?php

use Humble23\CartolaFcClient\Tests\ApiMocker;

it('can list athletes market', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->athletes()->market();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartola.globo.com/atletas/mercado');

    expect($value)->toBeJson();
});

it('can list athletes score', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->athletes()->score();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartola.globo.com/atletas/pontuados');

    expect($value)->toBeJson();
});
