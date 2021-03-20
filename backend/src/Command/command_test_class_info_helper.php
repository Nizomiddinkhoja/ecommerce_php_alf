<?php
include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/ClassInfoHelper.php";
include_once __DIR__ . "/../../../common/src/Service/AnnotationHelper.php";


$fixture = new ClassInfoHelper();
$result = $fixture->getVariables('Product');
$result = $fixture->getMethods('Product');
print_r($result);
die('ok');
