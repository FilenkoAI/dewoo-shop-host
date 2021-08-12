<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;

$GLOBALS['APPLICATION']->RestartBuffer();
$application = Application::getInstance();
$context = $application->getContext();
global $APPLICATION, $USER;
if ($_REQUEST['id']) {
    if (!$USER->IsAuthorized()) {
        $cookie = new Cookie("selected_shop", $_REQUEST['id'], time() + 60 * 60 * 24 * 60);
        $cookie->setDomain('daewoo-shop.com');
        $cookie->setHttpOnly(false);
        $context->getResponse()->addCookie($cookie);
        $context->getResponse()->flush("");
    } else {
        $idUser = $USER->GetID();
        $rsUser = new CUser;
        $rsUser->Update($idUser, array("UF_UF_SHOP" => $_REQUEST['id']));
    }
}
die();
