<?php

namespace Yosida001\Qoo10Sdk\Services;

use Yosida001\Qoo10Sdk\Exceptions\Qoo10Exception;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\EditGoodsStatusRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\EditItemConditionRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\SetGoodsSubDeliveryGroupRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\SetNewGoodsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\SetNewMoveGoodsRequest;
use Yosida001\Qoo10Sdk\Requests\ItemsBasic\UpdateGoodsRequest;

class ItemsBasicService extends AbstractService
{
    protected $baseUri = 'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi';

    /**
     * @param SetNewGoodsRequest $request
     * @return mixed|string
     * @throws Qoo10Exception
     */
    public function setNewGoods(SetNewGoodsRequest $request) {
        return $this->post(
            'ItemsBasic.SetNewGoods',
            "1.1",
            $request->toArray()
        );
    }

    /**
     * @param SetNewMoveGoodsRequest $request
     * @return mixed|string
     * @throws Qoo10Exception
     */
    public function setNewMoveGoods(SetNewMoveGoodsRequest $request) {
        return $this->post(
            "ItemsBasic.SetNewMoveGoods",
            "1.0",
            $request->toArray()
        );
    }

    /**
     * @param UpdateGoodsRequest $request
     * @return mixed|string
     * @throws Qoo10Exception
     */
    public function updateGoods(UpdateGoodsRequest $request) {
        return $this->post(
            "ItemsBasic.UpdateGoods",
            "1.1",
            $request->toArray()
        );
    }

    /**
     * @param SetGoodsSubDeliveryGroupRequest $request
     * @return mixed|string
     * @throws Qoo10Exception
     */
    public function SetGoodsSubDeliveryGroup(SetGoodsSubDeliveryGroupRequest $request) {
        return $this->post(
            'ItemsBasic.SetGoodsSubDeliveryGroup',
            '1.0',
            $request->toArray()
        );
    }

    /**
     * @param EditGoodsStatusRequest $request
     * @return mixed|string
     * @throws Qoo10Exception
     */
    public function editGoodsStatus(EditGoodsStatusRequest $request) {
        return $this->post(
            "ItemsBasic.EditGoodsStatus",
            "1.0",
            $request->toArray()
        );
    }

    /**
     * @param EditItemConditionRequest $request
     * @return mixed|string
     * @throws Qoo10Exception
     */
    public function editItemCondition(EditItemConditionRequest $request) {
        return $this->post(
            "ItemsBasic.EditItemCondition",
            "1.0",
            $request->toArray()
        );
    }
}
