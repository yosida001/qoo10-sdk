<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\Qoo10Client;
use Yosida001\Qoo10Sdk\Services\CertificationAPIService;
use Yosida001\Qoo10Sdk\Services\ItemsBasicService;
use Yosida001\Qoo10Sdk\Services\ItemsContentsService;
use Yosida001\Qoo10Sdk\Services\ItemsLookupService;
use Yosida001\Qoo10Sdk\Services\ItemsOptionsService;
use Yosida001\Qoo10Sdk\Services\ItemsOrderService;
use Yosida001\Qoo10Sdk\ValueObjects\ReturnType;

class Qoo10ClientTest extends TestCase
{
    public function testItBuildsTheCertificationService(): void
    {
        $client = new Qoo10Client(new Config('cert-key', ReturnType::json()));

        $service = $client->certification();

        $this->assertInstanceOf(CertificationAPIService::class, $service);
    }

    public function testItBuildsTheItemsServices(): void
    {
        $client = new Qoo10Client(new Config('cert-key', ReturnType::json()));

        $this->assertInstanceOf(ItemsBasicService::class, $client->itemsBasic());
        $this->assertInstanceOf(ItemsLookupService::class, $client->itemsLookup());
        $this->assertInstanceOf(ItemsOrderService::class, $client->itemsOrderService());
        $this->assertInstanceOf(ItemsOptionsService::class, $client->itemsOptionsService());
        $this->assertInstanceOf(ItemsContentsService::class, $client->itemsContentsService());
    }
}
