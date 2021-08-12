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
    $arItem['CZ_PROPS']['RATING'] = \Czebra\Project\Raiting::getRating($arItem['ID']);
    $arItem['CZ_PROPS']['REVIEWS_COUNT'] = $arItem['CZ_PROPS']['RATING']['COUNT'];
    $arItem['CZ_PROPS']['AVERAGE_RATING'] = $arItem['CZ_PROPS']['RATING']['AVERAGE_RATING'];
    $arItem['CZ_PROPS']['IS_NEW'] = strtolower($arItem['PROPERTIES']['METKA_NOVINKA']['VALUE']) == 'да' ? 'Y' : 'N';

    $arItem['CZ_PRICE'] = str_replace("руб.","<span class='rubl'>i</span>",$arItem["ITEM_PRICES"][$arItem["ITEM_PRICE_SELECTED"]]["PRINT_PRICE"]);
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

    if(isset($arItem['PREVIEW_PICTURE']['SRC'])){
        $arItem['CZ_PROPS']['PREVIEW'] = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array("height" => 415, "width" => 375), BX_RESIZE_IMAGE_EXACT)['src'];
    } elseif(isset($arItem['DETAIL_PICTURE']['SRC'])){
        $arItem['CZ_PROPS']['PREVIEW'] = CFile::ResizeImageGet($arItem['DETAIL_PICTURE']['ID'], array("height" => 415, "width" => 375), BX_RESIZE_IMAGE_EXACT)['src'];
    } else {
        $arItem['CZ_PROPS']['PREVIEW'] = SITE_TEMPLATE_PATH . '/front/img/no-photo.jpg';
    }
    $arItem['ICONS'] = Czebra\Project\Catalog\Icons::getIconsArray($arItem['ID']);
    foreach ($arItem['ICONS'] as &$icon) {
        if ($icon['PROP'] && $arItem['PROPERTIES'][$icon['PROP']]['VALUE']) {
            $icon['DISPLAY_DESC'] = $arItem['PROPERTIES'][$icon['PROP']]['VALUE'];
        } else {
            $icon['DISPLAY_DESC'] = $icon['DESC'];
        }
    }


    $delivery = \Czebra\Project\DeliveryCalendar\Calendar::calculateDateFormatted('delivery');
    $pickup = \Czebra\Project\DeliveryCalendar\Calendar::calculateDateFormatted('pickup');

    if ( $delivery['TRIVIAL'] ) {
        $arItem['CZ_PROPS']['DELIVERY'] = $delivery['TRIVIAL'] . ', ' . $delivery['DATE_FORMATTED_NUMBER'];
    } else {
        $arItem['CZ_PROPS']['DELIVERY'] = $delivery['DATE_FORMATTED_TEXT'];
    }
    if ( $pickup['TRIVIAL'] ) {
        $arItem['CZ_PROPS']['PICKUP'] = $pickup['TRIVIAL'] . ', ' . $pickup['DATE_FORMATTED_NUMBER'];
    } else {
        $arItem['CZ_PROPS']['PICKUP'] = $pickup['DATE_FORMATTED_TEXT'];
    }
}
