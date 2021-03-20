<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/FileUploader.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Service/ValidationService.php";
include_once __DIR__ . "/../../../common/src/Service/MessageService.php";
include_once __DIR__ . "/../../../common/src/Service/ProductValidator.php";
include_once __DIR__ . "/AbstractController.php";

class ProductController extends AbstractController
{


    public function create()
    {
        $oneProduct = [];

        include_once __DIR__ . "/../../views/product/form.php";
    }

    public function read()
    {
        $all_result = (new Product())->all();
        include_once __DIR__ . "/../../views/product/list.php";
    }

    public function update($id = null)
    {
        $id = !empty($id) ? $id : (int)$_GET['id'];
        if (empty($id)) die('Undefined ID');

        $oneProduct = (new Product())->getById($id);

        if (empty($oneProduct)) die('Product not found');

        include_once __DIR__ . "/../../views/product/form.php";

    }

    public function delete()
    {
        $id = (int)$_GET['id'];

        (new Product())->delete($id);

        return $this->read();
    }

    public function save()
    {
        if (!empty($_POST)) {

            $filename = FileUploader::upload('products');
            $_POST['picture'] = $filename;

            if (isset($_POST['status'])) {
                $status = 1;
            } else {
                $status = 0;
            }

            $now = date('Y-m-d H:i:s', time());

            if (!ProductValidator::validate()) {
                return !empty($_POST['id']) ? $this->update($_POST['id']) : $this->create();
            }

            $product = new Product(
                htmlspecialchars($_POST['id']),
                htmlspecialchars($_POST['title']),
                htmlspecialchars($filename ?? ''),
                htmlspecialchars($_POST['preview']),
                htmlspecialchars($_POST['content']),
                htmlspecialchars($_POST['price']),
                $status,
                $now,
                $now
            );

            $product->save();
        }
        return $this->read();
    }
}
