<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
//Единичные свойства
global $cityInfo;
function mb_lcfirst($str) {
    return mb_strtolower(mb_substr($str, 0, 1)) . mb_substr($str, 1);
}

$arResult['CZ_PRICE'] = str_replace("руб.", "<span class='rubl'>i</span>", $arResult["ITEM_PRICES"][$arResult["ITEM_PRICE_SELECTED"]]["PRINT_PRICE"]);
$arResult['CZ_OLD_PRICE'] = str_replace("руб.", "<span class='rubl'>i</span>", $arResult["PRICES"]["Старая розничная цена (Для сайта)"]["PRINT_VALUE"]);
$arResult['CZ_PROPS']['PRICES'] = [
    'OLD_PRICE' => [
        'DISPLAY_VALUE' => str_replace("руб.", "<span class='rubl'>i</span>", $arResult["PRICES"]["Старая розничная цена (Для сайта)"]["PRINT_VALUE"]),
        'VALUE' => $arResult["PRICES"]["Старая розничная цена (Для сайта)"]["VALUE"]
    ],
    'PRICE' => [
        'DISPLAY_VALUE' => str_replace("руб.", "<span class='rubl'>i</span>", $arResult["ITEM_PRICES"][$arResult["ITEM_PRICE_SELECTED"]]["PRINT_PRICE"]),
        'VALUE' => $arResult["ITEM_PRICES"][$arResult["ITEM_PRICE_SELECTED"]]["PRICE"]
    ],
];
$arResult['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] = $arResult['CZ_PROPS']['PRICES']['OLD_PRICE']['VALUE'] > $arResult['CZ_PROPS']['PRICES']['PRICE']['VALUE'] ? 'Y' : 'N';
$arResult['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE'] = ceil((1 - $arResult['CZ_PROPS']['PRICES']['PRICE']['VALUE'] / $arResult['CZ_PROPS']['PRICES']['OLD_PRICE']['VALUE']) * 100) . '%';

$arResult['CZ_PROPS']['RATING'] = \Czebra\Project\Raiting::getRating($arResult['ID']);
$arResult['CZ_PROPS']['REVIEWS_COUNT'] = $arResult['CZ_PROPS']['RATING']['COUNT'];
$arResult['CZ_PROPS']['AVERAGE_RATING'] = $arResult['CZ_PROPS']['RATING']['AVERAGE_RATING'];
$arResult['CZ_PROPS']['IS_NEW'] = strtolower($arResult['PROPERTIES']['METKA_NOVINKA']['VALUE']) == 'да' ? 'Y' : 'N';

//Обработка картинок
//echo '<pre>';
//print_r(($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]));
//echo '</pre>';
if(is_array($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"])) {
    foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key => &$arItem) {
        $imgSource = CFile::GetPath($arItem);
        $imgBig = CFile::ResizeImageGet($arItem, array("height" => 493, "width" => 493), BX_RESIZE_IMAGE_EXACT);
        $imgMini = CFile::ResizeImageGet($arItem, array("height" => 91, "width" => 91), BX_RESIZE_IMAGE_EXACT);
        $arResult["CZ_PROPS"]["PHOTO"][] = [
            'FULL' => $imgBig['src'],
            'MINI' => $imgMini['src'],
            'SOURCE' => $imgSource
        ];
        if($key == 0) {
            $img = CFile::ResizeImageGet($arItem, array("height" => 630, "width" => 1200), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
            $shareImage = $img['src'];
        }
    }
} else {
    $arResult["CZ_PROPS"]["PHOTO"][] = [
        'FULL' => SITE_TEMPLATE_PATH . '/front/img/no-photo.jpg',
        'MINI' => SITE_TEMPLATE_PATH . '/front/img/no-photo.jpg'
    ];
    $shareImage = SITE_TEMPLATE_PATH . '/front/img/logo.png';
}
$arResult["SHARE_IMAGE"] = $shareImage;

//Видео
$arFilter = [
    "IBLOCK_ID" => 14,
    "PROPERTY_PRODUCT_REVIEW" => $arResult['ID'],
];
$arSelect = [
    "PROPERTY_LINK",
    "ID",
    "DETAIL_PICTURE"
];
$res = \CIBlockElement::GetList(["SORT" => "ASC"], $arFilter, $arSelect);
$videos = [];
while($ar_fields = $res->GetNext()) {
    $preview = CFile::ResizeImageGet($ar_fields["DETAIL_PICTURE"], array("height" => 73, "width" => 130), BX_RESIZE_IMAGE_EXACT)['src'];
    $link = $ar_fields['PROPERTY_LINK_VALUE'];
    $videos[] = [
        'LINK' => $link,
        'PREVIEW' => $preview,
    ];
}
$arResult['CZ_PROPS']['VIDEOS'] = $videos;

// обработка свойств

$sort = new \Czebra\Project\ProductDecorator\Characteristics($arResult['DISPLAY_PROPERTIES'], $arResult['ID'], $arResult['IBLOCK_SECTION_ID']);
$arResult['DISPLAY_PROPERTIES'] = $sort->sort();

$characteristics = [];
foreach($arResult['DISPLAY_PROPERTIES'] as $arItem) {
    if($arItem['VALUE']) {
        $characteristics [] = $arItem;
    }
}
$arResult['CZ_CHARACTERISTICS'] = $characteristics;

//Сравнение
$itemsInCompareList = $_SESSION['CATALOG_COMPARE_LIST'][$arResult['ORIGINAL_PARAMETERS']['IBLOCK_ID']]['ITEMS'];
$arResult['CZ_PROPS']['COMPARED'] = array_key_exists($arResult['ID'], $itemsInCompareList) ? 'Y' : 'N';

//доставка/самовывоз

// доставка/самовывоз

$delivery = \Czebra\Project\DeliveryCalendar\Calendar::calculateDateFormatted('delivery');
$pickup = \Czebra\Project\DeliveryCalendar\Calendar::calculateDateFormatted('pickup');

if($delivery['TRIVIAL']) {
    $arResult['CZ_PROPS']['DELIVERY'] = $delivery['TRIVIAL'] . ', ' . $delivery['DATE_FORMATTED_NUMBER'];
} else {
    $arResult['CZ_PROPS']['DELIVERY'] = $delivery['DATE_FORMATTED_TEXT'];
}
if($pickup['TRIVIAL']) {
    $arResult['CZ_PROPS']['PICKUP'] = $pickup['TRIVIAL'] . ', ' . $pickup['DATE_FORMATTED_NUMBER'];
} else {
    $arResult['CZ_PROPS']['PICKUP'] = $pickup['DATE_FORMATTED_TEXT'];
}

$nameLCfirst = mb_lcfirst($arResult['NAME']);
$name = $arResult['NAME'];
$city = $cityInfo['NAME_DATIVE'];
$phone = $cityInfo['PHONE'];

$description = 'Купить ' . $nameLCfirst . ' по доступной цене у официального дилера DAEWOO POWER PRODUCTS. Расширенная XXL гарантия, предпродажная подготовка, бесплатная доставка по ' . $city . ' и области.' . ' Тел.: ' . $phone;
$title = $arResult['NAME'] . ' - купить в ' . $cityInfo['NAME_PREPOSITIONAL'] . ', цена в фирменном магазине DAEWOO-SHOP';

$arResult['CZ_DESCRIPTION'] = $description;
$arResult['CZ_TITLE'] = $title;

$this->getComponent()->SetResultCacheKeys(['SHARE_IMAGE', 'CZ_DESCRIPTION', 'CZ_TITLE']);
