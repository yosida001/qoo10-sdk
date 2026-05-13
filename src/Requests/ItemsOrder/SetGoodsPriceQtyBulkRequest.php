<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsOrder;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ItemInfoJson
 */
class SetGoodsPriceQtyBulkRequest extends AbstractRequest
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
            'ItemInfoJson',
        ];
    }
}
