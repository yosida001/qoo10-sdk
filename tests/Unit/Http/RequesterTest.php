<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\Exceptions\Qoo10Exception;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\ValueObjects\ReturnType;

class RequesterTest extends TestCase
{
    public function testGetRequestBuildsQueryParametersAndDecodesJson(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects($this->once())
            ->method('request')
            ->with(
                'GET',
                '',
                [
                    'key' => 'cert-key',
                    'returnType' => 'json',
                    'method' => 'Test.API',
                    'v' => '1.0',
                    'foo' => 'bar',
                ]
            )
            ->willReturn(new Response(200, [], '{"success":true}'));

        $requester = new TestableRequester(new Config('cert-key', ReturnType::json(), 15, true), $client);

        $this->assertSame(
            ['success' => true],
            $requester->getRequest('https://example.com/api', 'Test.API', '1.0', ['foo' => 'bar'])
        );
        $this->assertSame('https://example.com/api', $requester->createdBaseUrl);
    }

    public function testPostRequestBuildsHeadersAndFormParams(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                'Test.API',
                [
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'User-Agent' => 'custom-agent',
                        'GiosisCertificationKey' => 'cert-key',
                        'QAPIVersion' => '1.2',
                    ],
                    'form_params' => [
                        'returnType' => 'text/xml',
                        'foo' => 'bar',
                    ],
                ]
            )
            ->willReturn(new Response(200, [], 'plain-body'));

        $requester = new TestableRequester(
            new Config('cert-key', ReturnType::xml(), 20, false, 'custom-agent'),
            $client
        );

        $this->assertSame(
            'plain-body',
            $requester->postRequest('https://example.com/api', 'Test.API', '1.2', ['foo' => 'bar'])
        );
        $this->assertSame('https://example.com/api', $requester->createdBaseUrl);
    }

    public function testItThrowsWhenJsonResponseIsInvalid(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects($this->once())
            ->method('request')
            ->willReturn(new Response(200, [], 'not-json'));

        $requester = new TestableRequester(new Config('cert-key', ReturnType::json()), $client);

        $this->expectException(Qoo10Exception::class);
        $this->expectExceptionMessage('Invalid JSON response: not-json');

        $requester->getRequest('https://example.com/api', 'Test.API', '1.0');
    }

    public function testItWrapsGuzzleExceptions(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects($this->once())
            ->method('request')
            ->willThrowException(new ConnectException('connection failed', new Request('GET', 'https://example.com')));

        $requester = new TestableRequester(new Config('cert-key', ReturnType::xml()), $client);

        try {
            $requester->getRequest('https://example.com/api', 'Test.API', '1.0');
            $this->fail('Expected Qoo10Exception to be thrown.');
        } catch (Qoo10Exception $e) {
            $this->assertSame('connection failed', $e->getMessage());
            $this->assertInstanceOf(ConnectException::class, $e->getPrevious());
        }
    }
}

class TestableRequester extends Requester
{
    /** @var Client */
    private $client;

    /** @var string|null */
    public $createdBaseUrl;

    public function __construct(Config $config, Client $client)
    {
        parent::__construct($config);
        $this->client = $client;
    }

    protected function createClient($baseUrl): Client
    {
        $this->createdBaseUrl = $baseUrl;

        return $this->client;
    }
}
