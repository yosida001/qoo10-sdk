<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Http\Requester;

class ItemService
{
    private $requester;

    public function __construct(Requester $requester)
    {
        $this->requester = $requester;
    }
}