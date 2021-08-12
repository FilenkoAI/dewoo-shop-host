<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die()?>

<div class="wrapp-accord-card-mobil">
    <div class="list-accord-mobil">
        <div class="item-accord-mobil">
            <a href="javascript:void(0)" class="open-accord" >Характеристики</a>
            <div  class="block-accord">
                <?$APPLICATION->ShowViewContent('characteristics_mobile');?>
                <div class="wrapp-slider-features-mobil">
                    <div class="caption">Преимущества</div>
                    <?
                    global $arrAdvantagesFilterMobile;
                    $arrAdvantagesFilterMobile = [
                        'PROPERTY_CML_ELEM' => $elementId
                    ];
                    ?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "advantages_mobile",
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
                            "FIELD_CODE" => array("",""),
                            "FILTER_NAME" => "arrAdvantagesFilterMobile",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => "29",
                            "IBLOCK_TYPE" => "regions",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "Y",
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
                            "PROPERTY_CODE" => array("DESCRIPTION","CML_ELEM"),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "Y",
                            "SET_META_KEYWORDS" => "Y",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "STRICT_SECTION_CHECK" => "N"
                        )
                    );?>

                </div>
            </div>
        </div>
        <?
        GLOBAL $arrReviewsFilterMobile;
        $arrReviewsFilterMobile = [
            'PROPERTY_PRODUCT' => $elementId
        ]
        ?>
        <div class="item-accord-mobil">
            <a href="#open-reviews-mobile" class="open-accord" rel="nofollow">Отзывы</a>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "reviews_mobile",
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
                    "FILTER_NAME" => "arrReviewsFilterMobile",
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
        <div class="item-accord-mobil service-mobile-wrapper-menu">
            <a href="/servise_centres/" target="_blank" class="open-accord">Сервис и поддержка</a>
            <div class="service-nav-mobile">Документация</div>
            <div class="block-accord">
                <div class="list-sevice-support">
                    <div class="item-service-support img1">
                        <a href="#" data-tab="service-documentary-mobile" class="action" data-name="Документация">
                            <div class="img-service-support"></div>
                            <div class="name-service-support">Документация</div>
                        </a>
                    </div>
                    <div class="item-service-support img2">
                        <a href="#" data-tab="maintenance" class="action" data-name="Техническое обслуживание">
                            <div class="img-service-support"></div>
                            <div class="name-service-support">Техническое обслуживание</div>
                        </a>
                    </div>
                    <div class="item-service-support img3">
                        <a href="/servise_centres/" target="_blank">
                            <div class="img-service-support"></div>
                            <div class="name-service-support">Сервисные центры</div>
                        </a>
                    </div>
                    <div class="item-service-support img4">
                        <a href="#" data-tab="qanda" class="action" data-name="Вопрос-ответ">
                            <div class="img-service-support"></div>
                            <div class="name-service-support">Вопрос-ответ</div>
                        </a>
                    </div>
                    <div class="item-service-support img5">
                        <a href="#" data-tab="pprepare" class="action" data-name="Предпродажная подготовка">
                            <div class="img-service-support"></div>
                            <div class="name-service-support">Предпродажная подготовка</div>
                        </a>
                    </div>
                    <div class="item-service-support img6">
                        <a href="#" data-tab="warranty" class="action" data-name="Гарантия">
                            <div class="img-service-support"></div>
                            <div class="name-service-support">Гарантия</div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="service-mobile-wrapper service-documentary-mobile active">
            <h5>Документация</h5>

            <div class="service-mobile-item " >
                <? if(empty($arResult['DOCUMENTS'])): ?>
                    <div class="item-document">
                        <p>К этому продукту документации нет</p>
                    </div>
                <? else: ?>
                    <? if(!empty($arResult['DOCUMENTS']['CERTIFICATE'])): ?>
                        <div class="item-document">
                            <div class="icon-doc"><img
                                        src="<?=SITE_TEMPLATE_PATH?>/front/img/tabs-services/file.svg" alt="">
                            </div>
                            <div class="info-doc">
                                <div class="name-doc">Сертификат</div>
                                <div class="size-doc"><?=$arResult['DOCUMENTS']['CERTIFICATE']["SIZE"]?></div>
                                <div class="download-doc">
                                    <a href="<?=$arResult['DOCUMENTS']['CERTIFICATE']["LINK"]?>" download>Скачать</a>
                                </div>
                            </div>
                        </div>
                    <? endif ?>
                    <? if(!empty($arResult['DOCUMENTS']['MANUAL'])): ?>
                        <div class="item-document">
                            <div class="icon-doc"><img
                                        src="<?=SITE_TEMPLATE_PATH?>/front/img/tabs-services/file.svg" alt="">
                            </div>
                            <div class="info-doc">
                                <div class="name-doc">Инструкция</div>
                                <div class="size-doc"><?=$arResult['DOCUMENTS']['MANUAL']["SIZE"]?></div>
                                <div class="download-doc">
                                    <a href="<?=$arResult['DOCUMENTS']['MANUAL']["LINK"]?>" download>Скачать</a>
                                </div>
                            </div>
                        </div>
                    <? endif ?>
                <? endif ?>
            </div>

        </div>
        <div class="service-mobile-wrapper pprepare">
            <div class="service-mobile-item">
                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/card/pprepare.php",
                    )
                ); ?>
            </div>
        </div>
        <div class="service-mobile-wrapper maintenance">
            <div class="service-mobile-item">
                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/card/maintenance.php",
                    )
                ); ?>
            </div>
        </div>
        <div class="service-mobile-wrapper qanda">
            <h5>Вопрос-ответ</h5>
            <?$APPLICATION->IncludeComponent(
                "czebra:form",
                "question_ajax",
                Array(
                    "PRODUCT" => $elementId,
                    "ACTIVE" => "N",
                    "FORM_ID" => "FORM_QUESTION_MOBILE",
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
            );?>
            <div class="service-mobile-item">
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
        <div class="service-mobile-wrapper warranty">
            <div class="service-mobile-item">

                <div class="wrapp-step-garanty">
                    <div class="title-step-garanty">Расширенная гарантия daewoo xxl</div>
                    <div class="prev-text-garanty">Программа гарантии DAEWOO XXL позволяет Вам расширить срок
                        бесплатного гарантийного обслуживания до 3-х лет при соблюдении простых условий:
                    </div>
                    <div class="list-step-garanty">
                        <div class="step-garanty step-garanty1">
                            <div class="img-step"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/garanty-xxl/step1.svg" alt=""></div>
                            <div class="text-step">Убедитесь, что продавец заполнил гарантийный талон и указал дату
                                продажи
                            </div>
                        </div>
                        <div class="step-garanty step-garanty2">
                            <div class="img-step"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/garanty-xxl/step2.svg" alt=""></div>
                            <div class="text-step">Не позднее 30 дней с момента покупки зайдите на официальный сайт
                                DAEWOO Power Products
                            </div>
                        </div>
                        <div class="step-garanty step-garanty3">
                            <div class="img-step"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/garanty-xxl/step3.svg" alt=""></div>
                            <div class="text-step">Заполните простую форму и активируйте серийный номер изделия</div>
                        </div>
                        <div class="step-garanty step-garanty4">
                            <div class="img-step"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/garanty-xxl/step4.svg" alt=""></div>
                            <div class="text-step">Получите Сертификат на расширенное гарантийное обслуживание DAEWOO
                                XXL на свой электронный адрес
                            </div>
                        </div>
                        <div class="step-garanty step-garanty5">
                            <div class="img-step"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/garanty-xxl/step5.svg" alt=""></div>
                            <div class="text-step">Регулярно проходите техническое обслуживание в любом авторизованном
                                сервисном центре
                            </div>
                        </div>
                        <div class="step-garanty step-garanty6">
                            <div class="img-step"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/garanty-xxl/step6.svg" alt=""></div>
                            <div class="text-step">Пользуйтесь поддержкой и бесплатным гарантийным ремонтом в ближайшем
                                сервисном центре в течение 3 лет.
                            </div>
                        </div>
                    </div>
                    <div class="extend-garanty">
                        <a href="/xxl_warranty/" class="btn-site1" target="_blank">
                            <span class="btn-trans">Увеличить гарантию</span>
                            <span class="btn-anim">Увеличить гарантию</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <script>
            $('.service-mobile-wrapper-menu .item-service-support a.action').on('click', function (e){
                e.preventDefault();
                let tab = '.' + $(this).data('tab');
                if (!$(tab).hasClass('active')){
                    $('.service-mobile-wrapper').slideUp();
                    $('.service-mobile-wrapper').removeClass('active');
                    $(tab).slideDown();
                    $(tab).addClass('active');
                    if($(this).data('name')){
                        $('.service-nav-mobile').text($(this).data('name'))
                    }
                }
            })
        </script>
        <?
        $arElement = \Bitrix\Iblock\ElementTable::getList([
            "filter" => [
                "ID" => $elementId
            ],
            "select" => ["ID", "IBLOCK_SECTION_ID"]
        ])->fetch();

        GLOBAL $arrFilterRelatedMobile;
        GLOBAL $recommendedProductsMobile;
        $arrFilterRelatedMobile = [
            "!ID" => $elementId,
        ];
        $recommendedProductsMobile = [
            "ID" => $recommendedProducts
        ];
        ?>

        <?if(count($recommendedProducts) > 0):?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:catalog.section",
                "recommended_prod_mobile",
                Array(
                    "TITLE" => "Рекомендуем с этой моделью",
                    "FILTER_NAME" => "recommendedProductsMobile",
                    "ADD_SECTIONS_CHAIN" => "N",
                    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                    "PAGE_ELEMENT_COUNT" => "6",
                    'PRICE_CODE' => $arParams['PRICE_CODE'],
                    "ACTION_VARIABLE" => $arParams['ACTION_VARIABLE'],
                    "ADD_PROPERTIES_TO_BASKET" => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
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
                    "COMPATIBLE_MODE" => "N",
                    "CONVERT_CURRENCY" => "N",
                    "CUSTOM_FILTER" => "",
                    "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
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
                    "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
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
        <?endif;?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "recommended_prod_mobile",
            Array(
                "TITLE" => "Похожие продукты",
                "SECTION_ID" => $arElement["IBLOCK_SECTION_ID"],
                "FILTER_NAME" => "arrFilterRelatedMobile",
                "ADD_SECTIONS_CHAIN" => "N",
                'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                "PAGE_ELEMENT_COUNT" => "6",
                'PRICE_CODE' => $arParams['PRICE_CODE'],
                "ACTION_VARIABLE" => $arParams['ACTION_VARIABLE'],
                "ADD_PROPERTIES_TO_BASKET" => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
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
                "COMPATIBLE_MODE" => "N",
                "CONVERT_CURRENCY" => "N",
                "CUSTOM_FILTER" => "",
                "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
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
                "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
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
    </div>
</div>

