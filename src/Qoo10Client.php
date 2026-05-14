<?php

namespace Yosida001\Qoo10Sdk;

use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Services\Certification\CertificationAPIService;
use Yosida001\Qoo10Sdk\Services\Items\ItemsBasicService;
use Yosida001\Qoo10Sdk\Services\Items\ItemsLookupService;
use Yosida001\Qoo10Sdk\Services\Items\ItemsOptionsService;
use Yosida001\Qoo10Sdk\Services\Items\ItemsOrderService;

class Qoo10Client
{
    private $requester;

    public function __construct(Config $config)
    {
        $this->requester = new Requester($config);
    }

    public function certification(): CertificationAPIService
    {
        return new CertificationAPIService($this->requester);
    }

    public function itemsBasic(): ItemsBasicService
    {
        return new ItemsBasicService($this->requester);
    }

    public function itemsLookup(): ItemsLookupService
    {
        return new ItemsLookupService($this->requester);
    }

    public function itemsOrderService(): ItemsOrderService
    {
        return new ItemsOrderService($this->requester);
    }

    public function itemsOptionsService(): ItemsOptionsService
    {
        return new ItemsOptionsService($this->requester);
    }
}