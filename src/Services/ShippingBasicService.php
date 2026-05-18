<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Requests\ShippingBasic\GetShippingAndClaimInfoByOrderNoV2Request;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\GetShippingInfoLogisticsRequest;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\GetShippingInfoV3Request;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSellerCheckYnBulkRequest;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSellerCheckYnV2Request;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSendingInfoBulkRequest;
use Yosida001\Qoo10Sdk\Requests\ShippingBasic\SetSendingInfoRequest;

class ShippingBasicService extends AbstractService
{
    public function getShippingInfo_v3(GetShippingInfoV3Request $request) {
        return $this->post('ShippingBasic.GetShippingInfo_v3', '1.0', $request->toArray());
    }

    public function setSellerCheckYN_V2(SetSellerCheckYnV2Request $request) {
        return $this->post('ShippingBasic.SetSellerCheckYN_V2', '1.0', $request->toArray());
    }

    public function setSellerCheckYNBulk(SetSellerCheckYnBulkRequest $request) {
        return $this->post('ShippingBasic.SetSellerCheckYNBulk', '1.0', $request->toArray());
    }

    public function setSendingInfo(SetSendingInfoRequest $request) {
        return $this->post('ShippingBasic.SetSendingInfo', '1.0', $request->toArray());
    }

    public function setSendingInfoBulk(SetSendingInfoBulkRequest $request) {
        return $this->post('ShippingBasic.SetSendingInfoBulk', '1.0', $request->toArray());
    }

    public function getShippingAndClaimInfoByOrderNo_V2(GetShippingAndClaimInfoByOrderNoV2Request $request) {
        return $this->post('ShippingBasic.GetShippingAndClaimInfoByOrderNo_V2', '1.0', $request->toArray());
    }

    public function GetShippingInfo_Logistics(GetShippingInfoLogisticsRequest $request) {
        return $this->post('ShippingBasic.GetShippingInfo_Logistics', '1.0', $request->toArray());
    }
}
