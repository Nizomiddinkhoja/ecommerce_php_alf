<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureOrders
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'user_id' => '1',
            'total' => '0',
            'payment_id' => '1',
            'delivery_id' => '1',
            'comment' => '1',
            'name' => '1',
            'phone' => '1',
            'email' => '1@1.1 ',
            'status' => '1',
            'created' => '2021-01-23 06:28:18',
            'updated' => '2021-01-23 06:28:18'
        ],
        [
            'id' => '2',
            'user_id' => '1',
            'total' => '0',
            'payment_id' => '1',
            'delivery_id' => '1',
            'comment' => '1',
            'name' => '1',
            'phone' => '1',
            'email' => '1@1.1 ',
            'status' => '1',
            'created' => '2021-01-23 06:28:19',
            'updated' => '2021-01-23 06:28:19'
        ],
        [
            'id' => '3',
            'user_id' => '1',
            'total' => '0',
            'payment_id' => '1',
            'delivery_id' => '1',
            'comment' => '1',
            'name' => '1',
            'phone' => '1',
            'email' => '1@1.1 ',
            'status' => '1',
            'created' => '2021-01-23 06:28:19',
            'updated' => '2021-01-23 06:28:19'
        ],
        [
            'id' => '4',
            'user_id' => '1',
            'total' => '0',
            'payment_id' => '1',
            'delivery_id' => '1',
            'comment' => '1',
            'name' => '1',
            'phone' => '1',
            'email' => '1@1.1 ',
            'status' => '1',
            'created' => '2021-01-23 06:28:19',
            'updated' => '2021-01-23 06:28:19'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }


    public function run()
    {

        foreach ($this->data as $shops) {

            $result = mysqli_query($this->conn, "INSERT INTO `orders` VALUES (
            " . $shops['id'] . ",
            '" . $shops['user_id'] . "',
            '" . $shops['total'] . "',
            '" . $shops['payment_id'] . "',
            '" . $shops['delivery_id'] . "',
            '" . $shops['comment'] . "',
            '" . $shops['name'] . "',
            '" . $shops['phone'] . "',
            '" . $shops['email'] . "',
            '" . $shops['status'] . "',
            '" . $shops['created'] . "',
            '" . $shops['updated'] . "'
            )");

            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }

    }
}
