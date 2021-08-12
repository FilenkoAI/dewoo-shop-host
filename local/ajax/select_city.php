<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

GLOBAL $cityInfo;
Czebra\Project\City::saveSelection($cityInfo['NAME']);
