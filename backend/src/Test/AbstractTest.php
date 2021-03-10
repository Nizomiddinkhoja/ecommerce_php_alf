<?php


abstract class AbstractTest
{
//CREATE USER 'shop_test_user'@'localhost' IDENTIFIED BY 'user_test_password'
    protected $conn;

    const  DB_PRODUCT_NAME = 'db_shop';
    const  DB_TEST_NAME = 'db_shop_test';

    public function __construct()
    {
        $this->conn = new DBConnector(
            'localhost',
            'shop_test_user',
            'shop_test_password',
            'db_shop_test');
    }

    public function copyTableByName($name)
    {
        $query = "INSERT INTO " . self::DB_TEST_NAME . "." . $name
            . " select * from " . self::DB_PRODUCT_NAME . "." . $name;

        mysqli_query($this->conn->connect(), $query);

    }

    public function createTableByName($name)
    {
        $query = "show create table " . self::DB_PRODUCT_NAME . "." . $name;

        $result = mysqli_query($this->conn->connect(), $query);

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_query($this->conn->connect(), $result[0]['Create Table']);

        mysqli_query($this->conn->connect(), "TRUNCATE TABLE " . self::DB_TEST_NAME . "." . $name);

    }

    public function dropTableByName($name)
    {
        $query = "DROP TABLE " . self::DB_TEST_NAME . "." . $name;
        mysqli_query($this->conn->connect(), $query);
    }
}
