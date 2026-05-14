<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Requests\CommonInfoLookup\GetCatagoryListAllRequest;
use Yosida001\Qoo10Sdk\Requests\CommonInfoLookup\SearchBrandRequest;
use Yosida001\Qoo10Sdk\Requests\CommonInfoLookup\SearchMakerRequest;

class CommonInfoLookupRequestTest extends TestCase
{
    /**
     * @dataProvider requestProvider
     */
    public function testItMapsInputValuesAndKeepsMissingParametersAsEmptyStrings(string $className, array $input, array $expectedKeys): void
    {
        $request = new $className($input);

        $this->assertSame($expectedKeys, array_keys($request->toArray()));
        $this->assertSame(array_replace(array_fill_keys($expectedKeys, ''), $input), $request->toArray());
    }

    public function testItRejectsUnknownParameters(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new SearchBrandRequest([
            'UnknownParameter' => 'value',
        ]);
    }

    public function requestProvider(): array
    {
        return [
            'get catagory list all' => [
                GetCatagoryListAllRequest::class,
                [
                    'lang_cd' => 'ja',
                ],
                [
                    'lang_cd',
                ],
            ],
            'search maker' => [
                SearchMakerRequest::class,
                [
                    'keyword' => 'maker',
                ],
                [
                    'keyword',
                ],
            ],
            'search brand' => [
                SearchBrandRequest::class,
                [
                    'keyword' => 'brand',
                ],
                [
                    'keyword',
                ],
            ],
        ];
    }
}
