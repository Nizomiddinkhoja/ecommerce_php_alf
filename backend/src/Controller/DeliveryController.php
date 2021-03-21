<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/Model/Delivery.php";
include_once __DIR__ . "/../../../common/src/Service/FileUploader.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/AbstractController.php";

class DeliveryController extends AbstractController
{
    public function create()
    {
        $result = [];

        include_once __DIR__ . "/../../views/delivery/form.php";
    }

    public function read()
    {
        $result = (new Delivery())->all();
        include_once __DIR__ . "/../../views/delivery/list.php";
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if (empty($id)) die('Undefined ID');

        $result = (new Delivery())->getById($id);

        if (empty($result)) die('Delivery not found');

        include_once __DIR__ . "/../../views/delivery/form.php";

    }

    public function delete()
    {
        $id = (int)$_GET['id'];

        (new Delivery())->deleteById($id);

        return $this->read();
    }


    public function save()
    {
        if (!empty($_POST)) {
            $product = new Delivery(
                intval($_POST['id']),
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['code']),
                htmlspecialchars($_POST['priority'])
            );
            $product->save();
        }
        return $this->read();
    }
}
