<?php

namespace Yosida001\Qoo10Sdk\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\Exceptions\Qoo10Exception;

class Requester
{
    private $config;
    private $httpClient;

    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->httpClient = new Client([
            'base_uri' => $config->getBaseUrl(),
            'timeout' => 30,
        ]);
    }

    public function get($path, array $params = [])
    {
        return $this->request('GET', $path, $params);
    }

    public function post($path, array $params = [])
    {
        return $this->request('POST', $path, $params);
    }

    private function request($method, $path, array $params = [])
    {
        $params = array_merge([
            'key' => $this->config->getApiKey(),
        ], $params);

        $options = [];

        if ($method === 'GET') {
            $options['query'] = $params;
        } else {
            $options['form_params'] = $params;
        }

        try {
            $response = $this->httpClient->request($method, ltrim($path, '/'), $options);
        } catch (GuzzleException $e) {
            throw new Qoo10Exception($e->getMessage(), (int) $e->getCode(), $e);
        }

        $body = (string) $response->getBody();
        $decoded = json_decode($body, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Qoo10Exception('Qoo10 API response is not valid JSON: ' . $body);
        }

        return $decoded;
    }
}