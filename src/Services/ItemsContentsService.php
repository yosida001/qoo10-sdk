<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditAdditionalOptionImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsContentsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsHeaderFooterRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditGoodsMultiImageRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsContents\EditInventoryImageRequest;

class ItemsContentsService extends AbstractService
{
    public function editGoodsContents(EditGoodsContentsRequest $request) {
        return $this->post(
            "ItemsContents.EditGoodsContents",
            "1.0",
            $request->toArray()
        );
    }

    public function editGoodsImage(EditGoodsImageRequest $request) {
        return $this->post(
            "ItemsContents.EditGoodsImage",
            "1.1",
            $request->toArray()
        );
    }

    public function editGoodsMultiImage(EditGoodsMultiImageRequest $request) {
        return $this->post(
            "ItemsContents.EditGoodsMultiImage",
            "1.0",
            $request->toArray()
        );
    }

    public function editGoodsHeaderFooter(EditGoodsHeaderFooterRequest $request) {
        return $this->post(
            "ItemsContents.EditGoodsHeaderFooter",
            "1.0",
            $request->toArray()
        );
    }

    public function editAdditionalOptionImage(EditAdditionalOptionImageRequest $request) {
        return $this->post(
            "ItemsContents.EditAdditionalOptionImage",
            "1.0",
            $request->toArray()
        );
    }

    public function editInventoryImage(EditInventoryImageRequest $request) {
        return $this->post(
            "ItemsContents.EditInventoryImage",
            "1.0",
            $request->toArray()
        );
    }
}
