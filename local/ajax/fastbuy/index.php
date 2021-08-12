<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";?>

<?//$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "main", array(
//    "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
//    "COLUMNS_LIST" => array(
//        0 => "NAME",
//        1 => "DISCOUNT",
//        2 => "PRICE",
//        3 => "QUANTITY",
//        4 => "SUM",
//        5 => "PROPS",
//        6 => "DELETE",
//        7 => "DELAY",
//    ),
//    "AJAX_MODE" => "Y",
//    "AJAX_OPTION_JUMP" => "N",
//    "AJAX_OPTION_STYLE" => "Y",
//    "AJAX_OPTION_HISTORY" => "N",
//    "PATH_TO_ORDER" => "/order/",
//    "HIDE_COUPON" => "N",
//    "QUANTITY_FLOAT" => "N",
//    "PRICE_VAT_SHOW_VALUE" => "Y",
//    "TEMPLATE_THEME" => "blue",
//    "SET_TITLE" => "Y",
//    "AJAX_OPTION_ADDITIONAL" => "",
//    "OFFERS_PROPS" => array(
//        0 => "SIZES_SHOES",
//        1 => "SIZES_CLOTHES",
//        2 => "COLOR_REF",
//    ),
//    "PRICE_CODE" => array("Розничная цена (Для сайта)", "Старая розничная цена (Для сайта)"),
//),
//    false
//);?>
<?$APPLICATION->IncludeComponent(
    "bitrix:sale.basket.basket",
    "main",
    Array(
        "ACTION_VARIABLE" => "action",
        "AUTO_CALCULATION" => "Y",
        "TEMPLATE_THEME" => "blue",
        "COLUMNS_LIST" => array("NAME","DISCOUNT","WEIGHT","DELETE","DELAY","TYPE","PRICE","QUANTITY"),
        "COMPONENT_TEMPLATE" => "bootstrap_v4",
        "GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
        "GIFTS_CONVERT_CURRENCY" => "Y",
        "GIFTS_HIDE_BLOCK_TITLE" => "N",
        "GIFTS_HIDE_NOT_AVAILABLE" => "N",
        "GIFTS_MESS_BTN_BUY" => "Выбрать",
        "GIFTS_MESS_BTN_DETAIL" => "Подробнее",
        "GIFTS_PAGE_ELEMENT_COUNT" => "4",
        "GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
        "GIFTS_PRODUCT_QUANTITY_VARIABLE" => "",
        "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
        "GIFTS_SHOW_IMAGE" => "Y",
        "GIFTS_SHOW_NAME" => "Y",
        "GIFTS_SHOW_OLD_PRICE" => "Y",
        "GIFTS_TEXT_LABEL_GIFT" => "Подарок",
        "GIFTS_PLACE" => "BOTTOM",
        "HIDE_COUPON" => "N",
        "OFFERS_PROPS" => array("SIZES_SHOES","SIZES_CLOTHES"),
        "PATH_TO_ORDER" => "/personal_section/order/make/index.php",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "QUANTITY_FLOAT" => "N",
        "SET_TITLE" => "Y",
        "USE_GIFTS" => "Y",
        "USE_PREPAYMENT" => "N"
    )
);?>