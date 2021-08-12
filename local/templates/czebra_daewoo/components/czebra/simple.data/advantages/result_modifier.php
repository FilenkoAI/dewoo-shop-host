<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["ITEMS"] as $key => &$arItem) {
    $img = CFile::GetPath($arItem["DISPLAY_PROPERTIES"]["IMAGE"]["VALUE"]);
    $arItem['IMAGE'] = $img;
}