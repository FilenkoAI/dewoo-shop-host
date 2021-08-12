<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

//Правильная сортировка для результатов поиска
if (isset($arParams["SORT_SEARCH"])) {
    $arNewItemsList = array();
    foreach ($arParams["SORT_SEARCH"] as $sk => $value) {
        foreach ($arResult['ITEMS'] as $key => $arItem) {
            if ($value == $arItem["ID"]) {
                $arNewItemsList[$key] = $arItem;
                unset($arResult['ITEMS'][$key]);
            }
        }
    }
    $arResult['ITEMS'] = $arNewItemsList;
}
foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['CZ_OLD_PRICE'] = str_replace("руб.","<span class='rubl'>i</span>",$arItem["PRICES"]["Старая розничная цена (Для сайта)"]["PRINT_VALUE"]);
    $arItem['CZ_PROPS']['PRICES'] = [
        'OLD_PRICE' => [
            'DISPLAY_VALUE' => str_replace("руб.","<span class='rubl'>i</span>",$arItem["PRICES"]["Старая розничная цена (Для сайта)"]["PRINT_VALUE"]),
            'VALUE' => $arItem["PRICES"]["Старая розничная цена (Для сайта)"]["VALUE"]
        ],
        'PRICE' => [
            'DISPLAY_VALUE' => str_replace("руб.","<span class='rubl'>i</span>",$arItem["ITEM_PRICES"][$arItem["ITEM_PRICE_SELECTED"]]["PRINT_PRICE"]),
            'VALUE' => $arItem["ITEM_PRICES"][$arItem["ITEM_PRICE_SELECTED"]]["PRICE"]
        ],
    ];
    $arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] = $arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['VALUE'] > $arItem['CZ_PROPS']['PRICES']['PRICE']['VALUE'] ? 'Y' : 'N';
    $arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE'] = ceil((1 - $arItem['CZ_PROPS']['PRICES']['PRICE']['VALUE'] / $arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['VALUE']) * 100) . '%';

}