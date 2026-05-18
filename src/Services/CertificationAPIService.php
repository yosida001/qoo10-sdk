<?php

namespace Yosida001\Qoo10Sdk\Services;

class CertificationAPIService extends AbstractService
{
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
