<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services\Items;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\EditGoodsOrderLimitRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\EditMoveGoodsPriceRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\SetGoodsPriceQtyBulkRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\SetGoodsPriceQtyRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\UpdateItemDiscountRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\UpdateMoveItemDiscountRequest;
use Yosida001\Qoo10Sdk\Services\Items\ItemsOrderService;

class ItemsOrderServiceTest extends TestCase
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
        $service = new ItemsOrderService($requester);
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
            'set goods price qty' => [
                'setGoodsPriceQty',
                SetGoodsPriceQtyRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                    'SellerCode' => 'SELLER-1',
                    'Price' => '1000',
                    'Qty' => '5',
                ],
                'ItemsOrder.SetGoodsPriceQty',
                '1.0',
            ],
            'update item discount' => [
                'updateItemDiscount',
                UpdateItemDiscountRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'SellerCode' => 'SELLER-2',
                    'BeginDate' => '2026-01-01',
                    'EndDate' => '2026-01-31',
                    'CostPrice' => '800',
                    'DiscountType' => '1',
                ],
                'ItemsOrder.UpdateItemDiscount',
                '1.0',
            ],
            'edit goods order limit' => [
                'editGoodsOrderLimit',
                EditGoodsOrderLimitRequest::class,
                [
                    'ItemCode' => 'ITEM-3',
                    'SellerCode' => 'SELLER-3',
                    'LimitType' => '1',
                    'LimitCnt' => '3',
                    'EndDate' => '2026-01-31',
                ],
                'ItemsOrder.EditGoodsOrderLimit',
                '1.0',
            ],
            'set goods price qty bulk' => [
                'setGoodsPriceQtyBulk',
                SetGoodsPriceQtyBulkRequest::class,
                [
                    'ItemInfoJson' => '[{"ItemCode":"ITEM-4","Price":"1200"}]',
                ],
                'ItemsOrder.SetGoodsPriceQtyBulk',
                '1.0',
            ],
            'edit move goods price' => [
                'editMoveGoodsPrice',
                EditMoveGoodsPriceRequest::class,
                [
                    'ItemCode' => 'ITEM-5',
                    'SellerCode' => 'SELLER-5',
                    'ItemPrice' => '1500',
                ],
                'ItemsOrder.EditMoveGoodsPrice',
                '1.0',
            ],
            'update move item discount' => [
                'updateMoveItemDiscount',
                UpdateMoveItemDiscountRequest::class,
                [
                    'ItemCode' => 'ITEM-6',
                    'SellerCode' => 'SELLER-6',
                    'BeginDate' => '2026-02-01',
                    'EndDate' => '2026-02-28',
                    'CostPrice' => '900',
                    'DiscountType' => '2',
                ],
                'ItemsOrder.UpdateMoveItemDiscount',
                '1.0',
            ],
        ];
    }
}
