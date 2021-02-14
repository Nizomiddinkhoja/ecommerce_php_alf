<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";

class SiteController
{
    public function index()
    {

        $all_result = (new Product())->all();
        include_once __DIR__ . "/../../views/site/index.php";
    }
}
