<?php

namespace Yosida001\Qoo10Sdk\Requests\ShippingBasic;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ShippingInfoJson
 */
class SetSendingInfoBulkRequest extends AbstractRequest
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
            'ShippingInfoJson',
        ];
    }
}
