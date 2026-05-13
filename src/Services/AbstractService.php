<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Endpoint;
use Yosida001\Qoo10Sdk\Http\Requester;

abstract class AbstractService
{
    /**
     * @var Requester
     */
    protected $requester;

    /**
     * @param Requester $requester
     */
    public function __construct(Requester $requester)
    {
        $this->requester = $requester;
    }

    /**
     * @param string $baseUrl
     * @param string $apiName
     * @param array $params
     * @param string $version
     * @param string $httpMethod
     * @return array
     */
    protected function call(
        $baseUrl,
        $apiName,
        array $params = [],
        $version = '1.0',
        $httpMethod = 'POST'
    ) {
        return $this->requester->request(
            new Endpoint(
                $baseUrl,
                $apiName,
                $version,
                $httpMethod
            ),
            $params
        );
    }

    /**
     * @param string $baseUrl
     * @param string $apiName
     * @param array $params
     * @param string $version
     * @return array
     */
    protected function get(
        $baseUrl,
        $apiName,
        array $params = [],
        $version = '1.0'
    ) {
        return $this->call($baseUrl, $apiName, $params, $version, 'GET');
    }

    /**
     * @param string $baseUrl
     * @param string $apiName
     * @param array $params
     * @param string $version
     * @return array
     */
    protected function post(
        $baseUrl,
        $apiName,
        array $params = [],
        $version = '1.0'
    ) {
        return $this->call($baseUrl, $apiName, $params, $version, 'POST');
    }
}