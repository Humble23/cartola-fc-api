<?php

use Humble23\CartolaFcClient\Tests\ApiMocker;

it('Can list all teams', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->teams()->all();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartolafc.globo.com/times?q=');

    expect($value)->toBeJson();
});

it('Can find a team', function () {
    $apiMocker = (new ApiMocker());
    $slug = 'teste';
    $client = $apiMocker->getMockClient();
    $value = $client->teams()->find($slug);

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe("https://api.cartolafc.globo.com/times/$slug/");

    expect($value)->toBeJson();
});
