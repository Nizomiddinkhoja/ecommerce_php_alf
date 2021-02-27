<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202002271328_migration_add_rbac_table.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddRbacTable($dbConnector);
$migration->rollback();

die('ok');
