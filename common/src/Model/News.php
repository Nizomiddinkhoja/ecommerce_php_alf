<?php
include_once __DIR__ . "/../Service/DBConnector.php";

class News
{
    public $id;
    public $title;
    public $content;
    public $created;
    public $updated;
    public $picture;
    public $preview;

    private $conn;

    public function __construct(
        $id = null,
        $title = null,
        $content = null,
        $created = null,
        $updated = null,
        $picture = null,
        $preview = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->picture = $picture;
        $this->preview = $preview;
        $this->created = $created;
        $this->updated = $updated;

    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `news` SET 
                            `title`='" . $this->title . "',
                            `content`='$this->content',
                            `updated`='$this->updated',
                            " .
                ((!empty($this->picture)) ? "`picture` = '$this->picture'," : "")
                . " 
                            `preview`='$this->preview'
                            WHERE id = $this->id";

        } else {
            $query = "INSERT INTO `news` VALUES (null,  '$this->title', '$this->content', '$this->created','$this->updated','$this->picture', '$this->preview')";
        }

        $result = mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $resultProducts = mysqli_query($this->conn, "SELECT * FROM news order by id desc ");
        return mysqli_fetch_all($resultProducts, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $oneProductResult = mysqli_query($this->conn, "select * from news where id = $id limit 1");
        $oneProduct = mysqli_fetch_all($oneProductResult, MYSQLI_ASSOC);
        return reset($oneProduct);
    }

    public function delete($id)
    {
        mysqli_query($this->conn, "DELETE FROM news WHERE id=$id limit 1");
    }
}
