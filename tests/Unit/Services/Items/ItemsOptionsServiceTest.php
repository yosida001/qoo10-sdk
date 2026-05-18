<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services\Items;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\DeleteInventoryDataUnitRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\EditGoodsInventoryRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\EditGoodsOptionRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\EditGoodsTextOptionRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\InsertInventoryDataUnitRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\UpdateInventoryDataUnitRequest;
use Yosida001\Qoo10Sdk\Services\ItemsOptionsService;

class ItemsOptionsServiceTest extends TestCase
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

        $service = new ItemsOptionsService($requester);

        $this->assertSame('ok', $service->{$method}($request));
    }

    public function serviceProvider(): array
    {
        return [
            'edit goods inventory' => [
                'editGoodsInventory',
                EditGoodsInventoryRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                    'InventoryInfo' => '[]',
                ],
                'ItemsOptions.EditGoodsInventory',
                '1.0',
            ],
            'edit goods text option' => [
                'editGoodsTextOption',
                EditGoodsTextOptionRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'TextOptions' => '[]',
                ],
                'ItemsOptions.EditGoodsTextOption',
                '1.0',
            ],
            'edit goods option' => [
                'editGoodsOption',
                EditGoodsOptionRequest::class,
                [
                    'ItemCode' => 'ITEM-3',
                    'AdditionalOptions' => '[]',
                ],
                'ItemsOptions.EditGoodsOption',
                '1.0',
            ],
            'delete inventory data unit' => [
                'deleteInventoryDataUnit',
                DeleteInventoryDataUnitRequest::class,
                [
                    'ItemCode' => 'ITEM-4',
                    'OptionCode' => 'OPT-1',
                ],
                'ItemsOptions.DeleteInventoryDataUnit',
                '1.0',
            ],
            'insert inventory data unit' => [
                'insertInventoryDataUnit',
                InsertInventoryDataUnitRequest::class,
                [
                    'ItemCode' => 'ITEM-5',
                    'OptionCode' => 'OPT-2',
                    'Price' => '100',
                    'Qty' => '3',
                ],
                'ItemsOptions.InsertInventoryDataUnit',
                '1.0',
            ],
            'update inventory data unit' => [
                'UpdateInventoryDataUnit',
                UpdateInventoryDataUnitRequest::class,
                [
                    'ItemCode' => 'ITEM-6',
                    'OptionCode' => 'OPT-3',
                    'Price' => '120',
                    'Qty' => '10',
                ],
                'ItemsOptions.UpdateInventoryDataUnit',
                '1.0',
            ],
        ];
    }
}
