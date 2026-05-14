<?php

namespace Yosida001\Qoo10Sdk\Tests\Unit\Requests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yosida001\Qoo10Sdk\Requests\Claim\SetCancelProcessRequest;
use Yosida001\Qoo10Sdk\Requests\Claim\SetClaimAcceptRequest;
use Yosida001\Qoo10Sdk\Requests\Claim\SetClaimRedeliveryRequest;

class ClaimRequestTest extends TestCase
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

        new SetCancelProcessRequest([
            'UnknownParameter' => 'value',
        ]);
    }

    public function requestProvider(): array
    {
        return [
            'set cancel process' => [
                SetCancelProcessRequest::class,
                [
                    'ContrNo' => 'C-1',
                    'CancelReason' => 'reason',
                ],
                [
                    'ContrNo',
                    'CancelReason',
                    'SellerMemo',
                    'returnFeeStat',
                ],
            ],
            'set claim accept' => [
                SetClaimAcceptRequest::class,
                [
                    'orderNo' => 'O-1',
                    'seller_name' => 'seller',
                ],
                [
                    'orderNo',
                    'seller_name',
                    'seller_zip_code',
                    'seller_front_address',
                    'seller_back_address',
                    'seller_hp_no',
                    'seller_tel_no',
                ],
            ],
            'set claim redelivery' => [
                SetClaimRedeliveryRequest::class,
                [
                    'orderNo' => 'O-2',
                    'invoice_no' => 'INV-1',
                ],
                [
                    'orderNo',
                    'redelivery_date',
                    'invoice_no',
                    'del_comapny_name',
                    'rcv_name',
                    'rcv_zipCode',
                    'rcv_front_address',
                    'rcv_back_address',
                    'rcv_hp_no',
                    'rcv_tel_no',
                ],
            ],
        ];
    }
}
