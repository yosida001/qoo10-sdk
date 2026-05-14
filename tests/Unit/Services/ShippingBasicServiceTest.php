<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\GetShippingAndClaimInfoByOrderNoV2Request;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\GetShippingInfoLogisticsRequest;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\GetShippingInfoV3Request;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSellerCheckYnBulkRequest;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSellerCheckYnV2Request;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSendingInfoBulkRequest;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSendingInfoRequest;
use Yosida001\Qoo10Sdk\Services\ShippingBasicService;

class ShippingBasicServiceTest extends TestCase
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
        $service = new ShippingBasicService($requester);
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
            'get shipping info v3' => [
                'getShippingInfo_v3',
                GetShippingInfoV3Request::class,
                [
                    'ShippingStatus' => '1',
                    'SearchStartDate' => '2026-01-01',
                ],
                'ShippingBasic.GetShippingInfo_v3',
            ],
            'set seller check yn v2' => [
                'setSellerCheckYN_V2',
                SetSellerCheckYnV2Request::class,
                [
                    'OrderNo' => 'O-1',
                    'DelayType' => 'D',
                ],
                'ShippingBasic.SetSellerCheckYN_V2',
            ],
            'set seller check yn bulk' => [
                'setSellerCheckYNBulk',
                SetSellerCheckYnBulkRequest::class,
                [
                    'SendPlanDtInfoJson' => '[]',
                ],
                'ShippingBasic.SetSellerCheckYNBulk',
            ],
            'set sending info' => [
                'setSendingInfo',
                SetSendingInfoRequest::class,
                [
                    'OrderNo' => 'O-2',
                    'TrackingNo' => 'TRK',
                ],
                'ShippingBasic.SetSendingInfo',
            ],
            'set sending info bulk' => [
                'setSendingInfoBulk',
                SetSendingInfoBulkRequest::class,
                [
                    'ShippingInfoJson' => '[]',
                ],
                'ShippingBasic.SetSendingInfoBulk',
            ],
            'get shipping and claim info by order no v2' => [
                'getShippingAndClaimInfoByOrderNo_V2',
                GetShippingAndClaimInfoByOrderNoV2Request::class,
                [
                    'OrderNo' => 'O-3',
                ],
                'ShippingBasic.GetShippingAndClaimInfoByOrderNo_V2',
            ],
            'get shipping info logistics' => [
                'GetShippingInfo_Logistics',
                GetShippingInfoLogisticsRequest::class,
                [
                    'ShippingStatus' => '2',
                ],
                'ShippingBasic.GetShippingInfo_Logistics',
            ],
        ];
    }
}
