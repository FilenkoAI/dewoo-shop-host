<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['GRID']['ROWS'] as &$item) {
    $item["PRICE_FORMATED_RUB"] = str_replace("руб.","<span class='rubl'>i</span>", $item["PRICE_FORMATED"]);
    $item["SUM_FULL_PRICE_FORMATED_RUB"] = str_replace("руб.","<span class='rubl'>i</span>", $item["SUM_FULL_PRICE_FORMATED"]);

//    if (strlen($item["DETAIL_PICTURE_SRC"]) == 0) {
//        $item["DETAIL_PICTURE_SRC"] = "/upload/template/no_photo.png";
//    }
    if(isset($item['PREVIEW_PICTURE'])){
        $item['CZ_PROPS']['PREVIEW'] = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array("height" => 100, "width" => 100), BX_RESIZE_IMAGE_EXACT)['src'];
    } elseif(isset($arItem['DETAIL_PICTURE']['SRC'])){
        $item['CZ_PROPS']['PREVIEW'] = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array("height" => 100, "width" => 100), BX_RESIZE_IMAGE_EXACT)['src'];
    } else {
        $item['CZ_PROPS']['PREVIEW'] = SITE_TEMPLATE_PATH . '/front/img/no-photo.jpg';
    }
}

$arResult["allSum_FORMATED"] = str_replace("руб.","<span class='rubl'>i</span>", $arResult["allSum_FORMATED"]);