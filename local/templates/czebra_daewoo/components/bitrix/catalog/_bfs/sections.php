<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>
<?//$APPLICATION->IncludeComponent(
//    "bitrix:catalog.section.list",
//    "",
//    Array(
//        "NAME_IBLOCK" => $arParams["NAME_IBLOCK"],
//        "ADD_SECTIONS_CHAIN" => "Y",
//        "CACHE_FILTER" => "N",
//        "CACHE_GROUPS" => "Y",
//        "CACHE_TIME" => "36000000",
//        "CACHE_TYPE" => "A",
//        "COUNT_ELEMENTS" => "N",
//        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
//        "FILTER_NAME" => "sectionsFilter",
//        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
//        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
//        "SECTION_CODE" => "",
//        "SECTION_FIELDS" => array("", ""),
//        "SECTION_ID" => "",
//        "SECTION_URL" => "",
//        "SECTION_USER_FIELDS" => array("", ""),
//        "SHOW_PARENT_NAME" => "Y",
//        "TOP_DEPTH" => "1",
//        "VIEW_MODE" => "LINE"
//    )
//);?>
<?require(realpath(dirname(__FILE__)) . '/section.php')?>
