<?php

include_once __DIR__ . "/../../../../common/src/Model/Product.php";

class ProductController
{
    public function index()
    {
        header("Content-Type: application/json");
        $all = (new Product())->getAllForExport(10);

        print json_encode($all);
        die();

    }

    public function create()
    {
        header("Content-Type: application/json");

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
        header("Content-Type: application/json");

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
        header("Content-Type: application/json");

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
