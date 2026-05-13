<?php

namespace Yosida001\Qoo10Sdk\Services\Items;

use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetAllGoodsInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetGoodsInventoryInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetGoodsOptionInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetItemDetailInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetSellerDeliveryGroupInfoRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\RequestFileDownloadRequest;
use Yosida001\Qoo10Sdk\Services\AbstractService;

class ItemsLookupService extends AbstractService
{
    protected $baseUri = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    public function getGoodsOptionInfo(GetGoodsOptionInfoRequest $request) {
        return $this->post(
            "ItemsLookup.GetGoodsOptionInfo",
            "1.0",
            $request->toArray()
        );
    }

    public function getGoodsInventoryInfo(GetGoodsInventoryInfoRequest $request) {
        return $this->post(
            "ItemsLookup.GetGoodsInventoryInfo",
            "1.0",
            $request->toArray()
        );
    }

    public function getSellerDeliveryGroupInfo(GetSellerDeliveryGroupInfoRequest $request) {
        return $this->post(
            "ItemsLookup.GetSellerDeliveryGroupInfo",
            "1.0",
            $request->toArray()
        );
    }

    public function getItemDetailInfo(GetItemDetailInfoRequest $request) {
        return $this->post(
            "ItemsLookup.GetItemDetailInfo",
            "1.2",
            $request->toArray()
        );
    }

    public function getAllGoodsInfo(GetAllGoodsInfoRequest $request) {
        return $this->post(
            "ItemsLookup.GetAllGoodsInfo",
            "1.0",
            $request->toArray()
        );
    }

    public function requestFileDownload(RequestFileDownloadRequest $request) {
        return $this->post(
            "ItemsLookup.RequestFileDownload",
            "1.0",
            $request->toArray()
        );
    }
}
