<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services\Items;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\EditGoodsStatusRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\EditItemConditionRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\SetGoodsSubDeliveryGroupRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\SetNewGoodsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\SetNewMoveGoodsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\UpdateGoodsRequest;
use Yosida001\Qoo10Sdk\Services\ItemsBasicService;

class ItemsBasicServiceTest extends TestCase
{
    private const BASE_URI = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

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
        $service = new ItemsBasicService($requester);
        $expectedParams = $request->toArray();

        $requester->expects($this->once())
            ->method('postRequest')
            ->with(self::BASE_URI, $apiMethod, $version, $expectedParams)
            ->willReturn('ok');

        $this->assertSame('ok', $service->{$method}($request));
    }

    public function serviceProvider(): array
    {
        return [
            'set new goods' => [
                'setNewGoods',
                SetNewGoodsRequest::class,
                [
                    'SellerCode' => 'SELLER-1',
                    'ItemTitle' => 'Sample item',
                ],
                'ItemsBasic.SetNewGoods',
                '1.1',
            ],
            'set new move goods' => [
                'setNewMoveGoods',
                SetNewMoveGoodsRequest::class,
                [
                    'SellerCode' => 'SELLER-2',
                    'ItemSeriesName' => 'Series name',
                ],
                'ItemsBasic.SetNewMoveGoods',
                '1.0',
            ],
            'update goods' => [
                'updateGoods',
                UpdateGoodsRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                    'RetailPrice' => '1200',
                ],
                'ItemsBasic.UpdateGoods',
                '1.1',
            ],
            'set goods sub delivery group' => [
                'SetGoodsSubDeliveryGroup',
                SetGoodsSubDeliveryGroupRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'AddSRcode1' => 'SUB-1',
                ],
                'ItemsBasic.SetGoodsSubDeliveryGroup',
                '1.0',
            ],
            'edit goods status' => [
                'editGoodsStatus',
                EditGoodsStatusRequest::class,
                [
                    'ItemCode' => 'ITEM-3',
                    'Status' => '2',
                ],
                'ItemsBasic.EditGoodsStatus',
                '1.0',
            ],
            'edit item condition' => [
                'editItemCondition',
                EditItemConditionRequest::class,
                [
                    'ItemCode' => 'ITEM-4',
                    'UseCondition' => '1',
                ],
                'ItemsBasic.EditItemCondition',
                '1.0',
            ],
        ];
    }
}
