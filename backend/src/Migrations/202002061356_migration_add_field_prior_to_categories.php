<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class MigrationAddFieldPriorToCategory
{
    private $conn;

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function commit()
    {
        $result = mysqli_query($this->conn, "ALTER TABLE  categories ADD prior INT NOT NULL DEFAULT 0");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "ALTER TABLE categories DROP COLUMN prior");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}
