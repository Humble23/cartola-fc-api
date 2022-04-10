<?php

use Humble23\CartolaFcClient\Tests\ApiMocker;

it('Can list all leagues', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->leagues()->all();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartola.globo.com/ligas?q=');

    expect($value)->toBeJson();
});
