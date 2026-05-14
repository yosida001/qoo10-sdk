<?php

namespace Yosida001\Qoo10Sdk\Requests\ShippingBasic;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $OrderNo
 * @property mixed $EstShipDt
 * @property mixed $DelayType
 * @property mixed $DelayMemo
 */
class SetSellerCheckYnV2Request extends AbstractRequest
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
            'OrderNo',
            'EstShipDt',
            'DelayType',
            'DelayMemo',
        ];
    }
}
