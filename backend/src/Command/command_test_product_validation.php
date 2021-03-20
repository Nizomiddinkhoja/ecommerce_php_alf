<?php
include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/ValidationService.php";
include_once __DIR__ . "/../../../common/src/Service/AnnotationHelper.php";


$objReflection = new ReflectionClass('Product');
$properties = $objReflection->getProperties();

foreach ($properties as $property) {
    print_r(ValidationService::validate($property->getDocComment()));
}
