<?php

include_once __DIR__ . "/../Fixtures/FixtureCategoryProduct.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";


$dbConnector = DBConnector::getInstance();
$test = new FixtureCategoryProduct($dbConnector);

$test->run();

die('finish');
