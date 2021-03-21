<?php
include_once __DIR__ . "/../../../common/src/Service/DataHelper.php";

$array2x = array(
    array("Volvo", 18),
    array("BMW", 13),
    array("Saab", 2),
    array("Land Rover", 15)
);

$validator  = new DataHelper();
//C:\files\some_file.csv
$result = $validator->saveArrayToCsvFile($array2x,  __DIR__."/../../../data/some_file.csv");
$result = $validator->getArrayFromCsvFile(__DIR__."/../../../data/some_file.csv");

print_r($result);
die('ok');
