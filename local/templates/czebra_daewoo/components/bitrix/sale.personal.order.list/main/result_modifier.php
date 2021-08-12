<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$paySystems = [];
$paySystemResult = \Bitrix\Sale\PaySystem\Manager::getList(array(
    'filter' => array(
        'ACTIVE' => 'Y',
    )
));
while($paySystem = $paySystemResult->fetch()) {
    $paySystems[$paySystem["ID"]] = [
        "NAME" => $paySystem["NAME"],
        "LOGO" => CFile::ResizeImageGet($paySystem["LOGOTIP"], array("height"=>35, "width"=>35), BX_RESIZE_IMAGE_EXACT)['src']
    ];
}
$arResult["CZ_PAY_SYSTEMS"] = $paySystems;
$itemsIds = [];
foreach ($arResult['ORDERS'] as $key => $order) {
    foreach ($order['BASKET_ITEMS'] as $keyItem => $itemBasket){
        $itemsIds[] = $itemBasket["PRODUCT_ID"];
    }
}

$deliveries = [];
$deliveryResult = CSaleDelivery::GetList(array(
    'filter' => array(
        'ACTIVE' => 'Y',
    )
));
while($delivery = $deliveryResult->fetch()) {
    $deliveries[$delivery["ID"]] = [
        "NAME" => $delivery["NAME"],
        "LOGO" => CFile::GetPath($delivery["LOGOTIP"])
    ];
}



$arResult["CZ_PROPS"] = [];
$db_res = CIblockElement::GetList(array(), array("IBLOCK_ID" => 24, "ID" =>$itemsIds ), false, false, array("PREVIEW_PICTURE", "ID"));
while ($arFields = $db_res->Fetch()){
    $arResult["CZ_PROPS"][$arFields["ID"]] = [
        "PREVIEW_PICTURE" =>  CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], array("height" => 64, "width" => 58), BX_RESIZE_IMAGE_EXACT)['src']
    ];
}
foreach ($arResult['ORDERS'] as $key => &$order) {
    $order['DELIVERY_PRICE_FORMATED'] = number_format(intval($order['ORDER']['PRICE_DELIVERY']), 0, '.', ' ') . " " . "<span class='rubl'>c</span>";
    foreach ($order['BASKET_ITEMS'] as $keyItem => &$itemBasket){
        $itemBasket["PREVIEW_PICTURE"] = $arResult["CZ_PROPS"][$itemBasket["PRODUCT_ID"]]["PREVIEW_PICTURE"];
        $itemBasket["PRICE_FORMATED"] = number_format(intval($itemBasket["PRICE"]), 0, '.', ' ') . " " . "<span class='rubl'>c</span>";
        $itemBasket["TOTAL_PRICE_FORMATED"] = number_format($itemBasket["PRICE"] * $itemBasket["QUANTITY"], 0, '.', ' ') . " " . "<span class='rubl'>c</span>";
    }
}

