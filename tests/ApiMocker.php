<?php

declare(strict_types=1);

namespace Humble23\CartolaFcClient\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Humble23\CartolaFcClient\CartolaClient;
use Psr\Http\Message\RequestInterface;

class ApiMocker
{
    protected const BASE_URI = 'https://api.cartola.globo.com';
    private $transactions = [];
    private $mockClient = null;

    public function getLastRequest(): ?RequestInterface
    {
        if (($count = count($this->transactions)) === 0) {
            return null;
        }

        return $this->transactions[$count - 1]['request'] ?? null;
    }

    public function getMockClient($mock = null)
    {
        $handlerStack = $mock ? HandlerStack::create($mock) : HandlerStack::create();
        $handlerStack->push(Middleware::history($this->transactions));

        $this->mockClient = new Client(['base_uri' => self::BASE_URI, 'handler' => $handlerStack]);

        return (new CartolaClient('json', $this->mockClient));
    }

    protected function tearDown(): void
    {
        $this->mockClient = null;
        $this->transactions = [];
    }
}
