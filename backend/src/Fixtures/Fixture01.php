<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture01
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'title' => '1',
            'picture' => '01.jpg',
            'preview' => '1',
            'content' => '1',
            'price' => '1',
            'status' => '1',
            'created' => '2021-01-23 07:28:11',
            'updated' => '2021-01-23 07:28:11'
        ],
        [
            'id' => '2',
            'title' => '2',
            'picture' => '02.jpg',
            'preview' => '2',
            'content' => '2',
            'price' => '2',
            'status' => '1',
            'created' => '2021-01-23 08:28:22',
            'updated' => '2021-01-23 08:28:22'
        ],
        [
            'id' => '3',
            'title' => '3',
            'picture' => '03.jpg',
            'preview' => '3',
            'content' => '3',
            'price' => '3',
            'status' => '1',
            'created' => '2021-01-23 09:28:33',
            'updated' => '2021-01-23 09:28:33'
        ],
        [
            'id' => '4',
            'title' => '4',
            'picture' => '04.jpg',
            'preview' => '4',
            'content' => '4',
            'price' => '4',
            'status' => '1',
            'created' => '2021-01-23 01:28:44',
            'updated' => '2021-01-23 01:28:44'
        ],
        [
            'id' => '5',
            'title' => '5',
            'picture' => '05.jpg',
            'preview' => '5',
            'content' => '5',
            'price' => '5',
            'status' => '1',
            'created' => '2021-01-23 02:28:15',
            'updated' => '2021-01-23 02:28:15'
        ],
        [
            'id' => '6',
            'title' => '6',
            'picture' => '06.jpg',
            'preview' => '6',
            'content' => '6',
            'price' => '6',
            'status' => '1',
            'created' => '2021-01-23 03:28:16',
            'updated' => '2021-01-23 03:28:16'
        ],
        [
            'id' => '7',
            'title' => '7',
            'picture' => '07.jpg',
            'preview' => '7',
            'content' => '7',
            'price' => '7',
            'status' => '1',
            'created' => '2021-01-23 04:28:17',
            'updated' => '2021-01-23 04:28:17'
        ],
        [
            'id' => '8',
            'title' => '8',
            'picture' => '08.jpg',
            'preview' => '8',
            'content' => '8',
            'price' => '8',
            'status' => '1',
            'created' => '2021-01-23 05:28:18',
            'updated' => '2021-01-23 05:28:18'
        ],
        [
            'id' => '9',
            'title' => '9',
            'picture' => '09.jpg',
            'preview' => '9',
            'content' => '9',
            'price' => '9',
            'status' => '1',
            'created' => '2021-01-23 06:28:19',
            'updated' => '2021-01-23 06:28:19'
        ],
        [
            'id' => '10',
            'title' => '10',
            'picture' => '10.jpg',
            'preview' => '10',
            'content' => '10',
            'price' => '10',
            'status' => '1',
            'created' => '2021-01-23 00:28:10',
            'updated' => '2021-01-23 00:28:10'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $product) {
            copy(__DIR__ . "/../../fixtures_pics/" . $product['picture'], __DIR__ . "/../../../uploads/products/" . $product['picture']);

            $query = "INSERT INTO `products`
            (`id`, 
            `title`, 
            `picture`, 
            `preview`, 
            `content`, 
            `price`, 
            `status`, 
            `created`, 
            `updated`)  VALUES (
              " . $product['id'] . " ,
            '" . $product['title'] . "',
            '" . $product['picture'] . "',
            '" . $product['preview'] . "',
            '" . $product['content'] . "',
            '" . $product['price'] . "',
            '" . $product['status'] . "',
            '" . $product['created'] . "',
            '" . $product['updated'] . "'
            )";

            $result = mysqli_query($this->conn, $query);

            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }
    }
}
