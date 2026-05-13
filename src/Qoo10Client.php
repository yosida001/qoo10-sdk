<?php

namespace Yosida001\Qoo10Sdk;

use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Services\Certification\CertificationAPIService;

class Qoo10Client
{
    private $requester;

    public function __construct(Config $config)
    {
        $this->requester = new Requester($config);
    }

    public function certification()
    {
        return new CertificationAPIService($this->requester);
    }
}