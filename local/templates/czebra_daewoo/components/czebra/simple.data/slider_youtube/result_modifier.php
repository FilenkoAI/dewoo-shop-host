<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach ($arResult["ITEMS"] as $key => &$arItem) {

    $arItem['PREVIEW'] = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]["ID"], array("height"=>231, "width"=>408), BX_RESIZE_IMAGE_EXACT)['src'];
}