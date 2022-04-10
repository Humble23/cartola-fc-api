<?php

use Humble23\CartolaFcClient\Tests\ApiMocker;

it('can list all teams', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->teams()->all();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartola.globo.com/times');

    expect($value)->toBeJson();
});

it('can find a team', function () {
    $apiMocker = (new ApiMocker());
    $slug = 'teste';
    $client = $apiMocker->getMockClient();
    $value = $client->teams()->find($slug);

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe("https://api.cartola.globo.com/times?q=$slug");

    expect($value)->toBeJson();
});

it('can find team athletes', function () {
    $apiMocker = (new ApiMocker());
    $slug = 'teste';
    $client = $apiMocker->getMockClient();
    $value = $client->teams()->athletes($slug);

    expect($value)->toBeJson();
});
