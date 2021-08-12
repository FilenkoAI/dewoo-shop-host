<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["ITEMS"] as $key => &$arItem) {
    $img = CFile::GetPath($arItem["PREVIEW_PICTURE"]);
    $img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("height"=>460, "width"=>345), BX_RESIZE_IMAGE_EXACT);
    $arItem["PREVIEW_PICTURE"]["SRC"] = $img["src"];
    if ($arItem['PROPERTIES']['IMG_1']['VALUE']) {
        $arItem['PROPERTIES']['IMG_1']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_1']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_1_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_1']['VALUE'], array("height"=>89, "width"=>122), BX_RESIZE_IMAGE_EXACT)['src'];
    }
    if ($arItem['PROPERTIES']['IMG_2']['VALUE']) {
        $arItem['PROPERTIES']['IMG_2']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_2']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_2_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_2']['VALUE'], array("height"=>89, "width"=>122), BX_RESIZE_IMAGE_EXACT)['src'];
    }
    if ($arItem['PROPERTIES']['IMG_3']['VALUE']) {
        $arItem['PROPERTIES']['IMG_3']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_3']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_3_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_3']['VALUE'], array("height"=>89, "width"=>122), BX_RESIZE_IMAGE_EXACT)['src'];
    }
    if ($arItem['PROPERTIES']['IMG_4']['VALUE']) {
        $arItem['PROPERTIES']['IMG_4']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_4']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_4_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_4']['VALUE'], array("height"=>89, "width"=>122), BX_RESIZE_IMAGE_EXACT)['src'];
    }
    if ($arItem['PROPERTIES']['IMG_5']['VALUE']) {
        $arItem['PROPERTIES']['IMG_5']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_5']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_5_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_5']['VALUE'], array("height"=>89, "width"=>122), BX_RESIZE_IMAGE_EXACT)['src'];
    }
    if ($arItem['PROPERTIES']['IMG_6']['VALUE']) {
        $arItem['PROPERTIES']['IMG_6']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_6']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_6_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_6']['VALUE'], array("height"=>89, "width"=>122), BX_RESIZE_IMAGE_EXACT)['src'];
    }


}