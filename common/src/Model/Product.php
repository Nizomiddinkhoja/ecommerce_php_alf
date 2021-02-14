<?php
include_once __DIR__ . "/../Service/DBConnector.php";

class Product
{
    public $id;
    public $title;
    public $picture;
    public $preview;
    public $content;
    public $price;
    public $status;
    public $created;
    public $updated;

    private $conn;

    public function __construct(
        $id = null,
        $title = null,
        $picture = null,
        $preview = null,
        $content = null,
        $price = null,
        $status = null,
        $created = null,
        $updated = null
    )
    {

        $this->conn = DBConnector::getInstance()->connect();


        $this->id = $id;
        $this->title = $title;
        $this->picture = $picture;
        $this->preview = $preview;
        $this->content = $content;
        $this->price = $price;
        $this->status = $status;
        $this->created = $created;
        $this->updated = $updated;

    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `products` SET 
                            `title`='" . $this->title . "',
                            `preview`='$this->preview'," .
                ((!empty($this->picture)) ? "`picture` = '$this->picture'," : "")
                . " `content`='$this->content',
                            `price`='$this->price',
                            `updated`='$this->updated',
                            `status`='$this->status' 
                            WHERE id = $this->id";

        } else {
            $query = "INSERT INTO `products` VALUES (null,  '$this->title', '$this->picture', '$this->preview', '$this->content', '$this->price', '$this->status', '$this->created', '$this->updated')";
        }

        $result = mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $resultProducts = mysqli_query($this->conn, "SELECT * FROM products order by id desc ");
        return mysqli_fetch_all($resultProducts, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $oneProductResult = mysqli_query($this->conn, "select * from products where id = $id limit 1");
        $oneProduct = mysqli_fetch_all($oneProductResult, MYSQLI_ASSOC);
        return reset($oneProduct);
    }

    public function delete($id)
    {
        mysqli_query($this->conn, "DELETE FROM products WHERE id=$id limit 1");
    }
}
