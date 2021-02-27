<?php

include_once __DIR__ . '/../Model/Basket.php';
include_once __DIR__ . '/../Model/BasketItems.php';
include_once __DIR__ . '/../Service/BasketService.php';
include_once __DIR__ . '/Interfaces/BasketInterface.php';

class BasketDBService extends BasketService
{

    public static function getBasketByUserId($userId)
    {
        $basket = new Basket(1);

        if ($basket->getFromDB() == null) {
            $basket->userId = $userId;
            $basket->save();
        }

        return $basket->getFromDB();
    }

    public function updateBasketItem($basketId, $productId, $qty)
    {
        (new BasketItems($basketId, $productId, $qty))->update();
    }

    public function deleteBasketItem($basketId, $productId)
    {
        (new BasketItems($basketId, $productId))->deleteProductByBasketId();
    }

    public function createBasketItem($basketId, $productId, $qty)
    {
        $item = new BasketItems();
        $item->basketId = $basketId;
        $item->productId = $productId;
        $item->quantity = $qty;
        $item->save();
    }

    public function getBasketProducts($basketId)
    {
        return (new BasketItems())->getByBasketId($basketId);
    }

    public function clearBasket($basketId)
    {
        (new BasketItems())->clearByBasketId($basketId);
    }

    public function getBasketIdByUserId($userId)
    {
        return (new Basket($userId))->getFromDB()['id'];
    }
}