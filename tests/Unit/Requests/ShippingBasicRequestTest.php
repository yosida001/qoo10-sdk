<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\GetShippingAndClaimInfoByOrderNoV2Request;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\GetShippingInfoLogisticsRequest;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\GetShippingInfoV3Request;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSellerCheckYnBulkRequest;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSellerCheckYnV2Request;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSendingInfoBulkRequest;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSendingInfoRequest;

class ShippingBasicRequestTest extends TestCase
{
    /**
     * @dataProvider requestProvider
     */
    public function testItMapsInputValuesAndKeepsMissingParametersAsEmptyStrings(string $className, array $input, array $expectedKeys): void
    {
        $request = new $className($input);

        $this->assertSame($expectedKeys, array_keys($request->toArray()));
        $this->assertSame(array_replace(array_fill_keys($expectedKeys, ''), $input), $request->toArray());
    }

    public function testItRejectsUnknownParameters(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new GetShippingInfoV3Request([
            'UnknownParameter' => 'value',
        ]);
    }

    public function requestProvider(): array
    {
        return [
            'get shipping info v3' => [
                GetShippingInfoV3Request::class,
                [
                    'ShippingStatus' => '1',
                    'SearchStartDate' => '2026-01-01',
                ],
                [
                    'ShippingStatus',
                    'SearchStartDate',
                    'SearchEndDate',
                    'SearchCondition',
                ],
            ],
            'set seller check yn v2' => [
                SetSellerCheckYnV2Request::class,
                [
                    'OrderNo' => 'O-1',
                    'DelayType' => 'D',
                ],
                [
                    'OrderNo',
                    'EstShipDt',
                    'DelayType',
                    'DelayMemo',
                ],
            ],
            'set seller check yn bulk' => [
                SetSellerCheckYnBulkRequest::class,
                [
                    'SendPlanDtInfoJson' => '[]',
                ],
                [
                    'SendPlanDtInfoJson',
                ],
            ],
            'set sending info' => [
                SetSendingInfoRequest::class,
                [
                    'OrderNo' => 'O-2',
                    'TrackingNo' => 'TRK',
                ],
                [
                    'OrderNo',
                    'ShippingCorp',
                    'TrackingNo',
                ],
            ],
            'set sending info bulk' => [
                SetSendingInfoBulkRequest::class,
                [
                    'ShippingInfoJson' => '[]',
                ],
                [
                    'ShippingInfoJson',
                ],
            ],
            'get shipping and claim info by order no v2' => [
                GetShippingAndClaimInfoByOrderNoV2Request::class,
                [
                    'OrderNo' => 'O-3',
                ],
                [
                    'OrderNo',
                ],
            ],
            'get shipping info logistics' => [
                GetShippingInfoLogisticsRequest::class,
                [
                    'ShippingStatus' => '2',
                ],
                [
                    'ShippingStatus',
                    'SearchStartDate',
                    'SearchEndDate',
                    'SearchCondition',
                    'ReceiverInfoEditYN',
                ],
            ],
        ];
    }
}
