<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
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
    public function testItMapsInputValuesAndKeepsMissingParametersAsEmptyStrings(string $className, array $input, array $expectedKeys): void
    {
        $request = new $className($input);
        $result = $request->toArray();

        $this->assertSame($expectedKeys, array_keys($result));
        $this->assertSame(array_replace(array_fill_keys($expectedKeys, ''), $input), $result);
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
                [
                    'SecondSubCat',
                    'OuterSecondSubCat',
                    'Drugtype',
                    'BrandNo',
                    'ItemTitle',
                    'PromotionName',
                    'SellerCode',
                    'IndustrialCodeType',
                    'IndustrialCode',
                    'ModelNM',
                    'ManufactureDate',
                    'ProductionPlaceType',
                    'ProductionPlace',
                    'Weight',
                    'Material',
                    'AdultYN',
                    'ContactInfo',
                    'StandardImage',
                    'VideoURL',
                    'ItemDescription',
                    'AdditionalOption',
                    'ItemType',
                    'RetailPrice',
                    'ItemPrice',
                    'TaxRate',
                    'ItemQty',
                    'ExpireDate',
                    'ShippingNo',
                    'AvailableDateType',
                    'AvailableDateValue',
                    'Keyword',
                ],
            ],
            'set new move goods' => [
                SetNewMoveGoodsRequest::class,
                [
                    'SellerCode' => 'SELLER-2',
                    'ItemSeriesName' => 'Series name',
                    'ShippingName' => 'Courier',
                ],
                [
                    'SellerCode',
                    'SecondSubCat',
                    'BrandNo',
                    'ItemSeriesName',
                    'PromotionName',
                    'ItemPrice',
                    'RetailPrice',
                    'TaxRate',
                    'OptionType',
                    'OptionMainimage',
                    'OptionSubimage',
                    'OptionQty',
                    'StyleNumber',
                    'TpoNumber',
                    'SeasonType',
                    'MaterialInfo',
                    'MaterialNumber',
                    'AttributeInfo',
                    'ItemDescription',
                    'WashinginfoWashing',
                    'WashinginfoStretch',
                    'WashinginfoFit',
                    'WashinginfoThickness',
                    'WashinginfoLining',
                    'WashinginfoSeethrough',
                    'ImageOtherUrl',
                    'VideoNumber',
                    'SizetableType1',
                    'SizetableType1Value',
                    'SizetableType2',
                    'SizetableType2Value',
                    'SizetableType3',
                    'SizetableType3Value',
                    'ShippingNo',
                    'AvailableDateValue',
                    'DesiredShippingDate',
                    'Keyword',
                    'OriginType',
                    'OriginRegionId',
                    'OriginCountryId',
                    'OriginOthers',
                    'Weight',
                    'ModelNM',
                    'IndustrialCodeType',
                    'IndustrialCode',
                    'ManufactureDate',
                    'ExpirationDateType',
                    'ExpirationDateMFD',
                    'ExpirationDatePAO',
                    'ExpirationDateEXP',
                    'AdultYN',
                    'ContactInfo',
                    'BuyLimitType',
                    'BuyLimitDate',
                    'BuyLimitQty',
                    'ExpireDate',
                    'ShippingName',
                ],
            ],
            'update goods' => [
                UpdateGoodsRequest::class,
                [
                    'ItemCode' => 'ITEM-1',
                    'SellerCode' => 'SELLER-3',
                    'RetailPrice' => '1200',
                ],
                [
                    'ItemCode',
                    'SecondSubCat',
                    'Drugtype',
                    'ItemTitle',
                    'PromotionName',
                    'SellerCode',
                    'IndustrialCodeType',
                    'IndustrialCode',
                    'BrandNo',
                    'ManufactureDate',
                    'ModelNm',
                    'Material',
                    'ProductionPlaceType',
                    'ProductionPlace',
                    'RetailPrice',
                    'AdultYN',
                    'ContactInfo',
                    'ShippingNo',
                    'OptionShippingNo1',
                    'OptionShippingNo2',
                    'Weight',
                    'DesiredShippingDate',
                    'AvailableDateType',
                    'AvailableDateValue',
                    'Keyword',
                ],
            ],
            'set goods sub delivery group' => [
                SetGoodsSubDeliveryGroupRequest::class,
                [
                    'ItemCode' => 'ITEM-2',
                    'AddSRcode1' => 'SUB-1',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'AddSRcode1',
                    'AddSRcode2',
                ],
            ],
            'edit goods status' => [
                EditGoodsStatusRequest::class,
                [
                    'ItemCode' => 'ITEM-3',
                    'Status' => '2',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'Status',
                ],
            ],
            'edit item condition' => [
                EditItemConditionRequest::class,
                [
                    'ItemCode' => 'ITEM-4',
                    'UseCondition' => '1',
                ],
                [
                    'ItemCode',
                    'SellerCode',
                    'UseCondition',
                ],
            ],
        ];
    }
}
