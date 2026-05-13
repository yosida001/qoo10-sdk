<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetAllGoodsInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetGoodsInventoryInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetGoodsOptionInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetItemDetailInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetSellerDeliveryGroupInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\RequestFileDownloadRequest;

class ItemsLookupRequestTest extends TestCase
{
    /**
     * @dataProvider requestProvider
     */
    public function testItMapsInputValuesAndKeepsMissingParametersAsEmptyStrings(string $className, array $input, array $expectedKeys): void
    {
        $request = new $className($input);
        $result = $request->toArray();

        $this->assertSame($expectedKeys, array_keys($result));

        foreach ($expectedKeys as $name) {
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

        new GetGoodsOptionInfoRequest([
            'UnknownParameter' => 'value',
        ]);
    }

    public function requestProvider(): array
    {
        return [
            'get goods option info' => [
                GetGoodsOptionInfoRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                ],
            ],
            'get goods inventory info' => [
                GetGoodsInventoryInfoRequest::class,
                [
                    'SellerCode' => 'SELLER-1',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                ],
            ],
            'get seller delivery group info' => [
                GetSellerDeliveryGroupInfoRequest::class,
                [],
                [],
            ],
            'get item detail info' => [
                GetItemDetailInfoRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'SellerCode' => 'SELLER-2',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                ],
            ],
            'get all goods info' => [
                GetAllGoodsInfoRequest::class,
                [
                    'Page' => '1',
                ],
                [
                    'ItemStatus',
                    'Page',
                ],
            ],
            'request file download' => [
                RequestFileDownloadRequest::class,
                [
                    'email' => 'example@example.com',
                    'target_from_dt' => '2026-01-01',
                ],
                [
                    'apply_type',
                    'email',
                    'target_from_dt',
                    'target_to_dt',
                ],
            ],
        ];
    }
}
