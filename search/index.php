<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.search", 
	"base", 
	array(
		"ACTION_VARIABLE" => "action",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DEFAULT_SORT" => "rank",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "SCALED_PRICE_2",
		"ELEMENT_SORT_FIELD2" => "SCALED_PRICE_2",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "asc",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "24",
		"IBLOCK_TYPE" => "1c_catalog",
		"LINE_ELEMENT_COUNT" => "3",
		"NO_WORD_LOGIC" => "Y",
		"OFFERS_LIMIT" => "5",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "9",
		"PRICE_CODE" => array(
			0 => "Старая розничная цена (Для сайта)",
			1 => "Розничная цена (Для сайта)",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"RESTART" => "Y",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SHOW_PRICE_COUNT" => "1",
		"USE_LANGUAGE_GUESS" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_SEARCH_RESULT_ORDER" => "Y",
		"USE_TITLE_RANK" => "N",
		"COMPONENT_TEMPLATE" => "base",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>