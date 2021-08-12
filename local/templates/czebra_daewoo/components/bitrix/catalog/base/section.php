<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

use Bitrix\Main\Loader;

//request нужен ниже и в нескольких местах
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
//
$arFilter = array(
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "ACTIVE" => "Y",
    "GLOBAL_ACTIVE" => "Y",
);
if(0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
    $arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
elseif('' != $arResult["VARIABLES"]["SECTION_CODE"])
    $arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

$obCache = new CPHPCache();
if($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog")) {
    $arCurSection = $obCache->GetVars();
} elseif($obCache->StartDataCache()) {
    $arCurSection = array();
    if(Loader::includeModule("iblock")) {
        $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID", "NAME"));

        if(defined("BX_COMP_MANAGED_CACHE")) {
            global $CACHE_MANAGER;
            $CACHE_MANAGER->StartTagCache("/iblock/catalog");

            if($arCurSection = $dbRes->Fetch()){
                $CACHE_MANAGER->RegisterTag('iblock_id_' . $arParams['IBLOCK_ID']);
                $arCurSection['ELEMENTS_COUNT'] = CIBlockSection::GetSectionElementsCount($arCurSection['ID'], ['CNT_ACTIVE' => 'Y']);
            }

            $CACHE_MANAGER->EndTagCache();
        } else {
            if(!$arCurSection = $dbRes->Fetch())
                $arCurSection = array();
        }
    }
    $obCache->EndDataCache($arCurSection);
}
if(!isset($arCurSection))
    $arCurSection = array();
?>

<?
// Тип отображение списка
if($request['type'] === 'list') {
    $template = 'base_list';
} else {
//    if ($arCurSection['ELEMENTS_COUNT'] <= 3){
//        $template = 'base_list';
//    } else {
    $template = 'base_block';
//    }
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
$sort = '';
$by = '';



if ($request['sort'] == 'price_asc'){
    $sort = 'catalog_PRICE_2';
    $by = 'asc';

} else if($request['sort'] == 'price_desc'){
    $sort = 'catalog_PRICE_2';
    $by = 'desc';

} else if($request['sort'] == 'name'){
    $sort = 'NAME';
    $by = 'asc';
} else {
    $sort = 'sort';
    $by = 'asc';
}
?>

<?/*вывод дополнительных ссылок*/?>
<?
$arAdditionalSections = [];
$db_list = CIBlockSection::GetList(Array(SORT=>"ASC"), $arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ID"=>$arResult["VARIABLES"]["SECTION_ID"]), true, $arSelect=Array("UF_*"));
if($ar_result = $db_list->GetNext()){

    if ($ar_result['UF_SHOW_ADDITIONAL_MENU'] === '1') {

        $db_list2 = CIBlockSection::GetList(Array(SORT=>"ASC"), $arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "SECTION_ID"=>$arResult["VARIABLES"]["SECTION_ID"]), true, $arSelect=Array("UF_*"));

        while($ar_result_item = $db_list2->GetNext()){
            //десктопные картинки
            if ($ar_result_item['UF_ADDITIONAL_MENU_IMAGE'] || $ar_result_item['UF_IMAGE_NO_HOVER']){
                if ($ar_result_item['UF_ADDITIONAL_MENU_LINK']){
                    $tempLink['NAME'] = $ar_result_item['UF_ADDITIONAL_MENU_LINK'];
                } else {
                    $tempLink['NAME'] = $ar_result_item['NAME'];
                }
                $tempLink['LINK'] = $ar_result_item['SECTION_PAGE_URL'];

                //новые картики(такие же как и в меню)
                if($ar_result_item['UF_IMAGE_NO_HOVER'])
                {
                    $tempLink['IMAGE'] = CFile::GetPath($ar_result_item['UF_IMAGE_NO_HOVER']);
                    if($ar_result_item['UF_IMAGE_HOVER'])
                    {
                        $tempLink['IMAGE_HOVER'] = CFile::GetPath($ar_result_item['UF_IMAGE_HOVER']);
                    }
                    elseif($ar_result_item['UF_ADDITIONAL_MENU_IMAGE_HOVER'])
                    {
                        $tempLink['IMAGE_HOVER'] = CFile::GetPath($ar_result_item['UF_ADDITIONAL_MENU_IMAGE_HOVER']);
                    }
                    else
                    {
                        $tempLink['IMAGE_HOVER'] = CFile::GetPath($ar_result_item['UF_IMAGE_NO_HOVER']);
                    }
                }
                //если их нет, то пытаемся добавить конкретные
                else if ($ar_result_item['UF_ADDITIONAL_MENU_IMAGE'])
                {
                    $tempLink['IMAGE'] = CFile::GetPath($ar_result_item['UF_ADDITIONAL_MENU_IMAGE']);
                    if($ar_result_item['UF_ADDITIONAL_MENU_IMAGE_HOVER'])
                    {
                        $tempLink['IMAGE_HOVER'] = CFile::GetPath($ar_result_item['UF_ADDITIONAL_MENU_IMAGE_HOVER']);
                    }
                    elseif($ar_result_item['UF_IMAGE_HOVER'])
                    {
                        $tempLink['IMAGE_HOVER'] = CFile::GetPath($ar_result_item['UF_IMAGE_HOVER']);
                    }
                    else
                    {
                        $tempLink['IMAGE_HOVER'] = CFile::GetPath($ar_result_item['UF_ADDITIONAL_MENU_IMAGE']);
                    }
                }
                //мобильные картинки

                if ( $ar_result_item['UF_ICON_MOBILE'] ) {
                    $tempLink['ICON_MOBILE'] = CFile::GetPath($ar_result_item['UF_ICON_MOBILE']);
                }
                $arAdditionalSections[] = $tempLink;
            }
        }
    }
}
?>

<?/*вывод дополнительных ссылок*/?>
<h1 style="display: none">
    <?$APPLICATION->ShowTitle(false)?>
</h1>

<div class="wrapp-catalog">
    <?if(count($arAdditionalSections) > 0):?>
    <div class="wrapp-list-subsection">
        <div class="container">
            <div class="list-subsection">
                <?foreach($arAdditionalSections as $section):?>
                <div class="item-section">
                    <a href="<?=$section['LINK']?>">
                        <img src="<?=$section['IMAGE']?>" alt="" class="dt-img">
                        <?if($section['IMAGE_HOVER']):?>
                            <img src="<?=$section['IMAGE_HOVER']?>" alt="" class="dt-img dt-img-hover">
                        <?endif?>
                        <img src="<?=$section['ICON_MOBILE']?>" alt="" class="mb-img">
                        <span><?=$section['NAME']?></span>
                    </a>
                </div>
                <?endforeach?>
            </div>
        </div>
    </div>
    <?endif?>

    <div class="wrapp-controls-catalog">
        <div class="container">
            <div class="controls-catalog">
                <div class="left-controls-catalog">
                    <div class="wrapp-open-filters">
                        <a href="#">Фильтры</a>
                    </div>
                    <div class="show-count-items">
                        <span>Отображать по :</span>
                        <select class="select">
                            <option <?=($countToShow == '12' ? 'selected' : '')?>>12</option>
                            <option <?=($countToShow == '24' ? 'selected' : '')?>>24</option>
                            <option <?=($countToShow == '36' ? 'selected' : '')?>>36</option>
                        </select>
                    </div>
                    <div class="sorting">
                        <span>Сортировать по :</span>
                        <select class="select">
                            <option value="rate" <?=($sort === 'sort' ? 'selected' : '')?>>Популярности</option>
                            <option value="price_asc" <?=(($sort === 'catalog_PRICE_2' && $by === 'asc') ? 'selected' : '')?>>Цена по возрастанию
                            </option>
                            <option value="price_desc" <?=(($sort === 'catalog_PRICE_2' && $by === 'desc') ? 'selected' : '')?>>Цена по убыванию
                            </option>
                            <option value="name" <?=($sort === 'NAME' ? 'selected' : '')?>>Названию</option>
                        </select>
                    </div>
                </div>
                <div class="right-controls-catalog">
                    <div class="type-display">
                        <a href="?type=block"
                           class="type-block-items <?=($template === 'base_block' ? 'selected' : '')?>"></a>
                        <a href="?type=list"
                           class="type-list-items <?=($template !== 'base_block' ? 'selected' : '')?>"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?
    $rs = CIBlockElement::GetList(
        [],
        ['IBLOCK_ID' => '24', 'SECTION_ID' => $arCurSection['ID'], 'INCLUDE_SUBSECTIONS' => 'Y', 'ACTIVE' => 'Y'],
        false,
        false,
        []
    );
    ?>
    <? if ($rs->SelectedRowsCount() > 1):?>
        <div class="wrapp-catalog-filter" style="display:none;">
            <div class="container">
                <div class="catalog-filter">

                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:catalog.smart.filter",
                        "baseprod",
                        array(
                            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                            "SECTION_ID" => $arCurSection['ID'],
                            "FILTER_NAME" => $arParams["FILTER_NAME"],
                            "PRICE_CODE" => [$arParams["PRICE_CODE"][1]],
                            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                            "CACHE_TIME" => $arParams["CACHE_TIME"],
                            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                            "SAVE_IN_SESSION" => "N",
                            "FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
                            "XML_EXPORT" => "Y",
                            "SECTION_TITLE" => "NAME",
                            "SECTION_DESCRIPTION" => "DESCRIPTION",
                            'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                            "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
                            'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                            'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                            "SEF_MODE" => $arParams["SEF_MODE"],
                            "SEF_RULE" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["smart_filter"],
                            "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
                            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                            "INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
                        ),
                        $component,
                        array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                </div>
            </div>
        </div>
    <? endif ?>

    <? $intSectionID = $APPLICATION->IncludeComponent(
        "bitrix:catalog.section",
        "$template",
        array(
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N", //по необходимости
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "ELEMENT_SORT_FIELD" => 'catalog_AVAILABLE',
            "ELEMENT_SORT_ORDER" => 'desc',

            "ELEMENT_SORT_FIELD2" => $sort,
            "ELEMENT_SORT_ORDER2" => $by,

            "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
            "PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
            "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
            "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
            "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
            "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
            "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
            "BASKET_URL" => $arParams["BASKET_URL"],
            "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
            "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
            "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
            "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
            "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
            "FILTER_NAME" => "arrSmartFilter",
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_FILTER" => $arParams["CACHE_FILTER"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "SET_TITLE" => $arParams["SET_TITLE"],
            "MESSAGE_404" => $arParams["~MESSAGE_404"],
            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
            "SHOW_404" => $arParams["SHOW_404"],
            "FILE_404" => $arParams["FILE_404"],
            "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
            "PAGE_ELEMENT_COUNT" => $countToShow,
            "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
            "PRICE_CODE" => $arParams["PRICE_CODE"],
            "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
            "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

            "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
            "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
            "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
            "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
            "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

            "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
            "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
            "PAGER_TITLE" => $arParams["PAGER_TITLE"],
            "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
            "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
            "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
            "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
            "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
            "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
            "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
            "LAZY_LOAD" => $arParams["LAZY_LOAD"],
            "MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
            "LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

            "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
            "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
            "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
            "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
            "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
            "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
            "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
            "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

            "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
            "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
            "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
            "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
            "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
            'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
            'CURRENCY_ID' => $arParams['CURRENCY_ID'],
            'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
            'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

            'LABEL_PROP' => $arParams['LABEL_PROP'],
            'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
            'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
            'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
            'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
            'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
            'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
            'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
            'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
            'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
            'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
            'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

            'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
            'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
            'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
            'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
            'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
            'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
            'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
            'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
            'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
            'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
            'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
            'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
            'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
            'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
            'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
            'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
            'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

            'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
            'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
            'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

            'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
            "ADD_SECTIONS_CHAIN" => "Y",
            'ADD_TO_BASKET_ACTION' => $basketAction,
            'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
            'COMPARE_PATH' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
            'COMPARE_NAME' => $arParams['COMPARE_NAME'],
            'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
            'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
            'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
        ),
        $component
    );
    ?>
</div>
<?
    \Czebra\Project\RegionalSEOProperties::setRegionalCatalogTitle();
    \Czebra\Project\RegionalSEOProperties::setRegionalCatalogDescription();
?>
