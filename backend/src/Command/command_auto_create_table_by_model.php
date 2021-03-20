<?php
include_once __DIR__ . "/../../../common/src/Model/Rating.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../../../common/src/Service/AnnotationHelper.php";


$mysqlTypes = [
    'int' => 'int',
    'float' => 'decimal(10,2)',
    'str' => 'varchar(255)'
];

$reserveFields = ['id'];

$objReflection = new ReflectionClass('Rating');
$properties = $objReflection->getProperties();
$queryTemplate = "create table %s (
    id int not null auto_increment,
    %s 
    ,primary key (id)
) engine = innoDB default charset \"utf8\"";

$arFields = [];
foreach ($properties as $property) {

    $comment = $property->getDocComment();
    $fieldType = AnnotationHelper::defineValueByAnnotation('var', $comment);
    $mysqlFieldType = $mysqlTypes[$fieldType] ?? 'varchar(255)';

    if (isset($property->name) && !in_array($property->name, $reserveFields)) {
        $arFields[] = $property->name . ' ' . $mysqlFieldType;
    }
}

$conn = DBConnector::getInstance()->connect();

$query = sprintf($queryTemplate, strtolower($objReflection->getName()), implode(',', $arFields));

mysqli_query($conn, $query);

if (!empty(mysqli_error($conn))) {
    print_r(mysqli_error($conn));
}


die('Table was create');
