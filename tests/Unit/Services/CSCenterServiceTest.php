<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Requests\CSCenter\GetInquiryMessageRequest;
use Yosida001\Qoo10Sdk\Requests\CSCenter\SetInquiryMessageRequest;
use Yosida001\Qoo10Sdk\Services\CSCenterService;

class CSCenterServiceTest extends TestCase
{
    private const BASE_URI = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi/';

    /**
     * @dataProvider serviceProvider
     */
    public function testItForwardsTheRequestToRequester(
        string $method,
        string $requestClass,
        array $input,
        string $apiMethod
    ): void {
        $request = new $requestClass($input);
        $requester = $this->createMock(Requester::class);
        $expectedParams = $request->toArray();

        $requester->expects($this->once())
            ->method('getBaseUri')
            ->willReturn(self::BASE_URI);
        $requester->expects($this->once())
            ->method('postRequest')
            ->with(self::BASE_URI, $apiMethod, '1.0', $expectedParams)
            ->willReturn('ok');

        $service = new CSCenterService($requester);

        $this->assertSame('ok', $service->{$method}($request));
    }

    public function serviceProvider(): array
    {
        return [
            'get inquiry message' => [
                'getInquiryMessage',
                GetInquiryMessageRequest::class,
                [
                    'search_start_dt' => '2026-01-01',
                    'proc_status' => 'Y',
                ],
                'CSCenter.GetInquiryMessage',
            ],
            'set inquiry message' => [
                'setInquiryMessage',
                SetInquiryMessageRequest::class,
                [
                    'inq_type' => '1',
                    'contents' => 'reply',
                ],
                'CSCenter.SetInquiryMessage',
            ],
        ];
    }
}
