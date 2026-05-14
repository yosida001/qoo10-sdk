<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsOptions;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ItemCode
 * @property mixed $SellerCode
 * @property mixed $OptionName
 * @property mixed $OptionValue
 * @property mixed $OptionCode
 */
class DeleteInventoryDataUnitRequest extends AbstractRequest
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
            'OptionName',
            'OptionValue',
            'OptionCode',
        ];
    }
}
