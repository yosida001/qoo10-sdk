<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Qoo10Client;
use Yosida001\Qoo10Sdk\Services\Certification\CertificationAPIService;
use Yosida001\Qoo10Sdk\Services\ClaimService;
use Yosida001\Qoo10Sdk\Services\CommonInfoLookupService;
use Yosida001\Qoo10Sdk\Services\CSCenterService;
use Yosida001\Qoo10Sdk\Services\Items\ItemsBasicService;
use Yosida001\Qoo10Sdk\Services\Items\ItemsContentsService;
use Yosida001\Qoo10Sdk\Services\Items\ItemsLookupService;
use Yosida001\Qoo10Sdk\Services\Items\ItemsOptionsService;
use Yosida001\Qoo10Sdk\Services\Items\ItemsOrderService;
use Yosida001\Qoo10Sdk\Services\ShippingBasicService;
use Yosida001\Qoo10Sdk\ValueObjects\ReturnType;

class Qoo10ClientTest extends TestCase
{
    public function testItBuildsTheCertificationService(): void
    {
        $client = new Qoo10Client(new Config('cert-key', ReturnType::json()));

        $service = $client->certification();

        $this->assertInstanceOf(CertificationAPIService::class, $service);
    }

    public function testItCreatesTheRequesterFromTheProvidedConfig(): void
    {
        $config = new Config('cert-key', ReturnType::xml());
        $requester = $this->createMock(Requester::class);
        $client = new TestableQoo10Client($config, $requester);

        $this->assertSame($config, $client->capturedConfig);
        $this->assertSame($requester, $client->capturedRequester);
    }

    public function testItBuildsTheItemsServices(): void
    {
        $client = new Qoo10Client(new Config('cert-key', ReturnType::json()));

        $this->assertInstanceOf(ItemsBasicService::class, $client->itemsBasic());
        $this->assertInstanceOf(ItemsLookupService::class, $client->itemsLookup());
        $this->assertInstanceOf(ItemsOrderService::class, $client->itemsOrderService());
        $this->assertInstanceOf(ItemsOptionsService::class, $client->itemsOptionsService());
        $this->assertInstanceOf(ItemsContentsService::class, $client->itemsContentsService());
        $this->assertInstanceOf(ClaimService::class, $client->claim());
        $this->assertInstanceOf(CommonInfoLookupService::class, $client->commonInfoLookup());
        $this->assertInstanceOf(CSCenterService::class, $client->csCenter());
        $this->assertInstanceOf(ShippingBasicService::class, $client->shippingBasic());
    }
}

class TestableQoo10Client extends Qoo10Client
{
    /** @var Config */
    public $capturedConfig;

    /** @var Requester */
    public $capturedRequester;

    private $requester;

    public function __construct(Config $config, Requester $requester)
    {
        $this->requester = $requester;
        parent::__construct($config);
    }

    protected function createRequester(Config $config): Requester
    {
        $this->capturedConfig = $config;
        $this->capturedRequester = $this->requester;

        return $this->requester;
    }
}
