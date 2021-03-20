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
$result = $validator->saveArrayToCsvFile($array2x, 'C:\laragon\www\phpAlif\shop\data\some_file.csv');
$result = $validator->getArrayFromCsvFile('C:\laragon\www\phpAlif\shop\data\some_file.csv');

var_dump($result);
die('ok');
