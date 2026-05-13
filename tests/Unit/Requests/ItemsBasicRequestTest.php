<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\EditGoodsStatusRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\EditItemConditionRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\SetGoodsSubDeliveryGroupRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\SetNewGoodsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\SetNewMoveGoodsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\UpdateGoodsRequest;

class ItemsBasicRequestTest extends TestCase
{
    /**
     * @dataProvider requestProvider
     */
    public function testItMapsInputValuesAndKeepsMissingParametersAsEmptyStrings(string $className, array $input): void
    {
        $request = new $className($input);
        $parameterNames = $this->getParameterNames($request);
        $result = $request->toArray();

        $this->assertSame($parameterNames, array_keys($result));

        foreach ($parameterNames as $name) {
            if (array_key_exists($name, $input)) {
                $this->assertSame($input[$name], $result[$name]);
                continue;
            }

            $this->assertSame('', $result[$name]);
        }
    }

    public function testItRejectsUnknownParameters(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new SetNewGoodsRequest([
            'UnknownParameter' => 'value',
        ]);
    }

    public function requestProvider(): array
    {
        return [
            'set new goods' => [
                SetNewGoodsRequest::class,
                [
                    'SellerCode' => 'SELLER-1',
                    'ItemTitle' => 'Sample item',
                ],
            ],
            'set new move goods' => [
                SetNewMoveGoodsRequest::class,
                [
                    'SellerCode' => 'SELLER-2',
                    'ItemSeriesName' => 'Series name',
                    'ShippingName' => 'Courier',
                ],
            ],
            'update goods' => [
                UpdateGoodsRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                    'SellerCode' => 'SELLER-3',
                    'RetailPrice' => '1200',
                ],
            ],
            'set goods sub delivery group' => [
                SetGoodsSubDeliveryGroupRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'AddSRcode1' => 'SUB-1',
                ],
            ],
            'edit goods status' => [
                EditGoodsStatusRequest::class,
                [
                    'ItemCode' => 'ITEM-3',
                    'Status' => '2',
                ],
            ],
            'edit item condition' => [
                EditItemConditionRequest::class,
                [
                    'ItemCode' => 'ITEM-4',
                    'UseCondition' => '1',
                ],
            ],
        ];
    }

    /**
     * @param object $request
     * @return array<int, string>
     */
    private function getParameterNames($request): array
    {
        $reflection = new ReflectionClass($request);
        $method = $reflection->getMethod('getParameterNames');
        $method->setAccessible(true);

        return $method->invoke($request);
    }
}
