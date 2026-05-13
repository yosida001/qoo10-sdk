<?php

namespace Yosida001\Qoo10Sdk\Services\Certification;

use Yosida001\Qoo10Sdk\Services\AbstractService;

class CertificationAPIService extends AbstractService
{
    protected $baseUri = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    /**
     * @param string $userId
     * @param string $pwd
     * @return array|null
     */
    public function createCertificationKey(string $userId, string $pwd) {
        return $this->post(
            "CertificationAPI.CreateCertificationKey",
            "1.0",
            [
                'userId' => $userId,
                'pwd' => $pwd
            ]
        );
    }
}