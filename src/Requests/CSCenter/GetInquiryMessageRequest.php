<?php

namespace Yosida001\Qoo10Sdk\Requests\CSCenter;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $search_start_dt
 * @property mixed $search_end_dt
 * @property mixed $proc_status
 */
class GetInquiryMessageRequest extends AbstractRequest
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
            'search_start_dt',
            'search_end_dt',
            'proc_status',
        ];
    }
}
