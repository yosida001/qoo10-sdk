<?php

namespace Yosida001\Qoo10Sdk\Services\Items;

use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditAdditionalOptionImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsContentsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsHeaderFooterRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsMultiImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditInventoryImageRequest;
use Yosida001\Qoo10Sdk\Services\AbstractService;

class ItemsContentsService extends AbstractService
{
    protected $baseUri = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    public function editGoodsContents(EditGoodsContentsRequest $request) {
        return $this->post(
            "ItemsContentsService.EditGoodsContents",
            "1.0",
            $request->toArray()
        );
    }

    public function editGoodsImage(EditGoodsImageRequest $request) {
        return $this->post(
            "ItemsContentsService.EditGoodsImage",
            "1.1",
            $request->toArray()
        );
    }

    public function editGoodsMultiImage(EditGoodsMultiImageRequest $request) {
        return $this->post(
            "ItemsContentsService.EditGoodsMultiImage",
            "1.0",
            $request->toArray()
        );
    }

    public function editGoodsHeaderFooter(EditGoodsHeaderFooterRequest $request) {
        return $this->post(
            "ItemsContentsService.EditGoodsHeaderFooter",
            "1.0",
            $request->toArray()
        );
    }

    public function editAdditionalOptionImage(EditAdditionalOptionImageRequest $request) {
        return $this->post(
            "ItemsContentsService.EditAdditionalOptionImage",
            "1.0",
            $request->toArray()
        );
    }

    public function editInventoryImage(EditInventoryImageRequest $request) {
        return $this->post(
            "ItemsContentsService.EditInventoryImage",
            "1.0",
            $request->toArray()
        );
    }
}
