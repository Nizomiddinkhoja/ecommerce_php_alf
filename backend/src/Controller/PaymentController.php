<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/Model/Payment.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/AbstractController.php";

class PaymentController extends AbstractController
{
    public function create()
    {
        $result = [];

        include_once __DIR__ . "/../../views/payment/form.php";
    }

    public function read()
    {
        $result = (new Payment())->all();
        include_once __DIR__ . "/../../views/payment/list.php";
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if (empty($id)) die('Undefined ID');

        $result = (new Payment())->getById($id);

        if (empty($result)) die('Payment not found');

        include_once __DIR__ . "/../../views/payment/form.php";

    }

    public function delete()
    {
        $id = (int)$_GET['id'];
        (new Payment())->deleteById($id);
        return $this->read();
    }


    public function save()
    {
        if (!empty($_POST)) {
            $product = new Payment(
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
