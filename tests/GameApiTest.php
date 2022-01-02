<?php

use Humble23\CartolaFcClient\Tests\ApiMocker;

it('can test', function () {
    expect(true)->toBeTrue();
});

it('can check if is game over', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->game()->isGameOver();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartolafc.globo.com/mercado/status');

    expect($value)->toBeBool();
});

it('can check current game round', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->game()->currentRound();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartolafc.globo.com/mercado/status');

    expect($value)->toBeInt();
});

it('can check game rounds', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $value = $client->game()->rounds();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartolafc.globo.com/rodadas');
});

it('can check game round', function () {
    $round = rand(1, 38);
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $client->game()->round($round);

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartolafc.globo.com/rodadas/' . $round);
});

it('can check game clubs', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $client->game()->clubs();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartolafc.globo.com/clubs');
});

it('can check game sponsors', function () {
    $apiMocker = (new ApiMocker());
    $client = $apiMocker->getMockClient();
    $client->game()->sponsors();

    expect($apiMocker->getLastRequest()->getUri()->__toString())
        ->toBe('https://api.cartolafc.globo.com/patrocinadores');
});
