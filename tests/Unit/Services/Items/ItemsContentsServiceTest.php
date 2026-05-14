<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services\Items;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditAdditionalOptionImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsContentsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsHeaderFooterRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsMultiImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditInventoryImageRequest;
use Yosida001\Qoo10Sdk\Services\Items\ItemsContentsService;

class ItemsContentsServiceTest extends TestCase
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
        $service = new ItemsContentsService($requester);
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
            'edit goods contents' => [
                'editGoodsContents',
                EditGoodsContentsRequest::class,
                [
                    'itemCode' => 'ITEM-1',
                    'contents' => '<p>body</p>',
                ],
                'ItemsContentsService.EditGoodsContents',
                '1.0',
            ],
            'edit goods image' => [
                'editGoodsImage',
                EditGoodsImageRequest::class,
                [
                    'itemCode' => 'ITEM-2',
                    'standardImage' => 'https://example.com/standard.jpg',
                ],
                'ItemsContentsService.EditGoodsImage',
                '1.1',
            ],
            'edit goods multi image' => [
                'editGoodsMultiImage',
                EditGoodsMultiImageRequest::class,
                [
                    'itemCode' => 'ITEM-3',
                    'EnlargedImage1' => 'https://example.com/1.jpg',
                ],
                'ItemsContentsService.EditGoodsMultiImage',
                '1.0',
            ],
            'edit goods header footer' => [
                'editGoodsHeaderFooter',
                EditGoodsHeaderFooterRequest::class,
                [
                    'ItemCode' => 'ITEM-4',
                    'Header' => '<h1>header</h1>',
                ],
                'ItemsContentsService.EditGoodsHeaderFooter',
                '1.0',
            ],
            'edit additional option image' => [
                'editAdditionalOptionImage',
                EditAdditionalOptionImageRequest::class,
                [
                    'ItemCode' => 'ITEM-5',
                    'AdditionalOptionImage' => 'https://example.com/opt.jpg',
                ],
                'ItemsContentsService.EditAdditionalOptionImage',
                '1.0',
            ],
            'edit inventory image' => [
                'editInventoryImage',
                EditInventoryImageRequest::class,
                [
                    'ItemCode' => 'ITEM-6',
                    'InventoryImage' => 'https://example.com/inventory.jpg',
                ],
                'ItemsContentsService.EditInventoryImage',
                '1.0',
            ],
        ];
    }
}
