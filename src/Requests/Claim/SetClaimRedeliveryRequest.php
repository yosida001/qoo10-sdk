<?php

namespace Yosida001\Qoo10Sdk\Requests\Claim;

use Yosida001\Qoo10Sdk\Requests\AbstractRequest;

/**
 * @property mixed $orderNo
 * @property mixed $redelivery_date
 * @property mixed $invoice_no
 * @property mixed $del_comapny_name
 * @property mixed $rcv_name
 * @property mixed $rcv_zipCode
 * @property mixed $rcv_front_address
 * @property mixed $rcv_back_address
 * @property mixed $rcv_hp_no
 * @property mixed $rcv_tel_no
 */
class SetClaimRedeliveryRequest extends AbstractRequest
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
            'redelivery_date',
            'invoice_no',
            'del_comapny_name',
            'rcv_name',
            'rcv_zipCode',
            'rcv_front_address',
            'rcv_back_address',
            'rcv_hp_no',
            'rcv_tel_no',
        ];
    }
}
