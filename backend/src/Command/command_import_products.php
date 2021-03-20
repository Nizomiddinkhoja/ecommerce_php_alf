<?php

include_once __DIR__ . "/../../../common/src/Service/ImportService.php";

(new ImportService())->import();

die('finish');
