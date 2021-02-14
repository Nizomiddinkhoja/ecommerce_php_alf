<?php
include_once __DIR__ . "/../Service/DBConnector.php";

class Shop
{
    public $id;
    public $title;
    public $address;
    public $city;

    private $conn;

    public function __construct(
        $id = null,
        $title = null,
        $address = null,
        $city = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->title = $title;
        $this->address = $address;
        $this->city = $city;
    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `shops` SET 
                            `title`='" . $this->title . "',
                            `address`='$this->address',
                            `city`='$this->city'
                            WHERE id = $this->id";

        } else {
            $query = "INSERT INTO `shops` VALUES (null,  '$this->title', '$this->address', '$this->city')";
        }

        $result = mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM shops order by id desc ");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $oneResult = mysqli_query($this->conn, "select * from shops where id = $id limit 1");
        $result = mysqli_fetch_all($oneResult, MYSQLI_ASSOC);
        return reset($result);
    }

    public function delete($id)
    {
        mysqli_query($this->conn, "DELETE FROM shops WHERE id=$id limit 1");
    }
}
