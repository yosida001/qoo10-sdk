<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditAdditionalOptionImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsContentsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsHeaderFooterRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsMultiImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditInventoryImageRequest;

class ItemsContentsRequestTest extends TestCase
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

        new EditGoodsContentsRequest([
            'UnknownParameter' => 'value',
        ]);
    }

    public function requestProvider(): array
    {
        return [
            'edit goods contents' => [
                EditGoodsContentsRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                    'Contents' => '<p>body</p>',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'Contents',
                ],
            ],
            'edit goods image' => [
                EditGoodsImageRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'StandardImage' => 'https://example.com/standard.jpg',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'StandardImage',
                    'VideoURL',
                ],
            ],
            'edit goods multi image' => [
                EditGoodsMultiImageRequest::class,
                [
                    'ItemCode' => 'ITEM-3',
                    'EnlargedImage1' => 'https://example.com/1.jpg',
                    'EnlargedImage50' => 'https://example.com/50.jpg',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'EnlargedImage1',
                    'EnlargedImage2',
                    'EnlargedImage3',
                    'EnlargedImage4',
                    'EnlargedImage5',
                    'EnlargedImage6',
                    'EnlargedImage7',
                    'EnlargedImage8',
                    'EnlargedImage9',
                    'EnlargedImage10',
                    'EnlargedImage11',
                    'EnlargedImage12',
                    'EnlargedImage13',
                    'EnlargedImage14',
                    'EnlargedImage15',
                    'EnlargedImage16',
                    'EnlargedImage17',
                    'EnlargedImage18',
                    'EnlargedImage19',
                    'EnlargedImage20',
                    'EnlargedImage21',
                    'EnlargedImage22',
                    'EnlargedImage23',
                    'EnlargedImage24',
                    'EnlargedImage25',
                    'EnlargedImage26',
                    'EnlargedImage27',
                    'EnlargedImage28',
                    'EnlargedImage29',
                    'EnlargedImage30',
                    'EnlargedImage31',
                    'EnlargedImage32',
                    'EnlargedImage33',
                    'EnlargedImage34',
                    'EnlargedImage35',
                    'EnlargedImage36',
                    'EnlargedImage37',
                    'EnlargedImage38',
                    'EnlargedImage39',
                    'EnlargedImage40',
                    'EnlargedImage41',
                    'EnlargedImage42',
                    'EnlargedImage43',
                    'EnlargedImage44',
                    'EnlargedImage45',
                    'EnlargedImage46',
                    'EnlargedImage47',
                    'EnlargedImage48',
                    'EnlargedImage49',
                    'EnlargedImage50',
                ],
            ],
            'edit goods header footer' => [
                EditGoodsHeaderFooterRequest::class,
                [
                    'ItemCode' => 'ITEM-4',
                    'Header' => '<h1>header</h1>',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'EditHeaderYN',
                    'Header',
                    'EditFooterYN',
                    'Footer',
                ],
            ],
            'edit additional option image' => [
                EditAdditionalOptionImageRequest::class,
                [
                    'ItemCode' => 'ITEM-5',
                    'AdditionalOptionImage' => 'https://example.com/opt.jpg',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'AdditionalOptionImage',
                ],
            ],
            'edit inventory image' => [
                EditInventoryImageRequest::class,
                [
                    'ItemCode' => 'ITEM-6',
                    'InventoryImage' => 'https://example.com/inventory.jpg',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'InventoryImage',
                ],
            ],
        ];
    }
}
