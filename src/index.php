<?php

require_once 'vendor/autoload.php';

use Humble23\CartolaFcClient\CartolaClient;

$client = new CartolaClient('xml');
dd($client->market()->status());
