<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsBasic;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $SecondSubCat
 * @property mixed $OuterSecondSubCat
 * @property mixed $Drugtype
 * @property mixed $BrandNo
 * @property mixed $ItemTitle
 * @property mixed $PromotionName
 * @property mixed $SellerCode
 * @property mixed $IndustrialCodeType
 * @property mixed $IndustrialCode
 * @property mixed $ModelNM
 * @property mixed $ManufactureDate
 * @property mixed $ProductionPlaceType
 * @property mixed $ProductionPlace
 * @property mixed $Weight
 * @property mixed $Material
 * @property mixed $AdultYN
 * @property mixed $ContactInfo
 * @property mixed $StandardImage
 * @property mixed $VideoURL
 * @property mixed $ItemDescription
 * @property mixed $AdditionalOption
 * @property mixed $ItemType
 * @property mixed $RetailPrice
 * @property mixed $ItemPrice
 * @property mixed $TaxRate
 * @property mixed $ItemQty
 * @property mixed $ExpireDate
 * @property mixed $ShippingNo
 * @property mixed $AvailableDateType
 * @property mixed $AvailableDateValue
 * @property mixed $Keyword
 */
class SetNewGoodsRequest extends AbstractRequest
{
    protected function omitEmptyString(): bool {
        return false;
    }

    /**
     * @return array
     */
    protected function getParameterNames()
    {
        return [
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
        ];
    }
}
