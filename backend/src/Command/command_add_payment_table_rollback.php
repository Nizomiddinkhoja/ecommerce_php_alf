<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202002271811_migration_add_payment_table.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddPaymentTable($dbConnector);
$migration->rollback();

die('ok');
