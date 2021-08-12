<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<?
// получаем сертификат соответсвия


?>
<div class="tab-pane fade" id="service-support-tabs">
    <div class="service-support">
        <a href="tel:+78003011012">
            <div class="phone-service">8 (800) 301-10-12</div>
        </a>
        <p>Служба технической поддержки</p>
    </div>
    <div class="wrapp-tabs-service">
        <div class="title-block">Сервис и поддержка</div>
        <div class="service-nav">Документация</div>
        <div class="workarea-tabs-service">
            <div class="menu-tabs">
                <ul>
                    <li class="active"><a href="#tab-support1" data-name="Документация"><span
                                    class="icon-tab-service1"></span>Документация</a>
                    </li>
                    <li><a href="#tab-support2" data-name="Предпродажная подготовка"><span class="icon-tab-service2"><img
                                        src="<?= SITE_TEMPLATE_PATH ?>/front/img/tabs-services/shopping-list2.svg"
                                        alt=""></span>Предпродажная подготовка</a></li>
                    <li><a href="#tab-support3" data-name="Техническое обслуживание"><span class="icon-tab-service3"><img
                                        src="<?= SITE_TEMPLATE_PATH ?>/front/img/tabs-services/technical-support.svg"
                                        alt=""></span>Техническое обслуживание</a></li>
                    <li><a href="#tab-support4" data-name="Сервисные центры"><span class="icon-tab-service4"><img
                                        src="<?= SITE_TEMPLATE_PATH ?>/front/img/tabs-services/customer.svg"
                                        alt=""></span>Сервисные центры</a>
                    </li>
                    <li><a href="#tab-support5" data-name="Задать вопрос"><span class="icon-tab-service5"><img
                                        src="<?= SITE_TEMPLATE_PATH ?>/front/img/tabs-services/help.svg" alt=""></span>Задать вопрос</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab-support1">
                    <div class="list-documents">
                        <? if (empty($arResult['DOCUMENTS'])): ?>
                            <div class="item-document">
                                <p>К этому продукту документации нет</p>
                            </div>
                        <? else: ?>
                            <? if (!empty($arResult['DOCUMENTS']['CERTIFICATE'])): ?>
                                <div class="item-document">
                                    <div class="icon-doc"><img
                                                src="<?= SITE_TEMPLATE_PATH ?>/front/img/tabs-services/file.svg" alt="">
                                    </div>
                                    <div class="info-doc">
                                        <div class="name-doc">Сертификат соответствия</div>
                                        <div class="size-doc"><?= $arResult['DOCUMENTS']['CERTIFICATE']["SIZE"] ?></div>
                                        <div class="download-doc">
                                            <a href="<?= $arResult['DOCUMENTS']['CERTIFICATE']["LINK"] ?>" download>Скачать</a>
                                        </div>
                                    </div>
                                </div>
                            <? endif ?>
                            <? if (!empty($arResult['DOCUMENTS']['MANUAL'])): ?>
                                <div class="item-document">
                                    <div class="icon-doc"><img
                                                src="<?= SITE_TEMPLATE_PATH ?>/front/img/tabs-services/file.svg" alt="">
                                    </div>
                                    <div class="info-doc">
                                        <div class="name-doc">Инструкция</div>
                                        <div class="size-doc"><?= $arResult['DOCUMENTS']['MANUAL']["SIZE"] ?></div>
                                        <div class="download-doc">
                                            <a href="<?= $arResult['DOCUMENTS']['MANUAL']["LINK"] ?>"
                                               download>Скачать</a>
                                        </div>
                                    </div>
                                </div>
                            <? endif ?>
                        <? endif ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-support2">
                    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/card/pprepare.php",
                        )
                    ); ?>
                </div>
                <div class="tab-pane fade" id="tab-support3">
                    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/card/maintenance.php",
                        )
                    ); ?>
                </div>
                <div class="tab-pane fade" id="tab-support4">
                    <div class="wrapp-service-support">
                        <?
                        global $arrFilterServiceCenters;
                        $arrFilterServiceCenters = [
                            "PROPERTY_CITY.NAME" => $cityInfo['NAME']
                        ];
                        ?>

                        <p class="name-tabs select-city-service open-city-modal" onclick="">ВЫБРАТЬ ГОРОД</span></p>


                        <? $APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "service_centers_card",
                            array(
                                "COORDINATES" => $cityInfo['COORDINATES'],
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
                                "FILTER_NAME" => "arrFilterServiceCenters",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => "30",
                                "IBLOCK_TYPE" => "regions",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "INCLUDE_SUBSECTIONS" => "N",
                                "MESSAGE_404" => "",
                                "NEWS_COUNT" => "20300",
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
                                "PROPERTY_CODE" => array("DESCRIPTION", ""),
                                "SET_BROWSER_TITLE" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "SORT_BY1" => "ACTIVE_FROM",
                                "SORT_BY2" => "SORT",
                                "SORT_ORDER1" => "DESC",
                                "SORT_ORDER2" => "ASC",
                                "STRICT_SECTION_CHECK" => "N"
                            )
                        ); ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-support5">
                    <p class="name-tabs">
                        Вопросы и ответы
                        <? $APPLICATION->IncludeComponent(
                            "czebra:form",
                            "question_ajax",
                            array(
                                "PRODUCT" => $elementId,
                                "ACTIVE" => "N",
                                "FORM_ID" => "FORM_QUESTION",
                                "IBLOCK_ID" => "32",
                                "IBLOCK_TYPE" => "feedback",
                                "MSG_BTN" => "Задать вопрос",
                                "NAME_POST_EVENT" => "",
                                "PROPERTY_CODES" => array("QUESTION_AUTHOR", "DATE", "QUESTION", "PRODUCT"),
                                "PROPERTY_CODES_REQUIRED_CHECKBOX" => array(),
                                "PROPERTY_CODES_REQUIRED_EMAIL" => array(),
                                "RETURN_URL" => "",
                                "USER_MESSAGE_ADD" => "Спаибо! Мы ответим на ваш вопрос в ближайшее время.",
                                "USE_CAPTCHA" => "N",
                                "VALIDATED" => "Y",
                                "TITLE" => 'Задать вопрос',
                            )
                        ); ?>

                    </p>
                    <?
                    global $arrServiceSupportQuestionsFilter;
                    $arrServiceSupportQuestionsFilter = [
                        'PROPERTY_PRODUCT' => $elementId
                    ];
                    ?>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "service_support_questions",
                        array(
                            "COORDINATES" => $cityInfo['COORDINATES'],
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "ADD_SECTIONS_CHAIN" => "Y",
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
                            "FILTER_NAME" => "arrServiceSupportQuestionsFilter",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => "32",
                            "IBLOCK_TYPE" => "regions",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "20300",
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
                            "PROPERTY_CODE" => array("DESCRIPTION", ""),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "STRICT_SECTION_CHECK" => "N"
                        )
                    ); ?>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-support6">Информация о вкладке</div>
        </div>
    </div>
</div>
