<?php

namespace Yosida001\Qoo10Sdk\Exceptions;

class Qoo10ApiException extends Qoo10Exception
{
    private $response;

    public function __construct($message, array $response = [], $code = 0)
    {
        parent::__construct($message, $code);
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}