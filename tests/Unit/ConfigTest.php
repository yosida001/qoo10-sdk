<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\ValueObjects\ReturnType;

class ConfigTest extends TestCase
{
    public function testItExposesTheConfiguredValues(): void
    {
        $config = new Config('cert-key', ReturnType::json());

        $this->assertSame('cert-key', $config->getCertificationKey());
        $this->assertSame(30, $config->getTimeout());
        $this->assertFalse($config->isDebug());
        $this->assertSame('yosida001/qoo10-sdk', $config->getUserAgent());
        $this->assertSame('json', $config->getReturnType('GET'));
        $this->assertSame('application/json', $config->getReturnType('POST'));
        $this->assertSame('application/json', $config->getReturnType('PUT'));
        $this->assertTrue($config->isReturnTypeJson());
    }

    public function testItSupportsXmlReturnType(): void
    {
        $config = new Config('cert-key', ReturnType::xml(), 10, true, 'custom-agent');

        $this->assertSame(10, $config->getTimeout());
        $this->assertTrue($config->isDebug());
        $this->assertSame('custom-agent', $config->getUserAgent());
        $this->assertSame('xml', $config->getReturnType('GET'));
        $this->assertSame('text/xml', $config->getReturnType('POST'));
        $this->assertFalse($config->isReturnTypeJson());
    }
}
