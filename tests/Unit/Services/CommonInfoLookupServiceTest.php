<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Http\Requester;
use Yosida001\Qoo10Sdk\Requests\CommonInfoLookup\GetCatagoryListAllRequest;
use Yosida001\Qoo10Sdk\Requests\CommonInfoLookup\SearchBrandRequest;
use Yosida001\Qoo10Sdk\Requests\CommonInfoLookup\SearchMakerRequest;
use Yosida001\Qoo10Sdk\Services\CommonInfoLookupService;

class CommonInfoLookupServiceTest extends TestCase
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

        $service = new CommonInfoLookupService($requester);

        $this->assertSame('ok', $service->{$method}($request));
    }

    public function serviceProvider(): array
    {
        return [
            'get catagory list all' => [
                'getCatagoryListAll',
                GetCatagoryListAllRequest::class,
                [
                    'lang_cd' => 'ja',
                ],
                'CommonInfoLookup.GetCatagoryListAll',
            ],
            'search maker' => [
                'searchMaker',
                SearchMakerRequest::class,
                [
                    'keyword' => 'maker',
                ],
                'CommonInfoLookup.SearchMaker',
            ],
            'search brand' => [
                'searchBrand',
                SearchBrandRequest::class,
                [
                    'keyword' => 'brand',
                ],
                'CommonInfoLookup.SearchBrand',
            ],
        ];
    }
}
