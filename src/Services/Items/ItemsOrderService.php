<?php

namespace Yosida001\Qoo10Sdk\Services\Items;

use Yosida001\Qoo10Sdk\Requests\ItemsOrder\EditGoodsOrderLimitRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\EditMoveGoodsPriceRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\SetGoodsPriceQtyBulkRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\SetGoodsPriceQtyRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\UpdateItemDiscountRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsOrder\UpdateMoveItemDiscountRequest;
use Yosida001\Qoo10Sdk\Services\AbstractService;

class ItemsOrderService extends AbstractService
{
    protected $baseUri = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    public function setGoodsPriceQty(SetGoodsPriceQtyRequest $request)
    {
        return $this->post(
            'ItemsOrder.SetGoodsPriceQty',
            "1.0",
            $request->toArray()
        );
    }

    public function updateItemDiscount(UpdateItemDiscountRequest $request)
    {
        return $this->post(
            "ItemsOrder.UpdateItemDiscount",
            "1.0",
            $request->toArray()
        );
    }

    public function editGoodsOrderLimit(EditGoodsOrderLimitRequest $request)
    {
        return $this->post(
            "ItemsOrder.EditGoodsOrderLimit",
            "1.0",
            $request->toArray()
        );
    }

    public function setGoodsPriceQtyBulk(SetGoodsPriceQtyBulkRequest $request)
    {
        return $this->post(
            "ItemsOrder.SetGoodsPriceQtyBulk",
            "1.0",
            $request->toArray()
        );
    }

    public function editMoveGoodsPrice(EditMoveGoodsPriceRequest $request)
    {
        return $this->post(
            "ItemsOrder.EditMoveGoodsPrice",
            "1.0",
            $request->toArray()
        );
    }

    public function updateMoveItemDiscount(UpdateMoveItemDiscountRequest $request)
    {
        return $this->post(
            "ItemsOrder.UpdateMoveItemDiscount",
            "1.0",
            $request->toArray()
        );
    }
}
