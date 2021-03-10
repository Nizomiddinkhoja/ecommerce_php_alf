<?php

include_once __DIR__ . '/../Test/AbstractTest.php';
include_once __DIR__ . '/../Fixtures/FixtureBasket.php';
include_once __DIR__ . '/../Fixtures/FixtureBasketItem.php';
include_once __DIR__ . '/../Fixtures/FixtureBasketItem.php';
include_once __DIR__ . '/../../../frontend/src/Controller/OrderController.php';


class OrderControllerTest extends AbstractTest
{

    public function testCreate()
    {
        try {

            $this->dropTableByName('basket');
            $this->dropTableByName('basket_item');
            $this->dropTableByName('user');
            $this->dropTableByName('product');
            $this->dropTableByName('orders');
            $this->dropTableByName('order_item');
        } catch (Exception $e) {
        }


        $this->createTableByName('basket');
        $this->createTableByName('basket_item');
        $this->createTableByName('user');
        $this->createTableByName('products');
        $this->createTableByName('orders');
        $this->createTableByName('order_item');


        $this->copyTableByName('user');
        $this->copyTableByName('products');

        (new FixtureBasket($this->conn))->run();
        (new FixtureBasketItem($this->conn))->run();

        $_POST = [
            'name' => 'test',
            'phone' => '929292992',
            'email' => 'test@test.e',
            'delivery' => 2,
            'payment' => 2,
            'comment' => 'test'
        ];

        $orderController = new OrderController(($this->conn->connect()));
        $orderController->create();


        $orders = ((new Order())->setConn($this->conn->connect()))->all();

        if (sizeOf($orders) !== 1) {
            print "Error: wrong Orders count" . PHP_EOL;
            die("TEST WAS CRASHED");
        }

        $order = reset($orders);
        foreach (['email' => $_POST['email'], 'phone' => $_POST['phone']] as $key => $value) {
            if ($order[$key] !== $value) {
                print "Error: wrong value " . $key . PHP_EOL;
                die("TEST WAS CRASHED");
            }
        }

        $orderItems = (new OrderItems())->setConn($this->conn->connect())->getByBasketId($order['id']);


        if (sizeOf($orderItems) !== 4) {
            print "Error: wrong OrderItems count" . PHP_EOL;
            die("TEST WAS CRASHED");
        }

        foreach ($orderItems as $orderItem){
            if (!in_array($orderItem['product_id'], [1, 2, 3,4])) {
                print "Error: wrong OrderItems Id= " . $orderItem['product_id'] . PHP_EOL;
                die("TEST WAS CRASHED");
            }
        }

        $_POST = [];

        $this->dropTableByName('basket');
        $this->dropTableByName('basket_item');
        $this->dropTableByName('user');
        $this->dropTableByName('product');
        $this->dropTableByName('orders');
        $this->dropTableByName('order_item');
    }
}
