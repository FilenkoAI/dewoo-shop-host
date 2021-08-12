<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
global $cityInfo;
$arResult["ORDER_TOTAL_PRICE_FORMATED"] = str_replace("руб.","<span class='rubl'>i</span>", $arResult["ORDER_TOTAL_PRICE_FORMATED"]);
$arResult["DELIVERY_PRICE_FORMATED"] = str_replace("руб.","<span class='rubl'>i</span>", $arResult["DELIVERY_PRICE_FORMATED"]);
$products = [];
foreach($arResult['GRID']['ROWS'] as $arProduct){
    $product = [
        'PRODUCT_ID' => $arProduct['data']['PRODUCT_ID'],
        'QUANTITY' => $arProduct['data']['QUANTITY'],
        'NAME' => $arProduct['data']['NAME'],
        'PRICE' => $arProduct['data']['PRICE'],
        'WEIGHT' => $arProduct['data']['WEIGHT'],
        'CURRENCY' => $arProduct['data']['CURRENCY'],
    ];
    $products[] = $product;
}
if (!$_SESSION['CZ_ORDER']['CITY']['NAME']){
    global $cityInfo;
    $_SESSION['CZ_ORDER']['CITY']['NAME'] = $cityInfo['NAME'];
}