<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$mapValues = [];

foreach ($arResult["ITEMS"] as $key => &$arItem) {
    $baloonLogo = CFile::GetPath($arItem["PROPERTIES"]["MAP_LOGO"]['VALUE']);
    $hintLogo = CFile::GetPath($arItem["PROPERTIES"]["LOGO"]['VALUE']);
    $location = explode(",", $arItem['PROPERTIES']['LOCATION']['VALUE']);
    $mapValues[] = [
        'ID' => $key,
        'HINT_LOGO' => $hintLogo,
        'BALOON_LOGO' => $baloonLogo,
        'LOCATION' => $location,
        'PHONE' => $arItem['PROPERTIES']['PHONE']['VALUE'],
        'ADDRESS' => $arItem['PROPERTIES']['DESCRIPTION']['~VALUE']['TEXT'],
        'WORKTIME' => $arItem['PROPERTIES']['WORKTIME']['~VALUE']['TEXT']
    ];
    $arItem['LIST_LOGO'] = CFile::GetPath($arItem["PROPERTIES"]["LOGO"]['VALUE']);
    $shopSlider = [];
    foreach($arItem['PROPERTIES']['SHOP_SLIDER']['VALUE'] as $item){
        $shopSlider[] = [
            'BIG' =>  CFile::ResizeImageGet($item, array("height"=>663, "width"=>1002), BX_RESIZE_IMAGE_EXACT)['src'],
            'SMALL' => CFile::ResizeImageGet($item, array("height"=>180, "width"=>241), BX_RESIZE_IMAGE_EXACT)['src']
        ];
    }
    $arItem['SHOP_SLIDER'] = $shopSlider;

}
$arResult['MAP'] = json_encode($mapValues);