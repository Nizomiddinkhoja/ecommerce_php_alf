<?php

include_once __DIR__ . "/../../../common/src/Service/ExportService.php";

(new ExportService)->export();

die('finish');
