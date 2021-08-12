<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult["ITEMS"] as &$item) {
    $item['DETAIL_PICTURE']['SRC'] = CFile::ResizeImageGet($item["DETAIL_PICTURE"]["ID"], array("width"=>1920, "height"=>651), BX_RESIZE_IMAGE_EXACT)['src'];

}