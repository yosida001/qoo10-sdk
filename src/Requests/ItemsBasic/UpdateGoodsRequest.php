<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsBasic;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ItemCode
 * @property mixed $SecondSubCat
 * @property mixed $Drugtype
 * @property mixed $ItemTitle
 * @property mixed $PromotionName
 * @property mixed $SellerCode
 * @property mixed $IndustrialCodeType
 * @property mixed $IndustrialCode
 * @property mixed $BrandNo
 * @property mixed $ManufactureDate
 * @property mixed $ModelNm
 * @property mixed $Material
 * @property mixed $ProductionPlaceType
 * @property mixed $ProductionPlace
 * @property mixed $RetailPrice
 * @property mixed $AdultYN
 * @property mixed $ContactInfo
 * @property mixed $ShippingNo
 * @property mixed $OptionShippingNo1
 * @property mixed $OptionShippingNo2
 * @property mixed $Weight
 * @property mixed $DesiredShippingDate
 * @property mixed $AvailableDateType
 * @property mixed $AvailableDateValue
 * @property mixed $Keyword
 */
class UpdateGoodsRequest extends AbstractRequest
{
    protected function omitEmptyString(): bool
    {
        return false;
    }

    /**
     * @return array
     */
    protected function getParameterNames()
    {
        return [
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
        ];
    }
}
