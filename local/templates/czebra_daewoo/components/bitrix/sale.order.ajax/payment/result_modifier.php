<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult["BASKET_ITEMS"] as &$arItem) {
    $arItem["PRICE_FORMATED"] = str_replace("руб.","<span class='rubl'>i</span>", $arItem["PRICE_FORMATED"]);
    $arItem['BASE_PRICE_FORMATED'] = str_replace("руб.","<span class='rubl'>i</span>", $arItem["BASE_PRICE_FORMATED"]);
    $arItem['SUM_BASE_FORMATED'] = str_replace("руб.","<span class='rubl'>i</span>", $arItem["SUM_BASE_FORMATED"]);
    $arItem['SUM'] = str_replace("руб.","<span class='rubl'>i</span>", $arItem["SUM"]);
    $arItem['BASE_PRICE_IS_MORE'] = 'N';
    if ( $arItem['~BASE_PRICE'] > $arItem['PRICE']) {
        $arItem['BASE_PRICE_IS_MORE'] = 'Y';
    }
    if (!isset($arItem["PREVIEW_PICTURE"])) {
        $arItem["PREVIEW_PICTURE_SRC"] = SITE_TEMPLATE_PATH . "/front/img/no-photo.jpg";
    }
}
$arResult['CZ_ORDER']['PAYSYSTEM'] = null;
foreach ($arResult['PAY_SYSTEM'] as $arPaySystem) {
    if ($arPaySystem['ID'] == $_SESSION['CZ_ORDER']['PAYSYSTEM_ID']) {
        $arResult['CZ_ORDER']['PAYSYSTEM'] = $arPaySystem;
    }
}
if (is_null($arResult['CZ_ORDER']['PAYSYSTEM'])) {
    $arResult['CZ_ORDER']['PAYSYSTEM'] = $arResult['PAY_SYSTEM'][0];
}
$arResult["ORDER_PRICE_FORMATED"] = str_replace("руб.","<span class='rubl'>i</span>", $arResult["ORDER_PRICE_FORMATED"]);
$arResult['DISCOUNT_PRICE_FORMATED'] = str_replace("руб.","<span class='rubl'>i</span>", $arResult["DISCOUNT_PRICE_FORMATED"]);