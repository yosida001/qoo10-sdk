<?php

namespace Yosida001\Qoo10Sdk\Requests\CommonInfoLookup;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $lang_cd
 */
class GetCatagoryListAllRequest extends AbstractRequest
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
            'lang_cd',
        ];
    }
}
