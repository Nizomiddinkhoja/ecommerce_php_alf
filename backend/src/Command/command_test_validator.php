<?php
include_once __DIR__ . "/../../../common/src/Service/Validator.php";


$validator  = new Validator();
$result = $validator->emailValidate('nizomiddinkhoja@gmail.com');
//$result = $validator->phoneValidate('+992-98-765-43-21');
//$result = $validator->phoneValidate('01234567891');
var_dump($result);
die('ok');
