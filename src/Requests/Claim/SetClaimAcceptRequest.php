<?php

namespace Yosida001\Qoo10Sdk\Requests\Claim;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $orderNo
 * @property mixed $seller_name
 * @property mixed $seller_zip_code
 * @property mixed $seller_front_address
 * @property mixed $seller_back_address
 * @property mixed $seller_hp_no
 * @property mixed $seller_tel_no
 */
class SetClaimAcceptRequest extends AbstractRequest
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
            'orderNo',
            'seller_name',
            'seller_zip_code',
            'seller_front_address',
            'seller_back_address',
            'seller_hp_no',
            'seller_tel_no',
        ];
    }
}
