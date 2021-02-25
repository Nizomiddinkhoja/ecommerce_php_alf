<?php

include_once __DIR__ . "/../../../common/src/Service/OrderService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Service/BasketCookieService.php";
include_once __DIR__ . "/../../../common/src/Service/BasketDBService.php";
include_once __DIR__ . "/../../../common/src/Model/Order.php";
include_once __DIR__ . "/../../../common/src/Model/OrderItems.php";

class OrderController
{
    /**
     * @var BasketService $basketService
     */
    private $basketService;


    public function __construct()
    {
        $this->basketService = new BasketDBService();
//        $this->basketService = new BasketCookieService();
    }

    public function index()
    {
        include_once __DIR__ . "/../../views/order/form.php";
    }

    public function create()

    {
        $name = htmlspecialchars($_POST['name']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);

        $userId = (new UserService)->getCurrentUser()['id'] ?? 0;
        $payment = (int)$_POST['payment'];
        $delivery = (int)$_POST['delivery'];
        $total = 0;
        $comment = htmlspecialchars($_POST['comment']);
        $status = OrderService::STATUS_NEW;
        $updated = date('Y-m-d H:i:s', time());

        $order = new Order(
            null,
            $userId,
            $payment,
            $delivery,
            $total,
            $comment,
            $name,
            $phone,
            $email,
            $status,
            $updated);


        $orderId = $order->save();


        if (empty($orderId)) {
            throw new Exception('Order ID in null', 400);
        }

        $basketId = $this->basketService->getBasketIdByUserId($userId);
        $items = $this->basketService->getBasketProducts($basketId);

        if (empty($items)) {
            throw new Exception('Basket is empty', 400);
        }

        foreach ($items as $item) {
            $orderItem = new OrderItems($orderId, (int)$item['product_id'], (int)$item['quantity']);
            $orderItem->save();
        }

        $this->basketService->clearBasket($basketId);

        header("Location: /shop/frontend/index.php?model=order&action=success&order_id=" . $orderId);
    }


    public function success()
    {
        $orderId = $_GET['order_id'];

        include_once __DIR__ . "/../../views/order/success.php";
    }

}
