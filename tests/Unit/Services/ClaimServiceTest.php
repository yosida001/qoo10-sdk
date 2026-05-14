<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Requests\Claim\SetCancelProcessRequest;
use Yosida001\Qoo10Sdk\Requests\Claim\SetClaimAcceptRequest;
use Yosida001\Qoo10Sdk\Requests\Claim\SetClaimRedeliveryRequest;
use Yosida001\Qoo10Sdk\Services\ClaimService;

class ClaimServiceTest extends TestCase
{
    private const BASE_URI = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    /**
     * @dataProvider serviceProvider
     */
    public function testItForwardsTheRequestToRequester(
        string $method,
        string $requestClass,
        array $input,
        string $apiMethod
    ): void {
        $request = new $requestClass($input);
        $requester = $this->createMock(Requester::class);
        $service = new ClaimService($requester);
        $expectedParams = $request->toArray();

        $requester->expects($this->once())
            ->method('postRequest')
            ->with(self::BASE_URI, $apiMethod, '1.0', $expectedParams)
            ->willReturn('ok');

        $this->assertSame('ok', $service->{$method}($request));
    }

    public function serviceProvider(): array
    {
        return [
            'set cancel process' => [
                'setCancelProcess',
                SetCancelProcessRequest::class,
                [
                    'ContrNo' => 'C-1',
                    'CancelReason' => 'reason',
                ],
                'Claim.SetCancelProcess',
            ],
            'set claim accept' => [
                'setClaimAccept',
                SetClaimAcceptRequest::class,
                [
                    'orderNo' => 'O-1',
                    'seller_name' => 'seller',
                ],
                'Claim.SetClaimAccept',
            ],
            'set claim redelivery' => [
                'setClaimRedelivery',
                SetClaimRedeliveryRequest::class,
                [
                    'orderNo' => 'O-2',
                    'invoice_no' => 'INV-1',
                ],
                'Claim.SetClaimRedelivery',
            ],
        ];
    }
}
