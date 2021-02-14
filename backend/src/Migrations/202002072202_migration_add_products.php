<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class MigrationAddProducts
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => '1',
            'picture' => '01.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...',
            'content' => 'wadqwd',
            'price' => 1231,
            'status' => 1,
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10'
        ],
        [
            'id' => 'null',
            'title' => '2',
            'picture' => '02.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...',
            'content' => 'wadqwd',
            'price' => 1231,
            'status' => 1,
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10'
        ],
        [
            'id' => 'null',
            'title' => '3',
            'picture' => '03.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...',
            'content' => 'wadqwd',
            'price' => 1231,
            'status' => 1,
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10'
        ],
        [
            'id' => 'null',
            'title' => '4',
            'picture' => '04.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...',
            'content' => 'wadqwd',
            'price' => 1231,
            'status' => 1,
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10'
        ],
        [
            'id' => 'null',
            'title' => '5',
            'picture' => '05.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...',
            'content' => 'wadqwd',
            'price' => 1231,
            'status' => 1,
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10'
        ]
    ];

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function commit()
    {
        foreach ($this->data as $product) {
            copy(__DIR__ . "/../../fixture_pics/" . $product['picture'],
                __DIR__ . "/../../../uploads/products/" . $product['picture']);
            $result = mysqli_query($this->conn, "INSERT INTO products VALUES (
            " . $product['id'] . ",
            '" . $product['title'] . "',
            '" . $product['picture'] . "',
            '" . $product['preview'] . "',
            '" . $product['content'] . "',
            " . $product['price'] . ",
            " . $product['status'] . ",
            '" . $product['created'] . "',
            '" . $product['updated'] . "'
            )");
            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "TRUNCATE TABLE products");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}
