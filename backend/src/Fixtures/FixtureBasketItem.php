<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureBasketItem
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'basket_id' => '1',
            'product_id' => '1',
            'quantity' => '4'
        ],
        [
            'id' => '2',
            'basket_id' => '1',
            'product_id' => '2',
            'quantity' => '2'
        ],
        [
            'id' => '3',
            'basket_id' => '1',
            'product_id' => '3',
            'quantity' => '3'
        ],
        [
            'id' => '4',
            'basket_id' => '1',
            'product_id' => '4',
            'quantity' => '4'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }


    public function run()
    {

        foreach ($this->data as $shops) {

            $result = mysqli_query($this->conn, "INSERT INTO `basket_item` VALUES (
            " . $shops['id'] . ",
            '" . $shops['basket_id'] . "',
            '" . $shops['product_id'] . "',
            '" . $shops['quantity'] . "'
            )");

            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }

    }
}
