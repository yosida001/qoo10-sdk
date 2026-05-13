<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\EditGoodsOrderLimitRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\EditMoveGoodsPriceRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\SetGoodsPriceQtyBulkRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\SetGoodsPriceQtyRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\UpdateItemDiscountRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\UpdateMoveItemDiscountRequest;

class ItemsOrderRequestTest extends TestCase
{
    /**
     * @dataProvider requestProvider
     */
    public function testItMapsInputValuesAndKeepsMissingParametersAsEmptyStrings(string $className, array $input, array $expected): void
    {
        $request = new $className($input);

        $this->assertSame($expected, $request->toArray());
    }

    public function testItRejectsUnknownParameters(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new SetGoodsPriceQtyRequest([
            'UnknownParameter' => 'value',
        ]);
    }

    public function requestProvider(): array
    {
        return [
            'set goods price qty' => [
                SetGoodsPriceQtyRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                    'SellerCode' => 'SELLER-1',
                    'Price' => '1000',
                    'Qty' => '5',
                ],
                [
                    'ItemCode' => 'ITEM-1',
                    'SellerCode' => 'SELLER-1',
                    'Price' => '1000',
                    'TaxRate' => '',
                    'Qty' => '5',
                    'ExpireDate' => '',
                ],
            ],
            'update item discount' => [
                UpdateItemDiscountRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'SellerCode' => 'SELLER-2',
                    'BeginDate' => '2026-01-01',
                    'EndDate' => '2026-01-31',
                    'CostPrice' => '800',
                    'DiscountType' => '1',
                ],
                [
                    'ItemCode' => 'ITEM-2',
                    'SellerCode' => 'SELLER-2',
                    'BeginDate' => '2026-01-01',
                    'EndDate' => '2026-01-31',
                    'CostPrice' => '800',
                    'DiscountType' => '1',
                ],
            ],
            'edit goods order limit' => [
                EditGoodsOrderLimitRequest::class,
                [
                    'ItemCode' => 'ITEM-3',
                    'SellerCode' => 'SELLER-3',
                    'LimitType' => '1',
                    'LimitCnt' => '3',
                    'EndDate' => '2026-01-31',
                ],
                [
                    'ItemCode' => 'ITEM-3',
                    'SellerCode' => 'SELLER-3',
                    'LimitType' => '1',
                    'LimitCnt' => '3',
                    'EndDate' => '2026-01-31',
                ],
            ],
            'set goods price qty bulk' => [
                SetGoodsPriceQtyBulkRequest::class,
                [
                    'ItemInfoJson' => '[{"ItemCode":"ITEM-4","Price":"1200"}]',
                ],
                [
                    'ItemInfoJson' => '[{"ItemCode":"ITEM-4","Price":"1200"}]',
                ],
            ],
            'edit move goods price' => [
                EditMoveGoodsPriceRequest::class,
                [
                    'ItemCode' => 'ITEM-5',
                    'SellerCode' => 'SELLER-5',
                    'ItemPrice' => '1500',
                ],
                [
                    'ItemCode' => 'ITEM-5',
                    'SellerCode' => 'SELLER-5',
                    'ItemPrice' => '1500',
                ],
            ],
            'update move item discount' => [
                UpdateMoveItemDiscountRequest::class,
                [
                    'ItemCode' => 'ITEM-6',
                    'SellerCode' => 'SELLER-6',
                    'BeginDate' => '2026-02-01',
                    'EndDate' => '2026-02-28',
                    'CostPrice' => '900',
                    'DiscountType' => '2',
                ],
                [
                    'ItemCode' => 'ITEM-6',
                    'SellerCode' => 'SELLER-6',
                    'BeginDate' => '2026-02-01',
                    'EndDate' => '2026-02-28',
                    'CostPrice' => '900',
                    'DiscountType' => '2',
                ],
            ],
        ];
    }
}
