<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202002271811_migration_add_delivery_table.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddDeliveryTable($dbConnector);
$migration->commit();

die('ok');
