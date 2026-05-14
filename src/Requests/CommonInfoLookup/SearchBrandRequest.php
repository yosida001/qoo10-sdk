<?php

namespace Yosida001\Qoo10Sdk\Requests\CommonInfoLookup;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $keyword
 */
class SearchBrandRequest extends AbstractRequest
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
            'keyword',
        ];
    }
}
