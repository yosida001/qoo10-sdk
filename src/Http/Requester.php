<?php

namespace Yosida001\Qoo10Sdk\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\Exceptions\Qoo10Exception;

class Requester
{
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Sends a GET request to the specified API endpoint using the provided base URL, method, version, and parameters.
     *
     * @param string $baseUrl The base URL of the API.
     * @param string $apiMethod The specific API method or endpoint to call.
     * @param string $version The API version to use for the request.
     * @param array $params Optional array of additional query parameters to include in the request.
     *
     * @return mixed The response from the API call.
     * @throws Qoo10Exception
     */
    public function getRequest(
        $baseUrl,
        $apiMethod,
        $version,
        array $params = []
    )
    {
        $client = new Client([
            "base_uri" => $baseUrl,
            RequestOptions::TIMEOUT => $this->config->getTimeout(),
            RequestOptions::DEBUG => $this->config->isDebug()
        ]);

        //Qoo10では各種パラメータはすべてurl_queryに入れる
        $options = [
            "key" => $this->config->getCertificationKey(),
            "returnType" => $this->config->getReturnType("GET"),
            "method" => $apiMethod,
            "v" => $version,
        ];

        $params = array_merge($options, $params);

        return $this->send("GET", $client, "", $params);
    }

    /**
     * Sends a POST request to the specified API endpoint.
     *
     * @param string $baseUrl The base URL of the API endpoint.
     * @param string $apiMethod The specific API method to be called.
     * @param string $version The API version to be used for the request.
     * @param array $params Optional parameters to include in the request.
     *
     * @return mixed The response from the API call.
     * @throws Qoo10Exception
     */
    public function postRequest(
        $baseUrl,
        $apiMethod,
        $version,
        array $params = []
    )
    {
        $client = new Client([
            "base_uri" => $baseUrl,
            RequestOptions::TIMEOUT => $this->config->getTimeout(),
            RequestOptions::DEBUG => $this->config->isDebug()
        ]);

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'User-Agent' => $this->config->getUserAgent(),
            'GiosisCertificationKey' => $this->config->getCertificationKey(),
            'QAPIVersion' => $version,
        ];

        $formParams = array_merge([
            'returnType' => $this->config->getReturnType("POST"),
        ], $params);

        return $this->send('POST', $client, $apiMethod, [
            'headers' => $headers,
            'form_params' => $formParams,
        ]);
    }

    private function send($httpMethod, Client $client, $path, array $params)
    {
        try {
            $response = $client->request(
                $httpMethod,
                ltrim($path, '/'),
                $params
            );
        } catch (GuzzleException $e) {
            throw new Qoo10Exception($e->getMessage(), (int)$e->getCode(), $e);
        }

        $body = (string)$response->getBody();

        if ($this->config->isReturnTypeJson()) {
            $decoded = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Qoo10Exception('Invalid JSON response: ' . $body);
            }

            return $decoded;
        }

        return $body;
    }
}