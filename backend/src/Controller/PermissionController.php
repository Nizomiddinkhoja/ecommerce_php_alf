<?php

include_once __DIR__ . "/../../../common/src/Model/Permission.php";
include_once __DIR__ . "/AbstractController.php";

class PermissionController extends AbstractController
{

    public function create()
    {
        $one = [];

        include_once __DIR__ . "/../../views/permission/form.php";
    }

    public function read()
    {
        $all = (new Permission())->all();
        include_once __DIR__ . "/../../views/permission/list.php";
    }

    public function delete()
    {
        $name = $_GET['name'];

        (new Permission())->deleteByName($name);

        return $this->read();
    }

    public function save()
    {
        if (!empty($_POST)) {

            $product = new Permission(null, htmlspecialchars($_POST['permission']));

            $product->save();
        }
        return $this->read();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
