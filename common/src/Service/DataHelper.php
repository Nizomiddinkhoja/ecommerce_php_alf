<?php

include_once __DIR__ . "/DBConnector.php";
include_once __DIR__ . "/../Model/Product.php";

class DataHelper
{

    private $array2x = array(
        array("Volvo", 18),
        array("BMW", 13),
        array("Saab", 2),
        array("Land Rover", 15)
    );

    public static function saveArrayToCsvFile($array2x, $file)
    {
        $fp = fopen($file, 'w');
        foreach ($array2x as $item) {
            fputcsv($fp, $item);
        }
        fclose($fp);
        return true;
    }

    public static function getArrayFromCsvFile($file)
    {
        $csv = array_map('str_getcsv', file($file));
        return $csv;
    }
}
