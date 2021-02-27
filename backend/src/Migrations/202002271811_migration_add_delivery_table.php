<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Model/User.php";

class MigrationAddDeliveryTable
{
    private $conn;

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function commit()
    {
        $result = mysqli_query($this->conn, "
            CREATE TABLE `delivery` (
                 `id` int(11) NOT NULL AUTO_INCREMENT,
                 `title` varchar(64) NOT NULL,
                 `code` varchar(64) NOT NULL,
                 `priority` int(11) NOT NULL,
                 PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }


    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "DROP TABLE `delivery`");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}
