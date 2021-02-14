<?php
include_once __DIR__ . "/../Service/DBConnector.php";

class Basket
{
    public $id;
    public $userId;
    public $items = [];

    private $conn;

    public function __construct($userId = null)
    {

        $this->conn = DBConnector::getInstance()->connect();


//        $this->id = $id;
        $this->userId = $userId;
//        $this->items = $items;
    }

    public function save()
    {
        $query = "INSERT INTO `basket` VALUES (null, '$this->userId')";


        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function getFromDB()
    {
        $oneProductResult = mysqli_query($this->conn, "select * from basket where user_id = ". $this->userId. " limit 1");
        $one = mysqli_fetch_all($oneProductResult, MYSQLI_ASSOC);
        return reset($one);
    }

    public function deleteUserById($userId)
    {
        mysqli_query($this->conn, "DELETE FROM basket WHERE user_id=$userId limit 1");
    }
}
