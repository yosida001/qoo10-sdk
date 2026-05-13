<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsBasic;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $SellerCode
 * @property mixed $SecondSubCat
 * @property mixed $BrandNo
 * @property mixed $ItemSeriesName
 * @property mixed $PromotionName
 * @property mixed $ItemPrice
 * @property mixed $RetailPrice
 * @property mixed $TaxRate
 * @property mixed $OptionType
 * @property mixed $OptionMainimage
 * @property mixed $OptionSubimage
 * @property mixed $OptionQty
 * @property mixed $StyleNumber
 * @property mixed $TpoNumber
 * @property mixed $SeasonType
 * @property mixed $MaterialInfo
 * @property mixed $MaterialNumber
 * @property mixed $AttributeInfo
 * @property mixed $ItemDescription
 * @property mixed $WashinginfoWashing
 * @property mixed $WashinginfoStretch
 * @property mixed $WashinginfoFit
 * @property mixed $WashinginfoThickness
 * @property mixed $WashinginfoLining
 * @property mixed $WashinginfoSeethrough
 * @property mixed $ImageOtherUrl
 * @property mixed $VideoNumber
 * @property mixed $SizetableType1
 * @property mixed $SizetableType1Value
 * @property mixed $SizetableType2
 * @property mixed $SizetableType2Value
 * @property mixed $SizetableType3
 * @property mixed $SizetableType3Value
 * @property mixed $ShippingNo
 * @property mixed $AvailableDateValue
 * @property mixed $DesiredShippingDate
 * @property mixed $Keyword
 * @property mixed $OriginType
 * @property mixed $OriginRegionId
 * @property mixed $OriginCountryId
 * @property mixed $OriginOthers
 * @property mixed $Weight
 * @property mixed $ModelNM
 * @property mixed $IndustrialCodeType
 * @property mixed $IndustrialCode
 * @property mixed $ManufactureDate
 * @property mixed $ExpirationDateType
 * @property mixed $ExpirationDateMFD
 * @property mixed $ExpirationDatePAO
 * @property mixed $ExpirationDateEXP
 * @property mixed $AdultYN
 * @property mixed $ContactInfo
 * @property mixed $BuyLimitType
 * @property mixed $BuyLimitDate
 * @property mixed $BuyLimitQty
 * @property mixed $ExpireDate
 * @property mixed $ShippingName
 */
class SetNewMoveGoodsRequest extends AbstractRequest
{

    protected function omitEmptyString(): bool
    {
        return false;
    }

    protected function getParameterNames()
    {
        return [
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
        ];
    }
}
