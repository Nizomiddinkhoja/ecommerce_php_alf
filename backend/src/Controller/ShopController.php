<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/Model/Shop.php";
include_once __DIR__ . "/AbstractController.php";

class ShopController  extends AbstractController
{

    public function create()
    {
        $oneShop = [];

        include_once __DIR__ . "/../../views/shop/form.php";
    }

    public function read()
    {
        $all_result = (new Shop())->all();
        include_once __DIR__ . "/../../views/shop/list.php";
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if (empty($id)) die('Undefined ID');

        $oneShop = (new Shop())->getById($id);

        if (empty($oneShop)) die('Shop not found');

        include_once __DIR__ . "/../../views/shop/form.php";

    }

    public function delete()
    {
        $id = (int)$_GET['id'];

        (new Shop())->delete($id);

        return $this->read();
    }

    public function save()
    {
        if (!empty($_POST)) {

            $shop = new Shop(
                htmlspecialchars($_POST['id']),
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['address']),
                htmlspecialchars($_POST['city'])
            );

            $shop->save();
        }
        return $this->read();
    }
}
