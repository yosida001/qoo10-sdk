<?php

namespace Yosida001\Qoo10Sdk\Requests\ShippingBasic;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $OrderNo
 * @property mixed $ShippingCorp
 * @property mixed $TrackingNo
 */
class SetSendingInfoRequest extends AbstractRequest
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
            'ShippingCorp',
            'TrackingNo',
        ];
    }
}
