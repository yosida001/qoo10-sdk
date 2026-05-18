<?php

namespace Yosida001\Qoo10Sdk;

use Yosida001\Qoo10Sdk\ValueObjects\ReturnType;

class Config
{
    public const DEFAULT_BASE_URI = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi/';

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
     * @var ReturnType
     */
    private $returnType;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * @var string
     */
    private $baseUri;

    /**
     * Config constructor.
     *
     * @param string $certificationKey
     * @param ReturnType|null $returnType
     * @param int $timeout
     * @param bool $debug
     * @param string $userAgent
     * @param string $baseUri
     */
    public function __construct(
        string     $certificationKey,
        ReturnType $returnType = null,
        int        $timeout = 30,
        bool       $debug = false,
        string $userAgent = 'yosida001/qoo10-sdk',
        string $baseUri = self::DEFAULT_BASE_URI
    )
    {
        $this->certificationKey = $certificationKey;
        $this->returnType = $returnType ?: ReturnType::json();
        $this->timeout = $timeout;
        $this->debug = $debug;
        $this->userAgent = $userAgent;
        $this->baseUri = $this->normalizeBaseUri($baseUri);
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
    public function getCertificationKey(): string
    {
        return $this->certificationKey;
    }

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    private function normalizeBaseUri(string $baseUri): string
    {
        return rtrim($baseUri, '/') . '/';
    }
}
