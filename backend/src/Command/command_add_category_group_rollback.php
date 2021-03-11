<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/2020032328_migration_add_category_group_table.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddCategoryGroupTable($dbConnector);
$migration->rollback();

die('ok');
