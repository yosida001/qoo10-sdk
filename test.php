<?php

require 'vendor/autoload.php';

use Yosida001\Qoo10Sdk\Qoo10Client;

$client = new Qoo10Client('dummy-api-key');

//var_dump($client);
var_dump($client->items());
var_dump($client->orders());
var_dump($client->shipping());