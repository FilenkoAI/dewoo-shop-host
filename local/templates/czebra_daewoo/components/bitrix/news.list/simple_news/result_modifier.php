<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["ITEMS"] as $key => &$arItem) {
    $img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("height"=>212, "width"=>319), BX_RESIZE_IMAGE_EXACT);
    $arItem["PREVIEW_PICTURE"]["SRC"] = $img["src"];
}