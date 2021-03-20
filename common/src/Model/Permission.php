<?php
include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Permission extends AbstractModel
{
    public $id;
    public $permission;


    public function __construct(
        $id = null,
        $permission = null
    )
    {
        parent::__construct();

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
        $permissions = [];
        $result = mysqli_query($this->conn, "SELECT * FROM rbac_permission order by id desc ");

        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $permissions[] = $item['permission'];
        }

        return $permissions;
    }

    public function deleteByName($name)
    {

        $query = "DELETE FROM rbac_permission WHERE permission = '$name'";
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception('Permission Error', 400);
        }
    }

}
