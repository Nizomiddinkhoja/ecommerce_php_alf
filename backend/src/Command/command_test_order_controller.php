<?php

include_once __DIR__ . "/../Test/OrderControllerTest.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";


$test = new OrderControllerTest();

$test->testCreate();

die('finish');
