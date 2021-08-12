<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
global $_SESSION;
global $cityInfo;
foreach ($arResult["BASKET_ITEMS"] as &$arItem) {
    $arItem["PRICE_FORMATED"] = str_replace("руб.","<span class='rubl'>i</span>", $arItem["PRICE_FORMATED"]);
    $arItem['BASE_PRICE_FORMATED'] = str_replace("руб.","<span class='rubl'>i</span>", $arItem["BASE_PRICE_FORMATED"]);
    $arItem['SUM_PRICE_FORMATED'] = str_replace("руб.","<span class='rubl'>i</span>", $arItem["SUM_PRICE_FORMATED"]);
    $arItem['SUM'] = str_replace("руб.","<span class='rubl'>i</span>", $arItem["SUM"]);
    $arItem['BASE_PRICE_IS_MORE'] = 'N';
    if ( $arItem['~BASE_PRICE'] > $arItem['PRICE']) {
        $arItem['BASE_PRICE_IS_MORE'] = 'Y';
    }
    if (!isset($arItem["PREVIEW_PICTURE"])) {
        $arItem["PREVIEW_PICTURE_SRC"] = SITE_TEMPLATE_PATH . "/front/img/no-photo.jpg";
    }

    if(isset($arItem['PREVIEW_PICTURE'])){
        $arItem['CZ_PROPS']['PREVIEW'] = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array("height" => 100, "width" => 100), BX_RESIZE_IMAGE_EXACT)['src'];
    } elseif(isset($arItem['DETAIL_PICTURE']['SRC'])){
        $arItem['CZ_PROPS']['PREVIEW'] = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array("height" => 100, "width" => 100), BX_RESIZE_IMAGE_EXACT)['src'];
    } else {
        $arItem['CZ_PROPS']['PREVIEW'] = SITE_TEMPLATE_PATH . '/front/img/no-photo.jpg';
    }
}
$arResult['CZ_ORDER']['PAYSYSTEM'] = null;
foreach ($arResult['PAY_SYSTEM'] as $arPaySystem) {
    if ($arPaySystem['ID'] == $_SESSION['CZ_ORDER']['DELIVERY']['PAYSYSTEM_ID']) {
        $arResult['CZ_ORDER']['PAYSYSTEM'] = $arPaySystem;
    }
}
if (is_null($arResult['CZ_ORDER']['PAYSYSTEM'])) {
    $arResult['CZ_ORDER']['PAYSYSTEM'] = $arResult['PAY_SYSTEM'][0];
}

if ($_SESSION["CZ_ORDER"]["DELIVERY"]["TYPE"] == "company_delivery"){
    $arResult["CZ_ORDER"]["CITY"]["NAME"] = $_SESSION["CZ_ORDER"]["DELIVERY"]["CITY"];
} else {
    $arResult["CZ_ORDER"]["CITY"]["NAME"] = $cityInfo["NAME"];
}

$cityID = '';
$db_vars = CSaleLocation::GetList(
    array(
        "SORT" => "ASC",
        "COUNTRY_NAME_LANG" => "ASC",
        "CITY_NAME_LANG" => "ASC"
    ),
    array("LID" => LANGUAGE_ID),
    false,
    false,
    array()
);
while($vars = $db_vars->Fetch()) {
    if($vars["CITY_NAME"] == $arResult["CZ_ORDER"]["CITY"]["NAME"]) {
        $cityID = $vars["CITY_ID"];
    }
}
$arResult["CZ_ORDER"]["CITY"]["ID"] = $cityID;

$arResult["ORDER_PRICE_FORMATED"] = str_replace("руб.","<span class='rubl'>i</span>", $arResult["ORDER_PRICE_FORMATED"]);

$arResult['DELIVERY_DATE'] = $_SESSION["CZ_ORDER"]["DELIVERY"]["DATE"] / 1000;

$arResult['DISCOUNT_PRICE_FORMATED'] = str_replace("руб.","<span class='rubl'>i</span>", $arResult["DISCOUNT_PRICE_FORMATED"]);