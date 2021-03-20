<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Access extends AbstractModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "select * from rbac_access");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function clear()
    {
        $result = mysqli_query($this->conn, "truncate table rbac_access");

        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }

        return true;
    }

    public function createAll(array $data)
    {
        if (empty($data)) {
            throw new Exception('Empty access Data');
        }

        $accesses = [];

        foreach ($data as $role => $perms) {
            foreach ($perms as $perm => $value) {
                if ($value === 'on') $accesses[] = sprintf("('%s', '%s')", $role, $perm);
            }
        }

        if (empty($accesses)) {
            throw new Exception('Empty Data for access Insert');
        }

        $query = "INSERT INTO `rbac_access` (`role`, `permission`) VALUES " . implode(',', $accesses);


        $result = mysqli_query($this->conn, $query);


        if (!$result) {
            throw new Exception('omad',400);
        }


        return true;
    }
}
