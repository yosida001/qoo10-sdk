<?php

namespace Yosida001\Qoo10Sdk\Requests\CSCenter;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $inq_type
 * @property mixed $question_no
 * @property mixed $seq_no
 * @property mixed $contents
 */
class SetInquiryMessageRequest extends AbstractRequest
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
            'inq_type',
            'question_no',
            'seq_no',
            'contents',
        ];
    }
}
