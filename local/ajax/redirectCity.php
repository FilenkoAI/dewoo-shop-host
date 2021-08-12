<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

$nameCity = $_REQUEST['name'];
setcookie('REGION_SHOP', $nameCity, time() + 60*60*24*60*3, '/', '.daewoo-shop.com');