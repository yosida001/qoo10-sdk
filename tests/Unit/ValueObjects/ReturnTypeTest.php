<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\ValueObjects;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\ValueObjects\ReturnType;

class ReturnTypeTest extends TestCase
{
    public function testJsonReturnType(): void
    {
        $returnType = ReturnType::json();

        $this->assertTrue($returnType->isJson());
        $this->assertSame('json', $returnType->forGet());
        $this->assertSame('application/json', $returnType->forPost());
    }

    public function testXmlReturnType(): void
    {
        $returnType = ReturnType::xml();

        $this->assertFalse($returnType->isJson());
        $this->assertSame('xml', $returnType->forGet());
        $this->assertSame('text/xml', $returnType->forPost());
    }
}
