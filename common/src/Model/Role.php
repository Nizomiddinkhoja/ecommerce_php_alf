<?php
include_once __DIR__ . "/../Service/DBConnector.php";

class Role
{
    public $id;
    public $role;

    private $conn;

    public function __construct(
        $id = null,
        $role = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->role = $role;
    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `rbac_role` SET 
                            `role`='" . $this->role . "'
                            WHERE id = $this->id";
        } else {
            $query = "INSERT INTO `rbac_role` VALUES (null,  '$this->role')";
        }

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception('Role Error', 400);
        }

    }

    public function all()
    {
        $role=[];
        $result = mysqli_query($this->conn, "SELECT * FROM rbac_role order by id desc ");

        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $role[] = $item['role'];
        }

        return $role;
    }

}
