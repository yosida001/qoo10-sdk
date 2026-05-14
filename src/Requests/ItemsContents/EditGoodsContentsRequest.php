<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsContents;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $itemCode
 * @property mixed $sellerCode
 * @property mixed $contents
 */
class EditGoodsContentsRequest extends AbstractRequest
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
            'itemCode',
            'sellerCode',
            'contents',
        ];
    }
}
