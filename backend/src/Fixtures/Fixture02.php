<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture02
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' => '1',
            'group_id' => 1,
            'parent_id' => 0
        ],
        [
            'id' => 'null',
            'title' => '2',
            'group_id' => 1,
            'parent_id' => 0
        ],
        [
            'id' => 'null',
            'title' => '3',
            'group_id' => 1,
            'parent_id' => 0
        ],
        [
            'id' => 'null',
            'title' => '4',
            'group_id' => 1,
            'parent_id' => 0
        ],
        [
            'id' => 'null',
            'title' => '5',
            'group_id' => 1,
            'parent_id' => 0
        ],
        [
            'id' => 'null',
            'title' => '6',
            'group_id' => 1,
            'parent_id' => 0
        ],
        [
            'id' => 'null',
            'title' => '7',
            'group_id' => 1,
            'parent_id' => 0
        ],
        [
            'id' => 'null',
            'title' => '8',
            'group_id' => 1,
            'parent_id' => 0
        ],
        [
            'id' => 'null',
            'title' => '9',
            'group_id' => 1,
            'parent_id' => 0
        ],
        [
            'id' => 'null',
            'title' => '10',
            'group_id' => 1,
            'parent_id' => 0
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }


    public function run()
    {

        foreach ($this->data as $category) {

            $result = mysqli_query($this->conn, "INSERT INTO categories VALUES (
            " . $category['id'] . ",
            '" . $category['title'] . "',
            '" . $category['group_id'] . "',
            '" . $category['parent_id'] . "'
            )");

            if (!$result) {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }

    }
}
