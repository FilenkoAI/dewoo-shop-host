<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("");
$api_key = \Czebra\Project\YandexMaps::getApiKey();
const PICKUP_ID = 3;
const COURIER_DELIVERY_ID = 2;
global $USER;
global $cityInfo;
global $arrFilterCity;
$arrFilterCity = [
    "PROPERTY_CITY.NAME" => $cityInfo['NAME']
];
$deliveryProperties = $_SESSION['CZ_ORDER']['DELIVERY'];
$json = file_get_contents('moscow.json');
//if($_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] === 'delivery' && $cityInfo['NAME'] === 'Москва'){
//    $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] = '';
//}
if ($_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] === 'delivery_moscow' && $cityInfo['NAME'] !== 'Москва') {
    $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] = '';
}
$deliveryPriceController = new \Czebra\Project\DeliveryController();

?>
    <script>
        function changeDeliveryType(type) {
            BX.ajax.runAction('czebra:project.api.changeorderproperty.changedeliverytype', {
                data: {
                    type: type
                }
            }).then((data) => {
                let delivery_price;
                if(data.data['DESCRIPTION']){
                    delivery_price = data.data['DESCRIPTION'];
                } else {
                    delivery_price = data.data['DELIVERY_PRICE'];
                }
                let total = data.data['TOTAL'];
                let deliveryName = data.data['TYPE'];
                if (deliveryName) {
                    changeDeliveryVisualData(deliveryName, delivery_price, total);
                }
            });
        }
    </script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<?= $api_key ?>" type="text/javascript"></script>
    <div class="wrapp-step-cart">
        <div class="container">
            <ul>
                <li><span class="name-step">Начало</span> <span class="count-step">1</span></li>
                <li class="selected"><span class="name-step">Адрес доставки</span><span class="count-step">2</span></li>
                <li><span class="name-step">Дата доставки</span><span class="count-step">3</span></li>
                <li><span class="name-step">Способ оплаты</span><span class="count-step">4</span></li>
                <li><span class="name-step">Подтверждение заказа</span><span class="count-step">5</span></li>
            </ul>
        </div>
    </div>
    <div class="wrapp-registration-order page-type-payment-cart">
        <div class="container">
            <div class="workarea-registration-order">
                <div class="left-column-registration-order">
                    <div class="wrapp-address-delivery">
                        <div class="tabs-address-delivery">
                            <? $selectedDeliveryType = $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] ?>
                            <? if ($cityInfo['NAME'] !== 'Другой город'): ?>

                                <ul class="menu-tabs  <? if ($cityInfo['NAME'] != 'Москва'): ?>moscow<? endif ?>">
                                    <? if ($cityInfo['NAME'] === 'Москва' || $cityInfo['MO'] === 'Y'): ?>
                                        <?
                                        $deliveryDataMoscow = \Czebra\Project\DeliveryController::getDeliveryPrice('delivery_moscow');
                                        ?>
                                        <li class="icon-delivery1"
                                            style="width: <? if ($cityInfo['NAME'] != 'Москва'): ?>50%<? else: ?>33.33%<? endif; ?>">
                                            <a href="#delivery-courier"
                                               <? if ($deliveryDataMoscow > 0): ?>onclick="changeDeliveryType('delivery_moscow')"<? endif; ?>
                                            ><span
                                                        class="dt-tab">Курьером по Москве и МО</span> <span
                                                        class="mob-tab">Курьером</span></a></li>
                                    <? endif; ?>
                                    <?
                                    $deliveryDataPickup = \Czebra\Project\DeliveryController::getDeliveryPrice('pickup');
                                    ?>
                                    <li class="<? if ($selectedDeliveryType !== 'delivery'): ?>active<? endif ?>  icon-delivery2"
                                        style="width: <? if ($cityInfo['NAME'] != 'Москва'): ?>50%<? else: ?>33.33%<? endif; ?>">
                                        <a href="#pickup"
                                           <? if ($deliveryDataPickup > 0): ?>onclick="changeDeliveryType('pickup')"<? endif; ?>>Самовывоз</a>
                                    </li>
                                    <?
                                    $deliveryDataTC = \Czebra\Project\DeliveryController::getDeliveryPrice('delivery');
                                    ?>
                                    <li class="icon-delivery3 <? if ($selectedDeliveryType === 'delivery'): ?>active<? endif ?>"
                                        style="width: <? if ($cityInfo['NAME'] != 'Москва'): ?>50%<? endif; ?>"><a
                                                href="#delivery-company"
                                                <? if ($deliveryDataTC > 0): ?>onclick="changeDeliveryType('delivery')"<? endif; ?>
                                        ><? if ($cityInfo['NAME'] == 'Москва'): ?>В регионы РФ<? else: ?>Транспортной компанией<? endif; ?></a>
                                    </li>
                                </ul>
                            <? endif ?>
                            <div class="tab-content">
                                <? if ($cityInfo['NAME'] === 'Москва' || $cityInfo['MO'] === 'Y'): ?>
                                    <div class="tab-pane fade in" id="delivery-courier">
                                        <div class="wrapp-delivery-courier">
                                            <div class="form-address-delivery">
                                                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                                                        "AREA_FILE_SHOW" => "file",
                                                        "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/delivery_moscow_prices_basket.php",
                                                    )
                                                ); ?>

                                                <?
                                                $deliveryCondition = $deliveryPriceController->getMoscowDeliveryConditions();

                                                ?>
                                                <? if ($deliveryCondition['CODE'] == \Czebra\Project\DeliveryController::MO_PICKUP): ?>
                                                    <div class="delivery_moscow_alert">
                                                        Доставка возможна только при покупке
                                                        от <?= $deliveryCondition['MIN_PRICE_FOR_CONDITION'] ?>
                                                        руб.
                                                    </div>
                                                <? endif ?>

                                                <? if ($deliveryCondition['CODE'] != \Czebra\Project\DeliveryController::MO_PICKUP): ?>
                                                    <form action="" id="moscow_delivery_form" data-delivery-id="2">
                                                        <div class="wrapp-field">
                                                            <label for="" style="margin-bottom: 6px">Область,
                                                                город*</label>
                                                            <? /*<input type="text" value="Москва" readonly>*/ ?>
                                                            <? $APPLICATION->IncludeComponent(
                                                                "bitrix:sale.location.selector.search",
                                                                "delivery_moscow",
                                                                array(
                                                                    "CODE" => "",
                                                                    "ID" => $_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW_ID'],
                                                                    "INPUT_NAME" => "delivery_moscow",
                                                                    "PROVIDE_LINK_BY" => "id",
                                                                    "JSCONTROL_GLOBAL_ID" => "",
                                                                    "JS_CALLBACK" => "",
                                                                    "FILTER_BY_SITE" => "Y",
                                                                    "SHOW_DEFAULT_LOCATIONS" => "Y",
                                                                    "CACHE_TYPE" => "N",
                                                                    "CACHE_TIME" => "36000000",
                                                                    "FILTER_SITE_ID" => "l1",
                                                                    "INITIALIZE_BY_GLOBAL_EVENT" => "",
                                                                    "SUPPRESS_ERRORS" => "N"
                                                                )
                                                            ); ?>
                                                        </div>
                                                        <div class="wrapp-field">
                                                            <label for="">Улица*</label>
                                                            <input type="text" data-delivery-moscow-name="STREET_MOSCOW"
                                                                   value="<?= $deliveryProperties['STREET_MOSCOW'] ?>">
                                                        </div>
                                                        <div class="row-field">
                                                            <div class="wrapp-field">
                                                                <label for="">Дом*</label>
                                                                <input type="text"
                                                                       data-delivery-moscow-name="HOUSE_MOSCOW"
                                                                       value="<?= $deliveryProperties['HOUSE_MOSCOW'] ?>">
                                                            </div>
                                                            <div class="wrapp-field">
                                                                <label for="">Корпус</label>
                                                                <input type="text"
                                                                       data-delivery-moscow-name="CORPUS_MOSCOW"
                                                                       value="<?= $deliveryProperties['CORPUS_MOSCOW'] ?>">
                                                            </div>
                                                            <div class="wrapp-field">
                                                                <label for="">Кв. / офис</label>
                                                                <input type="text"
                                                                       data-delivery-moscow-name="APARTMENT_MOSCOW"
                                                                       value="<?= $deliveryProperties['APARTMENT_MOSCOW'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="wrapp-textarea">
                                                            <label>Комментарий</label>
                                                            <textarea
                                                                    data-delivery-moscow-name="COMMENT_MOSCOW"><?= $deliveryProperties['COMMENT_MOSCOW'] ?></textarea>
                                                        </div>
                                                    </form>
                                                    <?
                                                    if ($deliveryCondition['DESCRIPTION']) {
                                                        $deliveryMoscowPrice = mb_strtolower($deliveryCondition['DESCRIPTION']);
                                                    } else {
                                                        if ($deliveryCondition['PRICE'] == 0) {
                                                            $deliveryMoscowPrice = "<span class='icon-is-free'>Бесплатно</span>";
                                                        } else {
                                                            $deliveryMoscowPrice = '<b>' . $deliveryCondition['PRICE'] . '<span class="rubl">i</span>' . '</b>';
                                                        }
                                                    }
                                                    ?>

                                                    <? if ($deliveryMoscowPrice): ?>
                                                        <div class="free_delivery_badge">
                                                            <p class="sum-delivery">Стоимость
                                                                доставки <?= $deliveryMoscowPrice ?></p>
                                                        </div>
                                                        <br>
                                                    <? endif ?>
                                                <? endif ?>
                                            </div>
                                            <div class="map-delivery" id="mapMoscow"
                                                 style="width: 414px; height: 425px;">
                                            </div>

                                            <script>
                                                ymaps.ready(init);

                                                let json = <?=$json?>;
                                                let coordinates = json;

                                                function init() {
                                                    var myMap = new ymaps.Map("mapMoscow", {
                                                        center: [55.73, 37.75],
                                                        zoom: 9,
                                                        controls: ['zoomControl', 'fullscreenControl']
                                                    }, {
                                                        searchControlProvider: 'yandex#search'
                                                    });
                                                    var myGeoObject = new ymaps.GeoObject({
                                                        geometry: {
                                                            type: "Polygon",
                                                            coordinates: coordinates,
                                                            fillRule: "evenOdd"
                                                        },

                                                    }, {
                                                        fillColor: '#DE6A50',
                                                        strokeColor: '#DE6A50',
                                                        opacity: 1,
                                                        fillOpacity: 0.1,
                                                        strokeWidth: 2.5,
                                                    });

                                                    myMap.geoObjects.add(myGeoObject);


                                                }

                                            </script>
                                            <? if ($deliveryCondition['CODE'] != \Czebra\Project\DeliveryController::MO_PICKUP): ?>
                                                <p>Мы уточним у вас удобное время доставки и наши курьеры подьедут точно
                                                    в
                                                    срок.</p>
                                            <? endif ?>
                                        </div>
                                    </div>
                                <? endif; ?>

                                <div class="tab-pane fade <? if ($cityInfo['NAME'] !== 'Другой город' && $selectedDeliveryType !== 'delivery'): ?>active<? endif; ?> in"
                                     id="pickup">
                                    <? if ($cityInfo['NAME'] !== 'Другой город' && $selectedDeliveryType !== 'delivery'): ?>
                                        <script>
                                            changeDeliveryType('pickup');
                                        </script>
                                    <? endif ?>
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:news.list",
                                        "pickup_order",
                                        array(
                                            "SELECTED_PICKUP" => $_SESSION['CZ_ORDER']['DELIVERY']['PICKUP_SHOP_ID'],
                                            "PICKUP_ID" => PICKUP_ID,
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
                                            "FILTER_NAME" => "arrFilterCity",
                                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                            "IBLOCK_ID" => "28",
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
                                            "PROPERTY_CODE" => array("DESCRIPTION", ""),
                                            "SET_BROWSER_TITLE" => "Y",
                                            "SET_LAST_MODIFIED" => "N",
                                            "SET_META_DESCRIPTION" => "Y",
                                            "SET_META_KEYWORDS" => "Y",
                                            "SET_STATUS_404" => "N",
                                            "SET_TITLE" => "Y",
                                            "SHOW_404" => "N",
                                            "SORT_BY1" => "ACTIVE_FROM",
                                            "SORT_BY2" => "SORT",
                                            "SORT_ORDER1" => "DESC",
                                            "SORT_ORDER2" => "ASC",
                                            "STRICT_SECTION_CHECK" => "N"
                                        )
                                    ); ?>
                                </div>

                                <div class="tab-pane fade in <? if ($cityInfo['NAME'] === 'Другой город' || $selectedDeliveryType === 'delivery'): ?>active<? endif; ?>"
                                     id="delivery-company">

                                    <div class="adress-delivery-company">
                                        <?
                                        $deliveryCondition = $deliveryPriceController->getTCDeliveryConditions();

                                        ?>
                                        <? if ($deliveryCondition['CODE'] != \Czebra\Project\DeliveryController::ONLY_PICKUP_RF): ?>
                                            <p class="title-delivery">Адрес доставки</p>
                                        <? endif; ?>
                                        <div class="form-delivery-company">
                                            <form action="/personal_section/cart/order_date/" method="post"
                                                  id="delivery_form">
                                                <? if ($deliveryCondition['CODE'] != \Czebra\Project\DeliveryController::ONLY_PICKUP_RF): ?>
                                                    <div class="info-user-company" id="delivery_company_fields">
                                                        <div class="list-field">
                                                            <div class="wrapp-field">
                                                                <label for="">Город*</label>
                                                                <? if ($cityInfo['NAME'] !== 'Минск'): ?>
                                                                    <? $APPLICATION->IncludeComponent(
                                                                        "bitrix:sale.location.selector.search",
                                                                        "delivery",
                                                                        array(
                                                                            "ID" => $_SESSION['CZ_ORDER']['CITY']['ID'],
                                                                            "COMPONENT_TEMPLATE" => ".default",
                                                                            "CODE" => "",
                                                                            "INPUT_NAME" => "delivery_city",
                                                                            "PROVIDE_LINK_BY" => "id",
                                                                            "JSCONTROL_GLOBAL_ID" => "",
                                                                            "JS_CALLBACK" => "",
                                                                            "FILTER_BY_SITE" => "Y",
                                                                            "SHOW_DEFAULT_LOCATIONS" => "Y",
                                                                            "CACHE_TYPE" => "A",
                                                                            "CACHE_TIME" => "36000000",
                                                                            "FILTER_SITE_ID" => "l2",
                                                                            "INITIALIZE_BY_GLOBAL_EVENT" => "",
                                                                            "SUPPRESS_ERRORS" => "N"
                                                                        )
                                                                    ); ?>
                                                                <? else: ?>
                                                                    <input type="text" data-name="город"
                                                                           data-required="true" name="delivery_city"
                                                                           value="<?= $cityInfo['NAME'] ?>" disabled>
                                                                    <? $_SESSION['CZ_ORDER']['DELIVERY']['CITY'] = 'Минск'; ?>
                                                                <? endif ?>
                                                            </div>
                                                            <div class="wrapp-field">
                                                                <label for="">Улица*</label>
                                                                <input type="text" data-name="улица"
                                                                       data-delivery-company-name="STREET"
                                                                       value="<?= $deliveryProperties['STREET'] ?>">
                                                            </div>
                                                            <div class="row-field">
                                                                <div class="wrapp-field">
                                                                    <label for="">Дом*</label>
                                                                    <input type="text" data-name="дом"
                                                                           data-required="true"
                                                                           data-delivery-company-name="HOUSE"
                                                                           value="<?= $deliveryProperties['HOUSE'] ?>">
                                                                </div>
                                                                <div class="wrapp-field">
                                                                    <label for="">Корпус</label>
                                                                    <input type="text" name="delivery_corpus"
                                                                           data-delivery-company-name="CORPUS"
                                                                           value="<?= $deliveryProperties['CORPUS'] ?>">
                                                                </div>
                                                                <div class="wrapp-field">
                                                                    <label for="">Кв. / офис</label>
                                                                    <input type="text"
                                                                           data-delivery-company-name="APARTMENT"
                                                                           value="<?= $deliveryProperties['APARTMENT'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block-textarea">
                                                            <div class="wrapp-textarea">
                                                                <label for="">Комментарий</label>
                                                                <textarea name="delivery_comment"
                                                                          data-delivery-company-name="COMMENT"><?= $deliveryProperties['COMMENT'] ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <? endif; ?>
                                                <? if ($cityInfo['NAME'] !== 'Минск'): ?>
                                                    <?
                                                    $companies = \Czebra\Project\DeliveryCompanies::getDeliveryCompanies();
                                                    ?>
                                                    <div class="select-company-delivery">
                                                        <? $APPLICATION->IncludeComponent(
                                                            "bitrix:sale.order.ajax",
                                                            "delivery_calc",
                                                            array(
                                                                "SHOW_DELIVERY_INFO_NAME" => "Y",
                                                                "SHOW_DELIVERY_LIST_NAMES" => "Y",
                                                                "SHOW_DELIVERY_PARENT_NAMES" => "Y",
                                                                "PAY_FROM_ACCOUNT" => "Y",
                                                                "COUNT_DELIVERY_TAX" => "N",
                                                                "COMPATIBLE_MODE" => "Y",
                                                                "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
                                                                "ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
                                                                "ALLOW_AUTO_REGISTER" => "Y",
                                                                "SEND_NEW_USER_NOTIFY" => "Y",
                                                                "DELIVERY_NO_AJAX" => "N",
                                                                "TEMPLATE_LOCATION" => "popup",
                                                                "PROP_1" => "",
                                                                "PATH_TO_BASKET" => "/personal_section/cart/",
                                                                "PATH_TO_PERSONAL" => "/personal_section/order/",
                                                                "PATH_TO_PAYMENT" => "/personal_section/payment/",
                                                                "PATH_TO_ORDER" => "/personal_section/order/make/",
                                                                "SET_TITLE" => "Y",
                                                                "PRODUCT_COLUMNS_VISIBLE" => array(),
                                                                "ADDITIONAL_PICT_PROP_13" => "MORE_PHOTO",
                                                                "DELIVERY2PAY_SYSTEM" => "",
                                                                "SHOW_ACCOUNT_NUMBER" => "Y",
                                                                "DELIVERY_NO_SESSION" => "Y",
                                                                "CZ_REQUIRED_DELIVERY_PROPS" => "",
                                                                "COMPONENT_TEMPLATE" => "delivery_calc",
                                                                "ALLOW_APPEND_ORDER" => "Y",
                                                                "SHOW_NOT_CALCULATED_DELIVERIES" => "L",
                                                                "SPOT_LOCATION_BY_GEOIP" => "Y",
                                                                "DELIVERY_TO_PAYSYSTEM" => "d2p",
                                                                "SHOW_VAT_PRICE" => "Y",
                                                                "USE_PREPAYMENT" => "N",
                                                                "USE_PRELOAD" => "Y",
                                                                "ALLOW_USER_PROFILES" => "N",
                                                                "ALLOW_NEW_PROFILE" => "N",
                                                                "TEMPLATE_THEME" => "blue",
                                                                "SHOW_ORDER_BUTTON" => "final_step",
                                                                "SHOW_TOTAL_ORDER_BUTTON" => "N",
                                                                "SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
                                                                "SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
                                                                "SHOW_STORES_IMAGES" => "Y",
                                                                "SKIP_USELESS_BLOCK" => "Y",
                                                                "BASKET_POSITION" => "after",
                                                                "SHOW_BASKET_HEADERS" => "N",
                                                                "DELIVERY_FADE_EXTRA_SERVICES" => "N",
                                                                "SHOW_NEAREST_PICKUP" => "N",
                                                                "DELIVERIES_PER_PAGE" => "9",
                                                                "PAY_SYSTEMS_PER_PAGE" => "9",
                                                                "PICKUPS_PER_PAGE" => "5",
                                                                "SHOW_PICKUP_MAP" => "Y",
                                                                "SHOW_MAP_IN_PROPS" => "N",
                                                                "PICKUP_MAP_TYPE" => "yandex",
                                                                "SHOW_COUPONS" => "Y",
                                                                "SHOW_COUPONS_BASKET" => "Y",
                                                                "SHOW_COUPONS_DELIVERY" => "Y",
                                                                "SHOW_COUPONS_PAY_SYSTEM" => "Y",
                                                                "PROPS_FADE_LIST_1" => array(),
                                                                "USER_CONSENT" => "N",
                                                                "USER_CONSENT_ID" => "0",
                                                                "USER_CONSENT_IS_CHECKED" => "Y",
                                                                "USER_CONSENT_IS_LOADED" => "N",
                                                                "ACTION_VARIABLE" => "soa-action",
                                                                "PATH_TO_AUTH" => "/auth/",
                                                                "DISABLE_BASKET_REDIRECT" => "N",
                                                                "EMPTY_BASKET_HINT_PATH" => "/",
                                                                "USE_PHONE_NORMALIZATION" => "Y",
                                                                "ADDITIONAL_PICT_PROP_24" => "-",
                                                                "BASKET_IMAGES_SCALING" => "adaptive",
                                                                "SERVICES_IMAGES_SCALING" => "adaptive",
                                                                "PRODUCT_COLUMNS_HIDDEN" => array(),
                                                                "HIDE_ORDER_DESCRIPTION" => "N",
                                                                "USE_YM_GOALS" => "Y",
                                                                "YM_GOALS_COUNTER" => "31362968",
                                                                "YM_GOALS_INITIALIZE" => "BX-order-init",
                                                                "YM_GOALS_EDIT_REGION" => "BX-region-edit",
                                                                "YM_GOALS_EDIT_DELIVERY" => "BX-delivery-edit",
                                                                "YM_GOALS_EDIT_PICKUP" => "BX-pickUp-edit",
                                                                "YM_GOALS_EDIT_PAY_SYSTEM" => "BX-paySystem-edit",
                                                                "YM_GOALS_EDIT_PROPERTIES" => "BX-properties-edit",
                                                                "YM_GOALS_EDIT_BASKET" => "BX-basket-edit",
                                                                "YM_GOALS_NEXT_REGION" => "BX-region-next",
                                                                "YM_GOALS_NEXT_DELIVERY" => "BX-delivery-next",
                                                                "YM_GOALS_NEXT_PICKUP" => "BX-pickUp-next",
                                                                "YM_GOALS_NEXT_PAY_SYSTEM" => "BX-paySystem-next",
                                                                "YM_GOALS_NEXT_PROPERTIES" => "BX-properties-next",
                                                                "YM_GOALS_NEXT_BASKET" => "BX-basket-next",
                                                                "YM_GOALS_SAVE_ORDER" => "BX-order-save",
                                                                "USE_ENHANCED_ECOMMERCE" => "Y",
                                                                "USE_CUSTOM_MAIN_MESSAGES" => "N",
                                                                "USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
                                                                "USE_CUSTOM_ERROR_MESSAGES" => "N",
                                                                "DATA_LAYER_NAME" => "dataLayer",
                                                                "BRAND_PROPERTY" => "PROPERTY_brand"
                                                            ),
                                                            false
                                                        ); ?>
                                                    </div>
                                                <? else: ?>
                                                    <div class="select-company-delivery">
                                                        <?
                                                        $deliveryConditions = (new \Czebra\Project\DeliveryController())->getTCDeliveryConditions();
                                                        ?>
                                                        <? if ($deliveryConditions['CODE'] == \Czebra\Project\DeliveryController::ONLY_PICKUP_RF): ?>
                                                            <div class="delivery_moscow_alert">
                                                                Данный вид доставки возможен только при покупке
                                                                от <?= $deliveryConditions['MIN_PRICE_FOR_CONDITION'] ?>
                                                                руб.
                                                            </div>
                                                        <? endif ?>
                                                    </div>
                                                <? endif ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?
                    $action = "";
                    if ($_SESSION["CZ_ORDER"]["FROM_CONFIRM"] == "Y") {
                        $action = "/personal_section/cart/order_confirm/?from_confirmed=Y";
                    } else {
                        $action = "/personal_section/cart/order_date/";
                    }
                    ?>
                    <div class="btn-cart-bottom">
                        <span class="back-step-cart">
                            <a href="/personal_section/cart/order_start/">
                                <span class="btn-trans">Назад</span>
                                <span class="btn-anim">Назад</span>
                            </a>
                        </span>
                        <span class="next-step-cart" id="order_address_submit">
                            <a href="">
                                <span class="btn-trans">Продолжить</span>
                                <span class="btn-anim">Продолжить</span>
                            </a>
                        </span>
                    </div>
                </div>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket",
                    "order_params",
                    array(
                        "ACTION_VARIABLE" => "action",
                        "AUTO_CALCULATION" => "Y",
                        "TEMPLATE_THEME" => "blue",
                        "COLUMNS_LIST" => array(
                            0 => "NAME",
                            1 => "DISCOUNT",
                            2 => "WEIGHT",
                            3 => "DELETE",
                            4 => "DELAY",
                            5 => "TYPE",
                            6 => "PRICE",
                            7 => "QUANTITY",
                        ),
                        "COMPONENT_TEMPLATE" => "order_params",
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
                        "OFFERS_PROPS" => array(
                            0 => "SIZES_SHOES",
                            1 => "SIZES_CLOTHES",
                        ),
                        "PATH_TO_ORDER" => "/personal/order.php",
                        "PRICE_VAT_SHOW_VALUE" => "N",
                        "QUANTITY_FLOAT" => "N",
                        "SET_TITLE" => "Y",
                        "USE_GIFTS" => "Y",
                        "USE_PREPAYMENT" => "N",
                        "DEFERRED_REFRESH" => "N",
                        "USE_DYNAMIC_SCROLL" => "Y",
                        "SHOW_FILTER" => "Y",
                        "SHOW_RESTORE" => "Y",
                        "COLUMNS_LIST_EXT" => array(
                            0 => "PREVIEW_PICTURE",
                            1 => "DISCOUNT",
                            2 => "DELETE",
                            3 => "DELAY",
                            4 => "TYPE",
                            5 => "SUM",
                        ),
                        "COLUMNS_LIST_MOBILE" => array(
                            0 => "PREVIEW_PICTURE",
                            1 => "DISCOUNT",
                            2 => "DELETE",
                            3 => "DELAY",
                            4 => "TYPE",
                            5 => "SUM",
                        ),
                        "TOTAL_BLOCK_DISPLAY" => array(
                            0 => "top",
                        ),
                        "DISPLAY_MODE" => "extended",
                        "PRICE_DISPLAY_MODE" => "Y",
                        "SHOW_DISCOUNT_PERCENT" => "Y",
                        "DISCOUNT_PERCENT_POSITION" => "bottom-right",
                        "PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
                        "USE_PRICE_ANIMATION" => "Y",
                        "LABEL_PROP" => array(),
                        "CORRECT_RATIO" => "Y",
                        "COMPATIBLE_MODE" => "Y",
                        "EMPTY_BASKET_HINT_PATH" => "/",
                        "ADDITIONAL_PICT_PROP_24" => "-",
                        "BASKET_IMAGES_SCALING" => "adaptive",
                        "USE_ENHANCED_ECOMMERCE" => "Y",
                        "DATA_LAYER_NAME" => "dataLayer",
                        "BRAND_PROPERTY" => "PROPERTY_CML2_MANUFACTURER"
                    ),
                    false
                ); ?>

            </div>
        </div>
    </div>
    <div class="order-alert modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p style="text-align: left"></p>
                    <a href="javascript:void(0);" data-dismiss="modal" class="close-modal"></a>
                </div>
            </div>
        </div>
    </div>
    <script>

        // новый функционал

        $('#order_address_submit a').on('click', function (event) {
            event.preventDefault();
            BX.ajax.runAction('czebra:project.api.checkordering.checkdelivery').then((response) => {
                let data = response.data;
                if (data.status === 'error') {
                    let message = data.message + '<br>';
                    if (data.code !== 1) {
                        if (data.missing.length > 0) {
                            if (data.missing.length === 1) {
                                message += data.missing[0] + '<br>';
                            } else {
                                data.missing.forEach(element => message += (' ' + element + '<br>'))
                            }
                        }
                    }
                    $('.order-alert p').html(message);
                    $('.order-alert').modal('show');

                } else {
                    window.location.href = '/personal_section/cart/order_date/';
                }
            });
        })

        $('.table-items-pickup [name="service-radio"]').on('change', function () {
            let deliveryId = $(this).data('order_delivery_id');
            let pickupShopId = $(this).val();
            changeDelivery('PICKUP_SHOP_ID', pickupShopId);
            changeDelivery('ORDER_DELIVERY_ID', deliveryId);
            changeDeliveryType('pickup');
            // changeDeliveryType('pickup', {'order_delivery_id' : deliveryId, 'pickup_shop_id': pickupShopId });
        });

        // изменение компании
        $('.item-company [name="DELIVERY_ID"]').on('change', function () {
            let companyName = $(this).data('name');
            let val = $(this).val();
            changeDelivery('DELIVERY_COMPANY_NAME', companyName);
            changeDeliveryType('delivery');
            changeDelivery('DELIVERY_COMPANY_ID', val)
        })
        //изменение значения адреса доставки для доставки компанией
        $('#delivery_company_fields [data-delivery-company-name]').on('change', function () {
            let fieldName = $(this).data('delivery-company-name');
            let val = $(this).val();
            changeDelivery(fieldName, val);
            changeDeliveryType('delivery');
        })
        // для поля с автозаполнением
        $('.bx-ui-sls-fake').on('change', function () {
            let val = $('.bx-ui-sls-fake').val();
            changeDelivery('CITY', val);
        })
        // поля доставки по москве
        $('#moscow_delivery_form [data-delivery-moscow-name]').on('change', function () {
            let fieldName = $(this).data('delivery-moscow-name');
            let val = $(this).val();
            changeDelivery(fieldName, val);
            changeDeliveryType('delivery_moscow');
        })


        function changeDelivery(key, val) {
            BX.ajax.runAction('czebra:project.api.changeorderproperty.changedelivery', {
                data: {
                    key: key,
                    val: val
                }
            });
        }


    </script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>