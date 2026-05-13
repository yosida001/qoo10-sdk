<?php

namespace Yosida001\Qoo10Sdk;

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
     * @var bool
     */
    private $debug;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * Config constructor.
     *
     * @param string $certificationKey
     * @param int $timeout
     * @param bool $debug
     * @param string $userAgent
     */
    public function __construct(
        $certificationKey,
        $timeout = 30,
        $debug = false,
        $userAgent = 'yosida001/qoo10-sdk'
    ) {
        $this->certificationKey = $certificationKey;
        $this->timeout = $timeout;
        $this->debug = $debug;
        $this->userAgent = $userAgent;
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