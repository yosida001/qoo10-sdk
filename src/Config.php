<?php

namespace Yosida001\Qoo10Sdk;

/**
 * Qoo10APIにアクセスするうえで必要な設定などを書き込むためのコンフィグクラス。
 *
 */
class Config
{
    private $apiKey;
    private $baseUrl;

    public function __construct($apiKey, $baseUrl = 'https://api.qoo10.jp')
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }
}