<?php
include_once __DIR__ . "/../Service/DBConnector.php";

class Permission
{
    public $id;
    public $permission;

    private $conn;

    public function __construct(
        $id = null,
        $permission = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->permission = $permission;
    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `rbac_permission` SET 
                            `role`='" . $this->permission . "'
                            WHERE id = $this->id";
        } else {
            $query = "INSERT INTO `rbac_permission` VALUES (null,  '$this->permission')";
        }

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception('Permission Error', 400);
        }

    }

    public function all()
    {
        $permissions=[];
        $result = mysqli_query($this->conn, "SELECT * FROM rbac_permission order by id desc ");

        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $permissions[] = $item['permission'];
        }

        return $permissions;
    }

}
