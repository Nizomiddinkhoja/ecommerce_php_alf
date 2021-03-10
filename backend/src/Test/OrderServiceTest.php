<?php

include_once __DIR__ . '/../../../common/src/Service/OrderService.php';
include_once __DIR__ . '/../../../common/src/Model/Order.php';
include_once __DIR__ . '/../Test/AbstractTest.php';
include_once __DIR__ . '/../Fixtures/Fixture01.php';
include_once __DIR__ . '/../Fixtures/FixtureOrderItem.php';
include_once __DIR__ . '/../Fixtures/FixtureOrders.php';


class OrderServiceTest extends AbstractTest
{
//    public function __construct()
//    {
//        parent::copyTableByName('products');
//        self::testCalcTotal();
//    }

    public function testCalcTotal()
    {
        $this->createTableByName('products');
        $this->createTableByName('orders');
        $this->createTableByName('order_item');

//        $this->copyTableByName('products');
//        $this->copyTableByName('orders');
//        $this->copyTableByName('order_item');

        $productFixture = (new Fixture01($this->conn));
        $productFixture->run();
        $orderFixture = (new FixtureOrders($this->conn));
        $orderFixture->run();
        $orderItemFixture = (new FixtureOrderItem($this->conn));
        $orderItemFixture->run();

        $orderService = new OrderService();

        $orderObject = new Order();
        $orderObject->setConn($this->conn->connect());


        $quantityAndProducts = $orderObject->getProductsAndQuantityByOrderId(1);

        if (!method_exists($orderService, 'calcTotal')) {
            print "Error: CalcTotal() is not exists" . PHP_EOL;
            die("TEST WAS CRASHED");
        }

        $total = $orderService->calcTotal($quantityAndProducts);

        if (4 !== $total) {
            print "Error: CalcTotal() is not correct" . PHP_EOL;
            die("TEST WAS CRASHED");
        }

        $this->dropTableByName('products');
        $this->dropTableByName('orders');
        $this->dropTableByName('order_item');
    }
}
