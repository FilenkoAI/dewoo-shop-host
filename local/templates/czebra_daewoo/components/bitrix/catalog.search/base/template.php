<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
// Тип отображение списка
if($request['section_type'] === 'list') {
    $template = 'base_list';
} else {
    $template = 'base_block';
}
// Количество элементов в списке
$countToShow = 12;
switch ($request['count_to_show']) {
    case '12':
        $countToShow = 12;
        break;
    case '24':
        $countToShow = 24;
        break;
    case '36':
        $countToShow = 36;
        break;
    default:
        $countToShow = 12;
}
// Сортировка

$uri = new \Bitrix\Main\Web\Uri($request->getRequestUri());

$sort = $request['sort'];
$by = $request['by'];

?>
<div class="wrapp-result-search">
    <div class="wrapp-catalog">

<?
$arElements = $APPLICATION->IncludeComponent(
	"bitrix:search.page",
	"base",
	Array(
	    "AJAX_MODE" => "N",
		"RESTART" => $arParams["RESTART"],
		"NO_WORD_LOGIC" => $arParams["NO_WORD_LOGIC"],
		"USE_LANGUAGE_GUESS" => $arParams["USE_LANGUAGE_GUESS"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"arrFILTER" => array("iblock_".$arParams["IBLOCK_TYPE"]),
		"arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => array($arParams["IBLOCK_ID"]),
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"SHOW_WHERE" => "N",
		"arrWHERE" => array(),
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => 50,
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "N",
	),
	$component,
	array('HIDE_ICONS' => 'Y')
);
?>
    <div class="wrapp-controls-catalog">
        <div class="container">
            <div class="controls-catalog">
                <div class="left-controls-catalog">
                    <div class="show-count-items" style="margin-left: 0">
                        <span>Отображать по :</span>
                        <select class="select" onchange="if (this.value) window.location.href=this.value">
                            <?
                               $uri->addParams(array("count_to_show"=>"12"));
                            ?>
                            <option value="<?=$uri?>" <?=($countToShow == '12' ? 'selected' : '')?>>12</option>
                            <?
                                $uri->addParams(array("count_to_show"=>"24"));
                            ?>
                            <option value="<?=$uri?>" <?=($countToShow == '24' ? 'selected' : '')?>>24</option>
                            <?
                                $uri->addParams(array("count_to_show"=>"36"));
                            ?>
                            <option value="<?=$uri?>" <?=($countToShow == '36' ? 'selected' : '')?>>36</option>
                        </select>
                    </div>
                    <div class="sorting">
                        <span>Сортировать по: </span>
                        <select class="select" onchange="if (this.value) window.location.href=this.value">
                            <?
                            $uri->addParams(array("sort"=>"r", "by" => 'asc'));
                            ?>
                            <option value="<?=$uri?>" <?=($sort === 'r' ? 'selected' : '')?>>Релевантности</option>
                            <?
                                $uri->addParams(array("sort"=>"catalog_PRICE_2", 'by' => 'asc'));
                            ?>
                            <option value="<?=$uri?>" <?=(($sort === 'catalog_PRICE_2' && $by === 'asc') ? 'selected' : '')?>>Цена по возрастанию</option>
                            <?
                            $uri->addParams(array("sort"=>"catalog_PRICE_2", 'by' => 'desc'));
                            ?>
                            <option value="<?=$uri?>" <?=(($sort === 'catalog_PRICE_2' && $by === 'desc') ? 'selected' : '')?>>Цена по убыванию</option>
                            <?
                                $uri->addParams(array("sort"=>"NAME", 'by' => 'asc'));
                            ?>
                            <option value="<?=$uri?>" <?=($sort === 'NAME' ? 'selected' : '')?>>Названию</option>

                            <?/*
                                <option value="rate" <?=($sort === 'sort' ? 'selected' : '')?>>Популярности</option>
                                <option value="price_asc" <?=(($sort === 'catalog_PRICE_2' && $by === 'asc') ? 'selected' : '')?>>Цена по возрастанию
                                </option>
                                <option value="price_desc" <?=(($sort === 'catalog_PRICE_2' && $by === 'desc') ? 'selected' : '')?>>Цена по убыванию
                                </option>
                                <option value="name" <?=($sort === 'NAME' ? 'selected' : '')?>>Названию</option>
                                */?>

                        </select>
                    </div>
                </div>
                <?/*
                <div class="right-controls-catalog">
                    <div class="type-display">
                        <?
                            $uri->addParams(array("section_type"=>"block"));
                        ?>
                        <a href="<?=$uri?>" class="type-block-items <?=($request['section_type'] !== 'list' ? 'selected' : '')?>"></a>
                        <?
                            $uri->addParams(array("section_type"=>"list"));
                        ?>
                        <a href="<?=$uri?>" class="type-list-items <?=($request['section_type'] !== 'block' ? 'selected' : '')?>"></a>
                    </div>
                </div>
                */?>
            </div>
        </div>
    </div>
<?
if (!empty($arElements) && is_array($arElements))
{
	global $searchFilter;
	$searchFilter = array(
		"=ID" => $arElements,
	);
	$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
        'base_block',
		array(
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N", //по необходимости
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "LIST_PROPERTY_CODE" => array(
                0 => "SALE",
                1 => "BESTSELLER",
                2 => "NEW",
                3 => "LENTEN",
                4 => "HOT",
                5 => "WEIGHT",
                6 => "METKA_NOVINKA",
            ),
            "LIST_OFFERS_PROPERTY_CODE" => array(
                0 => "WEIGHT",
                1 => "FILLER",
                2 => "SIZE_PIZZA",
                3 => "TYPE_PIZZA",
                4 => "METKA_NOVINKA",
            ),
			"PAGE_ELEMENT_COUNT" => $countToShow,
			"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
			"PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
			"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
			"OFFERS_FIELD_CODE" => $arParams["OFFERS_FIELD_CODE"],
			"OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
            "ELEMENT_SORT_FIELD" => $sort,
            "ELEMENT_SORT_ORDER" => $by,
            //"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
            //"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
//			"OFFERS_SORT_FIELD" => $sort,
//            "OFFERS_SORT_ORDER" => $by,
            "PRICE_CODE" => $arParams["PRICE_CODE"],
//            "OFFERS_SORT_FIELD" => "sort",
//            "OFFERS_SORT_FIELD2" => "id",
//            "OFFERS_SORT_ORDER" => "asc",
//            "OFFERS_SORT_ORDER2" => "asc",
			"OFFERS_LIMIT" => "5",
			"SECTION_URL" => $arParams["SECTION_URL"],
			"DETAIL_URL" => $arParams["DETAIL_URL"],
			"BASKET_URL" => $arParams["BASKET_URL"],
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"DISPLAY_COMPARE" => $arParams["DISPLAY_COMPARE"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
			"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
			"USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
			"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
			"CURRENCY_ID" => $arParams["CURRENCY_ID"],
			"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
			"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"FILTER_NAME" => "searchFilter",
			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"SECTION_USER_FIELDS" => array(),
			"INCLUDE_SUBSECTIONS" => "Y",
			"SHOW_ALL_WO_SECTION" => "Y",
			"META_KEYWORDS" => "",
			"META_DESCRIPTION" => "",
			"BROWSER_TITLE" => "",
			"ADD_SECTIONS_CHAIN" => "N",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "N",
			//"SORT_SEARCH" => $arElements,
		),
		$arResult["THEME_COMPONENT"],
		array('HIDE_ICONS' => 'Y')
	);

} else {?>
    <div class="nothing-found">
        <p>К сожалению, ничего не найдено</p>
    </div>
<?}?>
