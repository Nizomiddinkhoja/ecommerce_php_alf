<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/ExceptionService.php";

class ProductController
{
    public function all()
    {
        $categories = isset($_GET['category_id']) ? explode(',', $_GET['category_id']) : [];

        $limit = intval($_GET['limit'] ?? Product::NUMBER_PRODUCT_PER_PAGE);
        $offset =  (intval($_GET['page'] ?? 1) - 1) * $limit ;
        $offset = $offset < 0 ? 0 : $offset;

        $all_result = (new Product())->all($categories, $limit, $offset);
        include_once __DIR__ . "/../../views/product/list.php";
    }


    public function view()
    {
        try {

            if (!isset($_GET['id'])) {
                throw new Exception('Id is not exists', 400);
            }

            $id = (int)$_GET['id'];
            if (empty($id)) {
                throw new Exception('Undefined ID', 400);
            }
            $product = (new Product())->getById($id);
            if (empty($product)) {
                throw new Exception('Product not found', 404);
            }

            include_once __DIR__ . "/../../views/product/view.php";

        } catch (Exception $e) {
//            print $e->getMessage();

            ExceptionService::error($e, 'frontend');
        }


    }


}
