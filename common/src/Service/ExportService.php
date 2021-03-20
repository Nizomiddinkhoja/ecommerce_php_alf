<?php

include_once __DIR__ . "/DBConnector.php";
include_once __DIR__ . "/../Model/Product.php";

class ExportService
{
    private $connect;

    public function __construct()
    {
        $this->connect = DBConnector::getInstance()->connect();
    }

    private function initExportFile()
    {
        $date = date('Ymd_His', time());
        $fileName = 'products_' . $date . '.csv';
        $path = __DIR__ . "/../../../data/";

        return $path . $fileName;
    }

    private function getData()
    {
//        $products = (new Product())->all([], 27000);
        $products = (new Product())->getAllForExport();

        $list = [];
        foreach ($products as $product) {
            $list[] = [
                $product['id'],
                $product['title'],
                $product['picture'],
                $product['preview'],
                $product['content'],
                $product['price'],
                $product['status'],
                $product['created'],
                $product['updated']
            ];
        }

        return $list;
    }

    public function export()
    {
        $fullFileName = $this->initExportFile();

        $list = $this->getData();

        $fp = fopen($fullFileName, 'w');

        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
    }

    public function import()
    {
        $fullFileName = $this->initExportFile();

        $list = $this->getData();

        $fp = fopen($fullFileName, 'w');

        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
    }
}
