<?php

namespace Yosida001\Qoo10Sdk\Requests\ShippingBasic;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ShippingStatus
 * @property mixed $SearchStartDate
 * @property mixed $SearchEndDate
 * @property mixed $SearchCondition
 */
class GetShippingInfoV3Request extends AbstractRequest
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
            'ShippingStatus',
            'SearchStartDate',
            'SearchEndDate',
            'SearchCondition',
        ];
    }
}
