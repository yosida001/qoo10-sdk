<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\DeleteInventoryDataUnitRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\EditGoodsInventoryRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\EditGoodsOptionRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\EditGoodsTextOptionRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\InsertInventoryDataUnitRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\UpdateInventoryDataUnitRequest;

class ItemsOptionsRequestTest extends TestCase
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

        new EditGoodsInventoryRequest([
            'UnknownParameter' => 'value',
        ]);
    }

    public function requestProvider(): array
    {
        return [
            'edit goods inventory' => [
                EditGoodsInventoryRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                    'InventoryInfo' => '[]',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'InventoryInfo',
                ],
            ],
            'edit goods text option' => [
                EditGoodsTextOptionRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'TextOptions' => '[]',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'TextOptions',
                ],
            ],
            'edit goods option' => [
                EditGoodsOptionRequest::class,
                [
                    'ItemCode' => 'ITEM-3',
                    'AdditionalOptions' => '[]',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'AdditionalOptions',
                ],
            ],
            'delete inventory data unit' => [
                DeleteInventoryDataUnitRequest::class,
                [
                    'ItemCode' => 'ITEM-4',
                    'OptionCode' => 'OPT-1',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'OptionName',
                    'OptionValue',
                    'OptionCode',
                ],
            ],
            'insert inventory data unit' => [
                InsertInventoryDataUnitRequest::class,
                [
                    'ItemCode' => 'ITEM-5',
                    'OptionCode' => 'OPT-2',
                    'Price' => '100',
                    'Qty' => '3',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'OptionName',
                    'OptionValue',
                    'OptionCode',
                    'Price',
                    'Qty',
                ],
            ],
            'update inventory data unit' => [
                UpdateInventoryDataUnitRequest::class,
                [
                    'ItemCode' => 'ITEM-6',
                    'OptionCode' => 'OPT-3',
                    'Price' => '120',
                    'Qty' => '10',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'OptionName',
                    'OptionValue',
                    'OptionCode',
                    'Price',
                    'Qty',
                ],
            ],
        ];
    }
}
