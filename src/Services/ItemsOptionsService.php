<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Requests\ItemsOptions\DeleteInventoryDataUnitRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\EditGoodsInventoryRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\EditGoodsOptionRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\EditGoodsTextOptionRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\InsertInventoryDataUnitRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOptions\UpdateInventoryDataUnitRequest;

class ItemsOptionsService extends AbstractService
{
    public function editGoodsInventory(EditGoodsInventoryRequest $request) {
        return $this->post(
            'ItemsOptions.EditGoodsInventory',
            "1.0",
            $request->toArray()
        );
    }

    public function editGoodsTextOption(EditGoodsTextOptionRequest $request) {
        return $this->post(
            'ItemsOptions.EditGoodsTextOption',
            "1.0",
            $request->toArray()
        );
    }

    public function editGoodsOption(EditGoodsOptionRequest $request) {
        return $this->post(
            'ItemsOptions.EditGoodsOption',
            "1.0",
            $request->toArray()
        );
    }

    public function deleteInventoryDataUnit(DeleteInventoryDataUnitRequest $request) {
        return $this->post(
            'ItemsOptions.DeleteInventoryDataUnit',
            "1.0",
            $request->toArray()
        );
    }

    public function insertInventoryDataUnit(InsertInventoryDataUnitRequest $request) {
        return $this->post(
            'ItemsOptions.InsertInventoryDataUnit',
            "1.0",
            $request->toArray()
        );
    }

    public function UpdateInventoryDataUnit(UpdateInventoryDataUnitRequest $request) {
        return $this->post(
            'ItemsOptions.UpdateInventoryDataUnit',
            "1.0",
            $request->toArray()
        );
    }
}
