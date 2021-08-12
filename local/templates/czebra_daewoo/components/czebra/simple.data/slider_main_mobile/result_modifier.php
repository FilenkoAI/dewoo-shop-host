<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["ITEMS"] as $key => &$arItem) {
    $img = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]["ID"], array("height"=>400, "width"=>1100), BX_RESIZE_IMAGE_EXACT);
    $arItem['IMAGE'] = $img;
}