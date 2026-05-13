<?php

namespace Yosida001\Qoo10Sdk;

class Endpoint
{
    private $baseUrl;
    private $apiName;
    private $version;
    private $httpMethod;

    public function __construct(
        $baseUrl,
        $apiName,
        $version = '1.0',
        $httpMethod = 'POST'
    ) {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->apiName = $apiName;
        $this->version = $version;
        $this->httpMethod = strtoupper($httpMethod);
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function getApiName()
    {
        return $this->apiName;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getHttpMethod()
    {
        return $this->httpMethod;
    }
}