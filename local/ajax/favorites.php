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
        $arElements = unserialize($APPLICATION->get_cookie('favorites'));
        if (!in_array($_REQUEST['id'], $arElements)) {
            $arElements[] = $_REQUEST['id'];
            $result = 1; // Датчик. Добавляем
        } else {
            $key = array_search($_REQUEST['id'], $arElements); // Находим элемент, который нужно удалить из избранного
            unset($arElements[$key]);
            $result = 2; // Датчик. Удаляем
        }
        $cookie = new Cookie("favorites", serialize($arElements), time() + 60 * 60 * 24 * 60);
        $cookie->setDomain($context->getServer()->getHttpHost());
        $cookie->setHttpOnly(false);
        $context->getResponse()->addCookie($cookie);
        $context->getResponse()->flush("");
    } else {
        $idUser = $USER->GetID();
        $rsUser = CUser::GetByID($idUser);
        $arUser = $rsUser->Fetch();
        $arElements = $arUser['UF_FAVORITES']; // Достаём избранное пользователя
        if (!in_array($_REQUEST['id'], $arElements)) // Если еще нету этой позиции в избранном
        {
            $arElements[] = $_REQUEST['id'];
            $result = 1;
        } else {
            $key = array_search($_REQUEST['id'], $arElements); // Находим элемент, который нужно удалить из избранного
            unset($arElements[$key]);
            $result = 2;
        }
        $USER->Update($idUser, array("UF_FAVORITES" => $arElements)); // Добавляем элемент в избранное
    }
}

echo json_encode($result);
die();
