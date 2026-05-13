<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsOrder;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ItemCode
 * @property mixed $SellerCode
 * @property mixed $BeginDate
 * @property mixed $EndDate
 * @property mixed $CostPrice
 * @property mixed $DiscountType
 */
class UpdateItemDiscountRequest extends AbstractRequest
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
            'SellerCode',
            'BeginDate',
            'EndDate',
            'CostPrice',
            'DiscountType',
        ];
    }
}
