<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture03
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => '1',
            'content' => '1',
            'created' => '2021-01-23 07:28:11',
            'updated' => '2021-01-23 07:28:11',
            'picture' => '01.jpg',
            'preview' => '1'
        ],
        [
            'id' => 'null',
            'title' => '2',
            'content' => '2',
            'created' => '2021-01-23 07:28:12',
            'updated' => '2021-01-23 07:28:12',
            'picture' => '02.jpg',
            'preview' => '2'
        ],
        [
            'id' => 'null',
            'title' => '3',
            'content' => '3',
            'created' => '2021-01-23 07:28:13',
            'updated' => '2021-01-23 07:28:13',
            'picture' => '03.jpg',
            'preview' => '3'
        ],
        [
            'id' => 'null',
            'title' => '4',
            'content' => '4',
            'created' => '2021-01-23 07:28:14',
            'updated' => '2021-01-23 07:28:14',
            'picture' => '04.jpg',
            'preview' => '4'
        ],
        [
            'id' => 'null',
            'title' => '5',
            'content' => '5',
            'created' => '2021-01-23 07:28:15',
            'updated' => '2021-01-23 07:28:15',
            'picture' => '05.jpg',
            'preview' => '5'
        ],
        [
            'id' => 'null',
            'title' => '6',
            'content' => '6',
            'created' => '2021-01-23 07:28:16',
            'updated' => '2021-01-23 07:28:16',
            'picture' => '06.jpg',
            'preview' => '6'
        ],
        [
            'id' => 'null',
            'title' => '7',
            'content' => '7',
            'created' => '2021-01-23 07:28:17',
            'updated' => '2021-01-23 07:28:17',
            'picture' => '07.jpg',
            'preview' => '7'
        ],
        [
            'id' => 'null',
            'title' => '8',
            'content' => '8',
            'created' => '2021-01-23 07:28:18',
            'updated' => '2021-01-23 07:28:18',
            'picture' => '08.jpg',
            'preview' => '8'
        ],
        [
            'id' => 'null',
            'title' => '9',
            'content' => '9',
            'created' => '2021-01-23 07:28:19',
            'updated' => '2021-01-23 07:28:19',
            'picture' => '09.jpg',
            'preview' => '9'
        ],
        [
            'id' => 'null',
            'title' => '10',
            'content' => '10',
            'created' => '2021-01-23 07:28:10',
            'updated' => '2021-01-23 07:28:10',
            'picture' => '10.jpg',
            'preview' => '10'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }


    public function run()
    {

        foreach ($this->data as $news) {

            copy(__DIR__ . "/../../fixtures_pics/" . $news['picture'],
                __DIR__ . "/../../../uploads/news/" . $news['picture']);

            $query = "INSERT INTO `news`
            (`id`, 
            `title`, 
            `content`, 
            `created`, 
            `updated`, 
            `picture`, 
            `preview`) VALUES (
              " . $news['id'] . " ,
            '" . $news['title'] . "',
            '" . $news['content'] . "',
            '" . $news['created'] . "',
            '" . $news['updated'] . "',
            '" . $news['picture'] . "',
            '" . $news['preview'] . "'
            )";

            $result = mysqli_query($this->conn, $query);

            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }

    }
}
