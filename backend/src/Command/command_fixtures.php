<?php

include_once __DIR__ . "/../Fixtures/Fixture03.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";


$fixture = new Fixture03(DBConnector::getInstance());
$fixture->run();

die('ok');
