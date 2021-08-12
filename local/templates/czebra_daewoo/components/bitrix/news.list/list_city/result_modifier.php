<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["ITEMS"] as $key => &$arItem) {
    if($arItem['NAME'] == 'Другой город'){
        $arResult['OTHER_CITY'] = $arItem;
        unset($arItem);
    }
    if($arItem['DISPLAY_PROPERTIES']['IMPORTANCE']['VALUE'] == 'Да'){
        $arResult['CITY_IMPORTANCE'][$key] = $arItem;
    }

    if($arItem['DISPLAY_PROPERTIES']['IMPORTANCE']['VALUE'] != 'Да'){
        $arResult['CITY_NO_IMPORTANCE'][$key] = $arItem;
    }

}
asort($arResult['CITY_NO_IMPORTANCE']);
