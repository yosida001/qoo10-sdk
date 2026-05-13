<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\Qoo10Client;
use Yosida001\Qoo10Sdk\Services\Certification\CertificationAPIService;
use Yosida001\Qoo10Sdk\ValueObjects\ReturnType;

class Qoo10ClientTest extends TestCase
{
    public function testItBuildsTheCertificationService(): void
    {
        $client = new Qoo10Client(new Config('cert-key', ReturnType::json()));

        $service = $client->certification();

        $this->assertInstanceOf(CertificationAPIService::class, $service);
    }
}
