<?php

namespace Yosida001\Qoo10Sdk;

use Yosida001\Qoo10Sdk\ValueObjects\ReturnType;

class Config
{
    /**
     * @var string
     */
    private $certificationKey;

    /**
     * @var int
     */
    private $timeout;

    /**
     * @var ReturnType
     */
    private $returnType;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * Config constructor.
     *
     * @param string $certificationKey
     * @param ReturnType $returnType
     * @param int $timeout
     * @param bool $debug
     * @param string $userAgent
     */
    public function __construct(
        $certificationKey,
        ReturnType $returnType,
        $timeout = 30,
        $debug = false,
        $userAgent = 'yosida001/qoo10-sdk'
    )
    {
        $this->certificationKey = $certificationKey;
        $this->returnType = $returnType;
        $this->timeout = $timeout;
        $this->debug = $debug;
        $this->userAgent = $userAgent;
    }

    /**
     * returnTypeの値を返す。methodが指定されていればそのmethodに対応する値を返す
     * @param string $method
     * @return string
     */
    public function getReturnType(string $method = "POST"): string
    {
        if ($method === "GET") {
            return $this->returnType->forGet();
        } else if ($method === "POST") {
            return $this->returnType->forPost();
        } else {
            return $this->returnType->forPost();
        }
    }

    public function isReturnTypeJson(): bool
    {
        return $this->returnType->isJson();
    }

    /**
     * @return string
     */
    public function getCertificationKey()
    {
        return $this->certificationKey;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }
}