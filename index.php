<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Официальный интернет-магазин DAEWOO Shop");
$APPLICATION->SetTitle("Официальный интернет-магазин DAEWOO Shop");
?>
<?$APPLICATION->IncludeComponent(
    "czebra:simple.data",
    "slider_main_mobile",
    Array(
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COUNT" => "",
        "FIELD_CODE" => array("NAME", "DETAIL_PICTURE"),
        "FILTER_NAME" => "",
        "IBLOCK_ID" => "9",
        "IBLOCK_TYPE" => "advertising",
        "PROPERTY_CODE" => array("TEXT", "LINK" , "BTN_TEXT"),
        "SHOW_ALL_PROPERTIES" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "ID",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC"
    )
);?>
<div class="not_display">
    <h1><?=$APPLICATION->ShowTitle()?></h1>
</div>

<? $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
        'AREA_FILE_SHOW' => 'file',
        'PATH' => SITE_TEMPLATE_PATH . '/include/main/mobile_catalog_2.php',
    )
); ?>
<div class="wrapp-stock-mobil">
    <div class="container">
        <div class="stock-mobil">
            <div class="title-stock-mobil">Акции</div>
            <div class="bg-stock-mobil"></div>
            <div class="item-bg"></div>
            <div class="btn-stock-mobil">
                <a href="/stocks/">
                    <span class="btn-trans">Перейти</span>
                    <span class="btn-anim">Перейти</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="wrapp-news-mobil">
    <div class="container">
        <div class="news-mobil">
            <div class="title-news-mobil">Новости</div>
            <div class="bg-news-mobil"></div>
            <div class="item-img"><img src="/upload/iblock/ec1/ec1d02f4e3e846c1b10d05e3bcc5fd20.jpg" alt=""></div>
            <div class="btn-news-mobil">
                <a href="/news/">
                    <span class="btn-trans">Перейти</span>
                    <span class="btn-anim">Перейти</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?//Конец мобильной версии?>
<?$APPLICATION->IncludeComponent(
    "czebra:simple.data",
    "slider_main",
    Array(
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COUNT" => "",
        "FIELD_CODE" => array("NAME", "DETAIL_PICTURE"),
        "FILTER_NAME" => "",
        "IBLOCK_ID" => "9",
        "IBLOCK_TYPE" => "advertising",
        "PROPERTY_CODE" => array("TEXT", "LINK" , "BTN_TEXT"),
        "SHOW_ALL_PROPERTIES" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "ID",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "czebra:simple.data",
    "features",
    Array(
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COUNT" => "",
        "FIELD_CODE" => array("NAME", "DETAIL_PICTURE"),
        "FILTER_NAME" => "",
        "IBLOCK_ID" => "13",
        "IBLOCK_TYPE" => "advertising",
        "PROPERTY_CODE" => array("CLASS", "LINK"),
        "SHOW_ALL_PROPERTIES" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "ID",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC"
    )
);?>
<?
CModule::IncludeModule('iblock');
$arFilter = array(
    "IBLOCK_ID" => 26,
    "ACTIVE" => "Y"
);
$arSelect = array(
    "PROPERTY_PRODUCT",
);
$res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, $arSelect);
$stocksIds = [];

