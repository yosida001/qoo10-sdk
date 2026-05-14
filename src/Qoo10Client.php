<?php

namespace Yosida001\Qoo10Sdk;

use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Services\CertificationAPIService;
use Yosida001\Qoo10Sdk\Services\ClaimService;
use Yosida001\Qoo10Sdk\Services\CommonInfoLookupService;
use Yosida001\Qoo10Sdk\Services\CSCenterService;
use Yosida001\Qoo10Sdk\Services\ItemsBasicService;
use Yosida001\Qoo10Sdk\Services\ItemsContentsService;
use Yosida001\Qoo10Sdk\Services\ItemsLookupService;
use Yosida001\Qoo10Sdk\Services\ItemsOptionsService;
use Yosida001\Qoo10Sdk\Services\ItemsOrderService;
use Yosida001\Qoo10Sdk\Services\ShippingBasicService;

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

    public function itemsContentsService(): ItemsContentsService
    {
        return new ItemsContentsService($this->requester);
    }

    public function claim(): ClaimService
    {
        return new ClaimService($this->requester);
    }

    public function commonInfoLookup(): CommonInfoLookupService
    {
        return new CommonInfoLookupService($this->requester);
    }

    public function csCenter(): CSCenterService
    {
        return new CSCenterService($this->requester);
    }

    public function shippingBasic(): ShippingBasicService
    {
        return new ShippingBasicService($this->requester);
    }
}
