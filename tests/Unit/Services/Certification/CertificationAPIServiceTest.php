<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services\Certification;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Services\Certification\CertificationAPIService;

class CertificationAPIServiceTest extends TestCase
{
    private const BASE_URI = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    public function testItForwardsCreateCertificationKeyToRequester(): void
    {
        $requester = $this->createMock(Requester::class);
        $service = new CertificationAPIService($requester);

        $requester->expects($this->once())
            ->method('postRequest')
            ->with(
                self::BASE_URI,
                'CertificationAPI.CreateCertificationKey',
                '1.0',
                [
                    'userId' => 'user-1',
                    'pwd' => 'secret',
                ]
            )
            ->willReturn('ok');

        $this->assertSame('ok', $service->createCertificationKey('user-1', 'secret'));
    }
}
