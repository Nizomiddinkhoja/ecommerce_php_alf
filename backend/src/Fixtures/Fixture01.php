<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture01
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => 'SON9999',
            'picture' => '01.jpg',
            'preview' => '1Звезда — массивное самосветящееся небесное',
            'content' => '1Звезда — массивное самосветящееся небесное тело, с...1Звезда — массивное самосветящееся небесное тело, с...',
            'price' => '12311',
            'status' => '1',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10'
        ],
        [
            'id' => 'null',
            'title' => '2',
            'picture' => '02.jpg',
            'preview' => '2Звезда — массивное самосветящееся небесное тело, с...',
            'content' => '2wadqwd',
            'price' => '12312',
            'status' => '1',
            'created' => '2021-01-23 08:28:13',
            'updated' => '2021-01-23 08:28:10'
        ],
        [
            'id' => 'null',
            'title' => '3',
            'picture' => '03.jpg',
            'preview' => '3Звезда — массивное самосветящееся небесное тело, с...',
            'content' => '3wadqwd',
            'price' => '12313',
            'status' => '1',
            'created' => '2021-01-23 09:28:13',
            'updated' => '2021-01-23 09:28:10'
        ],
        [
            'id' => 'null',
            'title' => '4',
            'picture' => '04.jpg',
            'preview' => '4Звезда — массивное самосветящееся небесное тело, с...',
            'content' => '4wadqwd',
            'price' => '12314',
            'status' => '1',
            'created' => '2021-01-23 01:28:13',
            'updated' => '2021-01-23 01:28:10'
        ],
        [
            'id' => 'null',
            'title' => '5',
            'picture' => '05.jpg',
            'preview' => '5Звезда — массивное самосветящееся небесное тело, с...',
            'content' => '5wadqwd',
            'price' => '12315',
            'status' => '1',
            'created' => '2021-01-23 02:28:13',
            'updated' => '2021-01-23 02:28:10'
        ],
        [
            'id' => 'null',
            'title' => '6',
            'picture' => '06.jpg',
            'preview' => '6Звезда — массивное самосветящееся небесное тело, с...',
            'content' => '6wadqwd',
            'price' => '12316',
            'status' => '1',
            'created' => '2021-01-23 03:28:13',
            'updated' => '2021-01-23 03:28:10'
        ],
        [
            'id' => 'null',
            'title' => '7',
            'picture' => '07.jpg',
            'preview' => '7Звезда — массивное самосветящееся небесное тело, с...',
            'content' => '7wadqwd',
            'price' => '12317',
            'status' => '1',
            'created' => '2021-01-23 04:28:13',
            'updated' => '2021-01-23 04:28:10'
        ],
        [
            'id' => 'null',
            'title' => '8',
            'picture' => '08.jpg',
            'preview' => '8Звезда — массивное самосветящееся небесное тело, с...',
            'content' => '8wadqwd',
            'price' => '12318',
            'status' => '1',
            'created' => '2021-01-23 05:28:13',
            'updated' => '2021-01-23 05:28:10'
        ],
        [
            'id' => 'null',
            'title' => '9',
            'picture' => '09.jpg',
            'preview' => '9Звезда — массивное самосветящееся небесное тело, с...',
            'content' => 'wadqwd9',
            'price' => '12319',
            'status' => '1',
            'created' => '2021-01-23 06:28:13',
            'updated' => '2021-01-23 06:28:10'
        ],
        [
            'id' => 'null',
            'title' => '10',
            'picture' => '10.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...10',
            'content' => 'wadqwd10',
            'price' => '123110',
            'status' => '1',
            'created' => '2021-01-23 00:28:13',
            'updated' => '2021-01-23 00:28:10'
        ],
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $product) {
            copy(__DIR__ . "/../../fixture_pics/" . $product['picture'], __DIR__ . "/../../../uploads/products/" . $product['picture']);

            $result = mysqli_query($this->conn, "INSERT INTO products VALUES (
            " . $product['id'] . ",
            '" . $product['title'] . "',
            '" . $product['picture'] . "',
            '" . $product['preview'] . "',
            '" . $product['content'] . "',
            '" . $product['price'] . "',
            '" . $product['status'] . "',
            '" . $product['created'] . "',
            '" . $product['updated'] . "'
            )");

            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }
    }
}
