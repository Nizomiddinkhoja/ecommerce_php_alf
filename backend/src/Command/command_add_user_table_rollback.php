<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202002271059_migration_add_user_table.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddUserTable($dbConnector);
$migration->rollback();

die('ok');
