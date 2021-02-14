<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture03
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => '1',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '01.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ],
        [
            'id' => 'null',
            'title' => '2',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '02.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ],
        [
            'id' => 'null',
            'title' => '3',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '03.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ],
        [
            'id' => 'null',
            'title' => '4',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '04.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ],
        [
            'id' => 'null',
            'title' => '5',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '05.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ],
        [
            'id' => 'null',
            'title' => '6',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '01.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ],
        [
            'id' => 'null',
            'title' => '7',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '02.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ],
        [
            'id' => 'null',
            'title' => '8',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '03.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ],
        [
            'id' => 'null',
            'title' => '9',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '04.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ],
        [
            'id' => 'null',
            'title' => '10',
            'body' => 'wadqwd',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '05.jpg',
            'preview' => 'Звезда — массивное самосветящееся небесное тело, с...'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }


    public function run()
    {

        foreach ($this->data as $news) {

            copy(__DIR__ . "/../../fixture_pics/" . $news['picture'],
                __DIR__ . "/../../../uploads/products/" . $news['picture']);

            $result = mysqli_query($this->conn, "INSERT INTO news VALUES (
            " . $news['id'] . ",
            '" . $news['title'] . "',
            '" . $news['body'] . "',
            '" . $news['created'] . "',
            '" . $news['updated'] . "',
            '" . $news['picture'] . "',
            '" . $news['preview'] . "'
            )");

            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }

    }
}
