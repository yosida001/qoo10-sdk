<?php

namespace Yosida001\Qoo10Sdk;

use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Services\Certification\CertificationAPIService;
use Yosida001\Qoo10Sdk\Services\ItemService;
use Yosida001\Qoo10Sdk\Services\OrderService;
use Yosida001\Qoo10Sdk\Services\ShippingService;

class Qoo10Client
{
    private $requester;

    public function __construct(Config $config)
    {
        $this->requester = new Requester($config);
    }

    public function certification()
    {
        return new CertificationAPIService($this->requester);
    }

    public function items()
    {
        return new ItemService($this->requester);
    }

    public function orders()
    {
        return new OrderService($this->requester);
    }

    public function shipping()
    {
        return new ShippingService($this->requester);
    }
}