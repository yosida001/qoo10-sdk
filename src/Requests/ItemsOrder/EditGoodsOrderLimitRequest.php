<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsOrder;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ItemCode
 * @property mixed $SellerCode
 * @property mixed $LimitType
 * @property mixed $LimitCnt
 * @property mixed $EndDate
 */
class EditGoodsOrderLimitRequest extends AbstractRequest
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
            'LimitType',
            'LimitCnt',
            'EndDate',
        ];
    }
}
