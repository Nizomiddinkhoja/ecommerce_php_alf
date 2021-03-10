<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureOrderItem
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'order_id' => '1',
            'basket_id' => '1',
            'product_id' => '1',
            'quantity' => '1'
        ],
        [
            'id' => '2',
            'order_id' => '1',
            'basket_id' => '1',
            'product_id' => '1',
            'quantity' => '1'
        ],
        [
            'id' => '3',
            'order_id' => '1',
            'basket_id' => '1',
            'product_id' => '1',
            'quantity' => '1'
        ],
        [
            'id' => '4',
            'order_id' => '1',
            'basket_id' => '1',
            'product_id' => '1',
            'quantity' => '1'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }


    public function run()
    {

        foreach ($this->data as $shops) {

            $query = "INSERT INTO `order_item`(`id`, `order_id`, `basket_id`, `product_id`, `quantity`) VALUES (
            " . $shops['id'] . ",
            '" . $shops['order_id'] . "',
            '" . $shops['basket_id'] . "',
            '" . $shops['product_id'] . "',
            '" . $shops['quantity'] . "'
            )";

            $result = mysqli_query($this->conn, $query);

            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }

    }
}
