<?php

include_once __DIR__ . '/../Model/Basket.php';
include_once __DIR__ . '/../Model/BasketItems.php';
include_once __DIR__ . '/BasketService.php';
include_once __DIR__ . '/Interfaces/BasketInterface.php';

class BasketDBService extends BasketService
{
    const  TEST_USER_ID = 1;
    private $conn;

    public function __construct($conn = null)
    {
        $this->conn = $conn;
    }

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

        if (!empty($this->conn)) {
            return (new BasketItems())->setConn($this->conn)->getByBasketId($basketId);
        }

        return (new BasketItems())->getByBasketId($basketId);
    }

    public function clearBasket($basketId)
    {
        if (!empty($this->conn)) {
            (new BasketItems())->setConn($this->conn)->clearByBasketId($basketId);
        }
        (new BasketItems())->clearByBasketId($basketId);
    }

    public function getBasketIdByUserId($userId)
    {
        if (!empty($this->conn)) {
            return self::TEST_USER_ID;
        }

        return (new Basket($userId))->getFromDB()['id'];
    }

    public static function defineBasketDetails()
    {
        $user = UserService::getCurrentUser();

        if (!isset($user['login'])) {
            throw new Exception('No permissions', 403);
        }

        $basket = BasketDBService::getBasketByUserId($user['id']);
//        $this->basketService = new BasketDBService();
//        $this->basketService = new BasketSessionService();
//        $this->basketService = new BasketCookieService();

        return (new BasketDBService())->getBasketProducts((int)$basket['id']);
    }
}
