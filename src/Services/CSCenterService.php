<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Requests\CSCenter\GetInquiryMessageRequest;
use Yosida001\Qoo10Sdk\Requests\CSCenter\SetInquiryMessageRequest;

class CSCenterService extends AbstractService
{
    protected $baseUri = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    public function getInquiryMessage(GetInquiryMessageRequest $request) {
        return $this->post('CSCenter.GetInquiryMessage', "1.0", $request->toArray());
    }

    public function setInquiryMessage(SetInquiryMessageRequest $request) {
        return $this->post('CSCenter.SetInquiryMessage', "1.0", $request->toArray());
    }
}
