<?php

include_once __DIR__ . "/../Migrations/2020032328_migration_add_category_group_table.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";


$dbConnector = DBConnector::getInstance();
$test = new MigrationAddCategoryGroupTable($dbConnector);

$test->commit();

die('finish');
