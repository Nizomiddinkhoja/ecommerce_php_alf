<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202002072202_migration_add_products.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddProducts($dbConnector);
$migration->rollback();

die('ok');
