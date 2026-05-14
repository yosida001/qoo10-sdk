<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsContents;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ItemCode
 * @property mixed $SellerCode
 * @property mixed $InventoryImage
 */
class EditInventoryImageRequest extends AbstractRequest
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
            'InventoryImage',
        ];
    }
}
