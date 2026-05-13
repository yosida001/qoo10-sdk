<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Endpoint;

class ShippingService extends AbstractService
{
    private $BASE_URL = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    public function getShippingInfoV3($shippingStatus, $startDate, $endDate)
    {
        return $this->requester->request(
            new Endpoint(
                $this->BASE_URL,
                'ShippingBasic.GetShippingInfo_v3',
                '1.0',
                'POST'
            ),
            [
                'ShippingStatus' => $shippingStatus,
                'SearchStartDate' => $startDate,
                'SearchEndDate' => $endDate,
            ]
        );
    }
}