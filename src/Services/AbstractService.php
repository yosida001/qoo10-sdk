<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Exceptions\Qoo10Exception;
use Yosida001\Qoo10Sdk\Http\Requester;

abstract class AbstractService
{
    /**
     * @var Requester
     */
    protected $requester;

    protected $baseUri;

    /**
     * @param Requester $requester
     */
    public function __construct(Requester $requester)
    {
        $this->requester = $requester;
    }

    /**
     * @param string $apiMethod
     * @param string $version
     * @param array $params
     * @return mixed|string
     * @throws Qoo10Exception
     */
    protected function get(string $apiMethod, string $version = "1.0", array $params = [])
    {
        return $this->requester->getRequest(
            $this->baseUri,
            $apiMethod,
            $version,
            $params
        );
    }

    /**
     * @param string $apiMethod
     * @param string $version
     * @param array $params
     * @return mixed|string
     * @throws Qoo10Exception
     */
    protected function post(string $apiMethod, string $version = "1.0", array $params = [])
    {
        return $this->requester->postRequest(
            $this->baseUri,
            $apiMethod,
            $version,
            $params
        );
    }
}