<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Requests\CSCenter\GetInquiryMessageRequest;
use Yosida001\Qoo10Sdk\Requests\CSCenter\SetInquiryMessageRequest;

class CSCenterRequestTest extends TestCase
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

        new GetInquiryMessageRequest([
            'UnknownParameter' => 'value',
        ]);
    }

    public function requestProvider(): array
    {
        return [
            'get inquiry message' => [
                GetInquiryMessageRequest::class,
                [
                    'search_start_dt' => '2026-01-01',
                    'proc_status' => 'Y',
                ],
                [
                    'search_start_dt',
                    'search_end_dt',
                    'proc_status',
                ],
            ],
            'set inquiry message' => [
                SetInquiryMessageRequest::class,
                [
                    'inq_type' => '1',
                    'contents' => 'reply',
                ],
                [
                    'inq_type',
                    'question_no',
                    'seq_no',
                    'contents',
                ],
            ],
        ];
    }
}
