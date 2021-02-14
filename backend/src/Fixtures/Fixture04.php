<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture04
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => '1',
            'address' => 'wadqwd',
            'city' => 'Khujand'
        ],
        [
            'id' => 'null',
            'title' => '2',
            'address' => 'wadqwd',
            'city' => 'Khujand'
        ],
        [
            'id' => 'null',
            'title' => '3',
            'address' => 'wadqwd',
            'city' => 'Khujand'
        ],
        [
            'id' => 'null',
            'title' => '4',
            'address' => 'wadqwd',
            'city' => 'Khujand'
        ],
        [
            'id' => 'null',
            'title' => '5',
            'address' => 'wadqwd',
            'city' => 'Khujand'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }


    public function run()
    {

        foreach ($this->data as $shops) {

            $result = mysqli_query($this->conn, "INSERT INTO shops VALUES (
            " . $shops['id'] . ",
            '" . $shops['title'] . "',
            '" . $shops['address'] . "',
            '" . $shops['city'] . "'
            )");

            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }

    }
}
