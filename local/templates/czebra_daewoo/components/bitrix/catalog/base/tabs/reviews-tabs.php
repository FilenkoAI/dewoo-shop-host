<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>
<?
    GLOBAL $arrReviewsFilter;
    $arrReviewsFilter = [
            'PROPERTY_PRODUCT' => $elementId
    ]
?>
<div class="tab-pane fade" id="reviews-tabs">
    <div class="wrapp-reviews-card">
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "reviews",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("", ""),
                "FILTER_NAME" => "arrReviewsFilter",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "20",
                "IBLOCK_TYPE" => "feedback",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "20",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("AUTHOR", "DATE", "RATING", "LIKES", "DISLIKES", "PROS", "CONS", "COMMENT", "PRODUCT"),
                "SET_BROWSER_TITLE" => "Y",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "Y",
                "SET_META_KEYWORDS" => "Y",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "PROPERTY_DATE",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N"
            )
        );?>
    </div>
</div>
<div style="display: none">
    <?$APPLICATION->IncludeComponent(
        "czebra:form",
        "review_ajax",
        Array(
            "PRODUCT" => $elementId,
            "ACTIVE" => "N",
            "FORM_ID" => "FORM_REVIEWS",
            "IBLOCK_ID" => "20",
            "IBLOCK_TYPE" => "feedback",
            "MSG_BTN" => "Оставить отзыв",
            "NAME_POST_EVENT" => "",
            "PROPERTY_CODES" => array("RATING", "AUTHOR", "PROS", "CONS", "COMMENT", "PRODUCT", "EMAIL"),
            "PROPERTY_CODES_REQUIRED_CHECKBOX" => array(),
            "PROPERTY_CODES_REQUIRED_EMAIL" => array("EMAIL"),
            "PROPERTY_CODES_REQUIRED" => ["RATING", "AUTHOR", "EMAIL"],
            "RETURN_URL" => "",
            "USER_MESSAGE_ADD" => "Спасибо! Ваш отзыв очень важен для нас.",
            "TITLE" => 'Оставить отзыв',
            "USE_CAPTCHA" => "N",
            "VALIDATED" => "Y",
        )
    );
    ?>
</div>

