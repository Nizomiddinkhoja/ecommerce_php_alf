<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Model/User.php";

class MigrationAddUserTable
{
    private $conn;

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function commit()
    {
        $result = mysqli_query($this->conn, "
            CREATE TABLE `user` (
                 `id` int(11) NOT NULL AUTO_INCREMENT,
                 `name` varchar(256) NOT NULL,
                 `phone` varchar(256) NOT NULL UNIQUE,
                 `email` varchar(256) NOT NULL UNIQUE,
                 `password` varchar(128) NOT NULL,
                 `roles` varchar(256) NOT NULL,
                 PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "INSERT INTO `user`(`id`, `name`, `phone`, `email`, `password`, `roles`) 
        VALUES (null,'admin','+992919100333','nizomiddinkhoja@gmail.com','" . UserService::encodePassword('admin') . "'," . json_encode('ROLE_SUPER_ADMIN') . ")");

        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "DROP TABLE user");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}
