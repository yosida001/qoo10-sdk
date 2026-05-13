<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsLookup;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

class GetSellerDeliveryGroupInfoRequest extends AbstractRequest
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
        return [];
    }
}
