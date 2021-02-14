<?php

include_once __DIR__ . "/../Fixtures/Fixture01.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";


$fixture = new Fixture01(DBConnector::getInstance());
$fixture->run();

die('ok');
