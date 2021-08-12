<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;

GLOBAL $USER;

if(!$USER->IsAuthorized()) // Для неавторизованного
{
    global $APPLICATION;
	$shopId = Application::getInstance()->getContext()->getRequest()->getCookie("selected_shop");
}
else {
     $idUser = $USER->GetID();
     $rsUser = CUser::GetByID($idUser);
     $arUser = $rsUser->Fetch();
     $shopId = $arUser['UF_UF_SHOP'];
    
}

echo json_encode($shopId);