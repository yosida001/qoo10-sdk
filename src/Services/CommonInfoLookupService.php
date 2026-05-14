<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Requests\CommonInfoLookup\GetCatagoryListAllRequest;
use Yosida001\Qoo10Sdk\Requests\CommonInfoLookup\SearchBrandRequest;
use Yosida001\Qoo10Sdk\Requests\CommonInfoLookup\SearchMakerRequest;


class CommonInfoLookupService extends AbstractService
{
    protected $baseUri = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    public function getCatagoryListAll(GetCatagoryListAllRequest $request) {
        return $this->post('CommonInfoLookup.GetCatagoryListAll', '1.0', $request->toArray());
    }

    public function searchMaker(SearchMakerRequest $request) {
        return $this->post('CommonInfoLookup.SearchMaker', '1.0', $request->toArray());
    }

    public function searchBrand(SearchBrandRequest $request) {
        return $this->post('CommonInfoLookup.SearchBrand', '1.0', $request->toArray());
    }
}
