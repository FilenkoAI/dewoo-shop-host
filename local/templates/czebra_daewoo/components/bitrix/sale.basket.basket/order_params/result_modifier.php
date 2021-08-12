<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['GRID']['ROWS'] as &$item) {


    if (!isset($item["PREVIEW_PICTURE"])) {

        $item["PREVIEW_PICTURE_SRC"] = SITE_TEMPLATE_PATH . "/front/img/no-photo.jpg";
    }

    $item["PRICE_FORMATED_RUB"] = str_replace("руб.","<span class='rubl'>i</span>", $item["PRICE_FORMATED"]);
    $item["SUM_FULL_PRICE_FORMATED_RUB"] = str_replace("руб.","<span class='rubl'>i</span>", $item["SUM_FULL_PRICE_FORMATED"]);
    $item["SUM"] = str_replace("руб.","<span class='rubl'>i</span>", $item["SUM"]);
    $item['BASE_PRICE_IS_MORE'] = 'N';
    if ( $item['SUM_FULL_PRICE'] > $item['SUM_VALUE']) {
        $item['BASE_PRICE_IS_MORE'] = 'Y';
    }
}

$arResult["allSum_FORMATED"] = str_replace("руб.","<span class='rubl'>i</span>", $arResult["allSum_FORMATED"]);
$arResult['DISCOUNT_PRICE_ALL_FORMATED'] = str_replace("руб.","<span class='rubl'>i</span>", $arResult["DISCOUNT_PRICE_ALL_FORMATED"]);