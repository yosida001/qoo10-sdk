<?php
namespace Yosida001\Qoo10Sdk;

use GuzzleHttp\Client;

/**
 * とりあえず最小構成としてのクライアント
 */
class Qoo10Client
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * Qoo10Client constructor.
     *
     * @param string $apiKey
     * @param string $baseUrl
     */
    public function __construct(
        $apiKey,
        $baseUrl = 'https://api.qoo10.jp'
    ) {
        $this->apiKey = $apiKey;
        $this->baseUrl = rtrim($baseUrl, '/');

        $this->httpClient = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 30,
        ]);
    }

    /**
     * @param string $path
     * @param array $query
     * @return array
     */
    public function get($path, array $query = [])
    {
        $response = $this->httpClient->get($path, [
            'query' => array_merge($query, [
                'key' => $this->apiKey,
            ]),
        ]);

        return json_decode(
            (string) $response->getBody(),
            true
        );
    }
}