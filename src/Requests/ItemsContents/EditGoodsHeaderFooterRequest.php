<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsContents;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ItemCode
 * @property mixed $SellerCode
 * @property mixed $EditHeaderYN
 * @property mixed $Header
 * @property mixed $EditFooterYN
 * @property mixed $Footer
 */
class EditGoodsHeaderFooterRequest extends AbstractRequest
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
            'EditHeaderYN',
            'Header',
            'EditFooterYN',
            'Footer',
        ];
    }
}