while($ar_fields = $res->GetNext()) {
    $stocksIds[] = $ar_fields['PROPERTY_PRODUCT_VALUE'];
}
GLOBAL $arrStocksFilter;
$arrStocksFilter = [
        'ID' => $stocksIds
]
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "main_stocks",
    Array(
        "FILTER_NAME" => "arrStocksFilter",
        "ADD_SECTIONS_CHAIN" => "N",
        'IBLOCK_TYPE' => '1c_catalog',
        'IBLOCK_ID' => "24",
        "PAGE_ELEMENT_COUNT" => "5000",
        'PRICE_CODE' => array("Розничная цена (Для сайта)", "Старая розничная цена (Для сайта)"),
        "ACTION_VARIABLE" => "action",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "ADD_TO_BASKET_ACTION" => "ADD",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "BACKGROUND_IMAGE" => "-",
        "BASKET_URL" => "/personal/basket.php",
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COMPATIBLE_MODE" => "Y",
        "CONVERT_CURRENCY" => "N",
        "CUSTOM_FILTER" => "",
        "DETAIL_URL" => '/catalog/item/#ELEMENT_CODE#/',
        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_COMPARE" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER" => "asc",
        "ELEMENT_SORT_ORDER2" => "desc",
        "ENLARGE_PRODUCT" => "STRICT",
        "HIDE_NOT_AVAILABLE" => "N",
        "HIDE_NOT_AVAILABLE_OFFERS" => "N",
        "IBLOCK_TYPE" => "catalog",
        "INCLUDE_SUBSECTIONS" => "Y",
        "LAZY_LOAD" => "N",
        "LINE_ELEMENT_COUNT" => "3",
        "LOAD_ON_SCROLL" => "N",
        "MESSAGE_404" => "",
        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
        "MESS_BTN_BUY" => "Купить",
        "MESS_BTN_DETAIL" => "Подробнее",
        "MESS_BTN_SUBSCRIBE" => "Подписаться",
        "MESS_NOT_AVAILABLE" => "Нет в наличии",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "OFFERS_FIELD_CODE" => array("",""),
        "OFFERS_LIMIT" => "5",
        "OFFERS_SORT_FIELD" => "sort",
        "OFFERS_SORT_FIELD2" => "id",
        "OFFERS_SORT_ORDER" => "asc",
        "OFFERS_SORT_ORDER2" => "desc",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Товары",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "PRICE_VAT_INCLUDE" => "Y",
        "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
        "PRODUCT_ID_VARIABLE" => "id",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
        "PRODUCT_SUBSCRIPTION" => "Y",
        "RCM_TYPE" => "personal",
        "SECTION_CODE" => "",
        "SECTION_CODE_PATH" => "",
        //"SECTION_ID" => "",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "SECTION_URL" => "",
        "SECTION_USER_FIELDS" => array("",""),
        "SEF_MODE" => "N",
        "SEF_RULE" => "",
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SHOW_ALL_WO_SECTION" => "N",
        "SHOW_CLOSE_POPUP" => "N",
        "SHOW_DISCOUNT_PERCENT" => "N",
        "SHOW_FROM_SECTION" => "N",
        "SHOW_MAX_QUANTITY" => "N",
        "SHOW_OLD_PRICE" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "SHOW_SLIDER" => "Y",
        "TEMPLATE_THEME" => "blue",
        "USE_ENHANCED_ECOMMERCE" => "N",
        "USE_MAIN_ELEMENT_SECTION" => "N",
        "USE_PRICE_COUNT" => "N",
        "USE_PRODUCT_QUANTITY" => "N"
    )
);?>
<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_TEMPLATE_PATH . "/include/main/mobile_catalog.php",
    )
); ?>



<?
    GLOBAL $noveltyFilter;
    $arrNoveltyFilter = [
            'PROPERTY_METKA_NOVINKA_VALUE' => 'Да',
    ];
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"main_novelty", 
	array(
		"FILTER_NAME" => "arrNoveltyFilter",
		"ADD_SECTIONS_CHAIN" => "N",
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "24",
		"PAGE_ELEMENT_COUNT" => "5000",
		"PRICE_CODE" => array(
			0 => "Старая розничная цена (Для сайта)",
			1 => "Розничная цена (Для сайта)",
		),
		"ACTION_VARIABLE" => "action",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DETAIL_URL" => "/catalog/item/#ELEMENT_CODE#/",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "20",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_CODE_PATH" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SEF_RULE" => "",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "main_novelty",
		"SECTION_ID" => $_REQUEST["SECTION_ID"]
	),
	false
);?>

<div class="wrapp-channel-youtube">
    <div class="container">
        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/include/main/youtube.php",
            )
        ); ?>
        <?$APPLICATION->IncludeComponent(
            "czebra:simple.data",
            "slider_youtube",
            Array(
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "COUNT" => "",
                "FIELD_CODE" => array("NAME", "DETAIL_PICTURE"),
                "FILTER_NAME" => "",
                "IBLOCK_ID" => "14",
                "IBLOCK_TYPE" => "advertising",
                "PROPERTY_CODE" => array("LINK"),
                "SHOW_ALL_PROPERTIES" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "ID",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "ASC",
            )
        );?>
    </div>
</div>

<?$APPLICATION->IncludeComponent(
    "czebra:simple.data",
    "advantages",
    Array(
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COUNT" => "",
        "FIELD_CODE" => array("NAME", "DETAIL_TEXT" ),
        "FILTER_NAME" => "",
        "IBLOCK_ID" => "15",
        "IBLOCK_TYPE" => "advertising",
        "PROPERTY_CODE" => array("IMAGE"),
        "SHOW_ALL_PROPERTIES" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "ID",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC"
    )
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
