<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services\Items;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetAllGoodsInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetGoodsInventoryInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetGoodsOptionInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetItemDetailInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetSellerDeliveryGroupInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\RequestFileDownloadRequest;
use Yosida001\Qoo10Sdk\Services\ItemsLookupService;

class ItemsLookupServiceTest extends TestCase
{
    private const BASE_URI = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi/';

    /**
     * @dataProvider serviceProvider
     */
    public function testItForwardsTheRequestToRequester(
        string $method,
        string $requestClass,
        array $input,
        string $apiMethod,
        string $version
    ): void {
        $request = new $requestClass($input);
        $requester = $this->createMock(Requester::class);
        $expectedParams = $request->toArray();

        $requester->expects($this->once())
            ->method('getBaseUri')
            ->willReturn(self::BASE_URI);
        $requester->expects($this->once())
            ->method('postRequest')
            ->with(self::BASE_URI, $apiMethod, $version, $expectedParams)
            ->willReturn('ok');

        $service = new ItemsLookupService($requester);

        $this->assertSame('ok', $service->{$method}($request));
    }

    public function serviceProvider(): array
    {
        return [
            'get goods option info' => [
                'getGoodsOptionInfo',
                GetGoodsOptionInfoRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                    'SellerCode' => 'SELLER-1',
                ],
                'ItemsLookup.GetGoodsOptionInfo',
                '1.0',
            ],
            'get goods inventory info' => [
                'getGoodsInventoryInfo',
                GetGoodsInventoryInfoRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'SellerCode' => 'SELLER-2',
                ],
                'ItemsLookup.GetGoodsInventoryInfo',
                '1.0',
            ],
            'get seller delivery group info' => [
                'getSellerDeliveryGroupInfo',
                GetSellerDeliveryGroupInfoRequest::class,
                [],
                'ItemsLookup.GetSellerDeliveryGroupInfo',
                '1.0',
            ],
            'get item detail info' => [
                'getItemDetailInfo',
                GetItemDetailInfoRequest::class,
                [
                    'ItemCode' => 'ITEM-3',
                    'SellerCode' => 'SELLER-3',
                ],
                'ItemsLookup.GetItemDetailInfo',
                '1.2',
            ],
            'get all goods info' => [
                'getAllGoodsInfo',
                GetAllGoodsInfoRequest::class,
                [
                    'ItemStatus' => 'ONSALE',
                    'Page' => '1',
                ],
                'ItemsLookup.GetAllGoodsInfo',
                '1.0',
            ],
            'request file download' => [
                'requestFileDownload',
                RequestFileDownloadRequest::class,
                [
                    'apply_type' => '1',
                    'email' => 'example@example.com',
                ],
                'ItemsLookup.RequestFileDownload',
                '1.0',
            ],
        ];
    }
}
