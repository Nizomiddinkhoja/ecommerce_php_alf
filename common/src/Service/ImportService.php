<?php

include_once __DIR__ . "/DBConnector.php";
include_once __DIR__ . "/../Model/Product.php";

class ImportService
{
    private $connect;

    public function __construct()
    {
        $this->connect = DBConnector::getInstance()->connect();
    }

    private function initImportFile()
    {
        $fileName = 'products.csv';
        $path = __DIR__ . "/../../../data/";

        return $path . $fileName;
    }

    public function import()
    {
        $fullFileName = $this->initImportFile();

        $csv = array_map('str_getcsv', file($fullFileName));

        foreach ($csv as $data) {
            $product = new Product(
                null,
                'book' . time(),
                htmlspecialchars($data[2]),
                htmlspecialchars($data[3]),
                htmlspecialchars($data[4]),
                intval($data[5]),
                htmlspecialchars($data[6]),
                htmlspecialchars($data[7]),
                htmlspecialchars($data[8])
            );

            $product->save();
        }
    }
}
