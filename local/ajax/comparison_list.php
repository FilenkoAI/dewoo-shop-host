<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;

GLOBAL $_SESSION;

$compareIds = [];
foreach($_SESSION['CATALOG_COMPARE_LIST']['24']['ITEMS'] as $arItem){
    $compareIds[] = $arItem['ID'];
}
echo json_encode($compareIds);