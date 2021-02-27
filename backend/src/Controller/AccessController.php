<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/Model/Role.php";
include_once __DIR__ . "/../../../common/src/Model/Permission.php";
include_once __DIR__ . "/../../../common/src/Service/FileUploader.php";
include_once __DIR__ . "/AbstractController.php";

class AccessController extends AbstractController
{

    public function create()
    {
    }

    public function read()
    {
    }

    public function update()
    {

        $roles = (new Role())->all();
        $permissions = (new Permission())->all();

        include_once __DIR__ . "/../../views/access/form.php";

    }

    public function delete()
    {
    }

    public function save()
    {
        if (!empty($_POST)) {
            print_r($_POST);
        }
        return $this->read();
    }
}
