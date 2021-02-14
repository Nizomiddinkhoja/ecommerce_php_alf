<?php
include_once __DIR__ . "/../Service/DBConnector.php";

class Category
{
    public $id;
    public $title;
    public $groupId;
    public $parentId;
    public $prior;

    private $conn;

    public function __construct(
        $id = null,
        $title = null,
        $groupId = null,
        $parentId = null,
        $prior = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->title = $title;
        $this->groupId = $groupId;
        $this->parentId = $parentId;
        $this->prior = $prior;
    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `categories` SET 
                            `title`='" . $this->title . "',
                            `group_id`='$this->groupId',
                            `parent_id`='$this->parentId',
                            `prior`='$this->prior'
                            WHERE id = $this->id";

        } else {
            $query = "INSERT INTO `categories` VALUES (null,  '$this->title', '$this->groupId', '$this->parentId', '$this->prior')";
        }

        $result = mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM categories order by id desc ");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $oneResult = mysqli_query($this->conn, "select * from categories where id = $id limit 1");
        $result = mysqli_fetch_all($oneResult, MYSQLI_ASSOC);
        return reset($result);
    }

    public function delete($id)
    {
        mysqli_query($this->conn, "DELETE FROM categories WHERE id=$id limit 1");
    }
}
