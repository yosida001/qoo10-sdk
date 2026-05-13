<?php

namespace Yosida001\Qoo10Sdk\Requests\ItemsLookup;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $apply_type
 * @property mixed $email
 * @property mixed $target_from_dt
 * @property mixed $target_to_dt
 */
class RequestFileDownloadRequest extends AbstractRequest
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
            'apply_type',
            'email',
            'target_from_dt',
            'target_to_dt',
        ];
    }
}
