<?php

namespace Yosida001\Qoo10Sdk\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\Endpoint;
use Yosida001\Qoo10Sdk\Exceptions\Qoo10Exception;

class Requester
{
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function request(Endpoint $endpoint, array $params = [])
    {
        $client = new Client([
            'base_uri' => $endpoint->getBaseUrl() . '/',
            'timeout' => $this->config->getTimeout(),
            'debug' => $this->config->isDebug(),
            'headers' => [
                'User-Agent' => $this->config->getUserAgent(),
            ],
        ]);

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'GiosisCertificationKey' => $this->config->getCertificationKey(),
            'QAPIVersion' => $endpoint->getVersion(),
        ];

        $options = [
            'headers' => $headers,
        ];

        if ($endpoint->getHttpMethod() === 'GET') {
            $options['query'] = $params;
        } else {
            $options['form_params'] = $params;
        }

        try {
            $response = $client->request(
                $endpoint->getHttpMethod(),
                $endpoint->getApiName(),
                $options
            );
        } catch (GuzzleException $e) {
            throw new Qoo10Exception($e->getMessage(), (int) $e->getCode(), $e);
        }

        $body = (string) $response->getBody();
        $decoded = json_decode($body, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Qoo10Exception('Invalid JSON response: ' . $body);
        }

        return $decoded;
    }
}