<?php

include_once __DIR__ . "/../../../../common/src/Model/Product.php";

class ProductController
{

    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
    }

    public function index()
    {
        $all = (new Product())->getAllForExport(100);

        print json_encode($all);
        die();

    }

    public function view()
    {
        $product = (new Product())->getById((int)$_GET['id']);

        print json_encode($product);
        die();

    }

    public function create()
    {
        try {
            $data = $_POST;
            $product = new Product(
                null,
                htmlspecialchars($data['title']),
                htmlspecialchars($data['picture']),
                htmlspecialchars($data['preview']),
                htmlspecialchars($data['content']),
                intval($data['price']),
                htmlspecialchars($data['status']),
                date('Y-m-d H:i:s', time()),
                date('Y-m-d H:i:s', time())
            );

            $product->save();

            print json_encode([
                'result' => 'ok'
            ]);

        } catch (Exception $e) {
            throw new Exception(json_encode(['result' => 'Error', 'message' => $e->getMessage()]), 400);
        }
        die();
    }

    public function update()
    {

        try {
            $data = $_POST;
            $product = new Product(
                intval($data['id']),
                htmlspecialchars($data['title']),
                htmlspecialchars($data['picture']),
                htmlspecialchars($data['preview']),
                htmlspecialchars($data['content']),
                intval($data['price']),
                htmlspecialchars($data['status']),
                date('Y-m-d H:i:s', time()),
                date('Y-m-d H:i:s', time())
            );

            $product->save();

            print json_encode([
                'result' => 'ok'
            ]);

        } catch (Exception $e) {
            throw new Exception(json_encode(['result' => 'Error', 'message' => $e->getMessage()]), 400);
        }
        die();
    }

    public function delete()
    {
        try {
            $data = $_POST;

            if (isset($data['id'])) {
                (new Product())->delete((int)$data['id']);
            }

            print json_encode([
                'result' => 'ok'
            ]);

        } catch (Exception $e) {
            throw new Exception(json_encode(['result' => 'Error', 'message' => $e->getMessage()]), 400);
        }
        die();
    }
}
