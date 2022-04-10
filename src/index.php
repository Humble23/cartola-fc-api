<?php

require_once 'vendor/autoload.php';

use Humble23\CartolaFcClient\CartolaClient;

$client = new CartolaClient('array');
dd($client->teams()->athletes(253539194));
