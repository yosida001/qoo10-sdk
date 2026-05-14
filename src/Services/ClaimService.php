<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Requests\Claim\SetCancelProcessRequest;
use Yosida001\Qoo10Sdk\Requests\Claim\SetClaimAcceptRequest;
use Yosida001\Qoo10Sdk\Requests\Claim\SetClaimRedeliveryRequest;

class ClaimService extends AbstractService
{
    protected $baseUri = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    public function setCancelProcess(SetCancelProcessRequest $request) {
        return $this->post('Claim.SetCancelProcess', "1.0", $request->toArray());
    }

    public function setClaimAccept(SetClaimAcceptRequest $request) {
        return $this->post('Claim.SetClaimAccept', "1.0", $request->toArray());
    }

    public function setClaimRedelivery(SetClaimRedeliveryRequest $request) {
        return $this->post('Claim.SetClaimRedelivery', '1.0', $request->toArray());
    }
}
