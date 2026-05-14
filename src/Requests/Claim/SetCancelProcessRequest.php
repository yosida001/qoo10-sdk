<?php

namespace Yosida001\Qoo10Sdk\Requests\Claim;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $ContrNo
 * @property mixed $CancelReason
 * @property mixed $SellerMemo
 * @property mixed $returnFeeStat
 */
class SetCancelProcessRequest extends AbstractRequest
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
            'ContrNo',
            'CancelReason',
            'SellerMemo',
            'returnFeeStat',
        ];
    }
}
