<?php
include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Role extends AbstractModel
{
    public $id;
    public $role;

    public function __construct(
        $id = null,
        $role = null
    )
    {
        parent::__construct();

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
        $result = mysqli_query($this->conn, "SELECT * FROM rbac_role ORDER BY  id DESC ");

        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $role[] = $item['role'];
        }

        return $role;
    }

}
