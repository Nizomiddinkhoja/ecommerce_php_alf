<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class MigrationAddFieldCityToShops
{
    private $conn;

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function commit()
    {
        $result = mysqli_query($this->conn, "ALTER TABLE  shops ADD city VARCHAR(63)");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }


        $result = mysqli_query($this->conn, "UPDATE shops SET city = 'Khujand' WHERE address = 'khujand'");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "UPDATE shops SET city = 'New-York' WHERE address = 'address12'");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "UPDATE shops SET city = 'London' WHERE address = 'address123'");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "ALTER TABLE shops DROP COLUMN city");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}
