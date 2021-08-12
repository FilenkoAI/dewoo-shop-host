<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<?
use \Bitrix\Main\Context;
use \Bitrix\Sale;
global $cityInfo;
global $arrFilterCity;
$arrFilterCity = [
    "PROPERTY_CITY.NAME" => $cityInfo['NAME']
];
?>

<div class="tab-pane fade" id="getting-product-tabs">
    <div class="title-getting">Как получить товар</div>
    <div class="left-column-registration-order">
        <div class="wrapp-address-delivery">
            <div class="tabs-address-delivery">
                <?
                $isRegional = Czebra\Project\Region::isRegional();
                ?>
                <ul class="menu-tabs <? if($isRegional === 'Y'): ?>regional<? endif ?>">

                    <? if($isRegional === 'N'): ?>
                        <li class="icon-delivery1 active"><a href="#delivery-courier">Доставка курьером</a></li>
                    <? endif; ?>
                    <li class="<? if($isRegional !== 'N'): ?>active<?endif?> icon-delivery2"><a href="#pickup">Самовывоз</a></li>
                    <li class="icon-delivery3"><a href="#delivery-company">Транспортной компанией</a></li>
                </ul>
                <div class="tab-content">
                    <? if($isRegional === 'N'): ?>
                        <div class="tab-pane fade delivery-courier-card active in" id="delivery-courier">
                            <div class="wrapp-delivery-courier table-and-map-delivery">
                                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/banner.php",
                                    )
                                ); ?>
                                <div class="form-address-delivery table-delivery">
                                    <div class="wrapp-table-info-tarif">
                                        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                                                "AREA_FILE_SHOW" => "file",
                                                "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/delivery_moscow_prices.php",
                                            )
                                        ); ?>
                                        <a href="#" class="close-table-tarif"></a>
                                    </div>
                                </div>
                                <?/*div class="map-delivery map-delivery2" id="mapMoscow" style="width: auto; height: auto"*/?>
                                    <?/*
                                    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/map2.jpg" alt="">
                                    */?>
                                <?/*/div*/?>
                                <?

                                $json = file_get_contents( $_SERVER['DOCUMENT_ROOT']  . '/delivery/moscow.json');
                                ?>
                                <script>
                                    ymaps.ready(init);

                                    let json = <?=$json?>;
                                    let coordinates = json;
                                    function init() {
                                        var myMap = new ymaps.Map("mapMoscow", {
                                            center: [55.73, 37.75],
                                            zoom: 8,
                                            controls: ['zoomControl', 'fullscreenControl']
                                        }, {
                                            searchControlProvider: 'yandex#search'
                                        });
                                        var myGeoObject = new ymaps.GeoObject({
                                            geometry: {
                                                type: "Polygon",
                                                coordinates: coordinates,
                                                // Задаем правило заливки внутренних контуров по алгоритму "nonZero".
                                                fillRule: "evenOdd"
                                            },
                                            // Описываем свойства геообъекта.

                                        }, {
                                            // Описываем опции геообъекта.
                                            // Цвет заливки.
                                            fillColor: '#DE6A50',
                                            // Цвет обводки.
                                            strokeColor: '#DE6A50',
                                            // Общая прозрачность (как для заливки, так и для обводки).
                                            opacity: 1,
                                            fillOpacity: 0.1,
                                            // Ширина обводки.
                                            strokeWidth: 2.5,
                                            // Стиль обводки.
                                        });

                                        // Добавляем многоугольник на карту.
                                        myMap.geoObjects.add(myGeoObject);


                                    }
                                </script>
                                <p>Мы уточним у вас удобное время доставки и наши курьеры подьедут точно в
                                    срок.</p>
                            </div>
                        </div>
                    <? endif; ?>
                    <div class="tab-pane fade <? if($isRegional !== 'N'): ?>active in<?endif;?>" id="pickup">
                        <p class="prev-text-tab-pickup">Вы можете сами забрать товар из магазина</p>
                        <div class="wrapp-service-support">
                            <div class="container">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:news.list",
                                    "pickup_map",
                                    array(
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
                                        "PROPERTY_CODE" => array("DESCRIPTION", ""),
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
                                ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="delivery-company">
                        <?/* before we can usher in the new, the old must be put to rest
                        <div class="adress-delivery-company">
                            <div class="form-delivery-company">
                                <form action="">
                                    <div class="wrapp-calculate">
                                        <a href="javascript:void(0);" id="show-modal-calculate-c6v">Рассчитать стоимость доставки</a>
                                    </div>
                                    <div class="select-company-delivery">
                                        <p class="title-delivery">Мы осуществляем доставку в регионы России следующими транспортными компаниями:</p>
                                        <div class="table-company new-table">
                                            <?
                                            $companies = \Czebra\Project\DeliveryCompanies::getDeliveryCompanies();
                                            ?>
                                            <div class="body-table delivery-list">
                                                <?foreach($companies as $company):?>
                                                    <div class="item-company">
                                                        <div class="wrapp-name-company">
                                                            <div class="img-company"><img src="<?=$company['LOGO']?>" alt=""></div>
                                                            <div class="name-company"><?=$company['NAME']?></div>
                                                        </div>
                                                    </div>
                                                <?endforeach;?>
                                            </div>
                                        </div>
                                        <div class="warning-message-company">
                                            <p>Стоимость доставки может быть изменена в случае смены
                                                расценок транспортных компаний или при заказе дополнительных
                                                услуг (страховка, паллетирование и др.). У некоторых
                                                транспортных компаний доставка оплачивается частично при
                                                получении товара. Подробности вам сообщит менеджер.</p>
                                            <p>Сроки доставки указаны на основе данных транспортных компаний
                                                и в зависимости от даты оплаты они могут сдвигаться.</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        */?>
                        <script>
                            openTableCard();
                            chosenSelect();
                        </script>
                        <div class="adress-delivery-company">
                            <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/banner1.php",
                                )
                            ); ?>
                            <!-- <p class="title-delivery">Адрес доставки</p> -->
                            <div class="form-delivery-company">
                                <form action="">
                                    <div class="wrapp-calculate-delivery-company">
                                        <div class="title-calculate">Рассчитать стоимость доставки</div>
                                        <div class="block-selected-calculated">
                                            <?$deliveryCities = \Czebra\Project\C6v::getCitiesHlblock();?>
                                            <div class="departure-city select-calculate">
                                                <p>Город отправления</p>
                                                <select id="city_from" data-placeholder="Москва" class="chosen-select">
                                                    <option>Москва</option>
                                                </select>
                                            </div>
                                            <div class="receiving-city select-calculate">
                                                <p>Город получения</p>
                                                <select id="city_to" data-placeholder="Москва" class="chosen-select">
                                                    <?foreach($deliveryCities as $city):?>
                                                        <option><?=$city['NAME']?></option>
                                                    <?endforeach;?>
                                                </select >
                                            </div>

                                            <div class="wrapp-btn-calculate">
                                                <span class="btn-calculate">
                                                    <button class="btn-site1" id="calculate_delivery">
                                                        <span class="btn-trans">Рассчитать</span>
                                                        <span class="btn-anim">Рассчитать</span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="select-company-delivery">
                                        <!-- <p class="title-delivery">Выберите компанию</p> -->
                                        <div class="table-company">
                                            <div class="head-table">
                                                <div class="name-company">Способ доставки</div>
                                                <div class="price-company">Стоимость доставки <span> <div class="hidden-message">В стоимость не включена доставкка до транспортной компании</div></span></div>
                                                <div class="time-delivery-company">Сроки доставки <span> <div class="hidden-message">В стоимость не включена доставкка до транспортной компании</div></span></div>
                                                <span class="open-table"></span>
                                            </div>
                                            <div class="body-table" id="calculation_result">

                                            </div>
                                            <script>
                                                $('#calculate_delivery').on('click', function (event){
                                                    event.preventDefault();
                                                    let cityFrom = $('#city_from').val();
                                                    let cityTo = $('#city_to').val();
                                                    let productWeight = $('#product_weight').val();
                                                    console.log(cityFrom, cityTo);
                                                    showCalculateC6vPrice2(cityFrom, cityTo, '12', '12', '12', productWeight);
                                                    // pasteCalculatedResults(showCalculateC6vPrice2(cityFrom, cityTo, '12', '12', '12', productWeight / 1000))

                                                })
                                            </script>
                                        </div>
                                        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                                                "AREA_FILE_SHOW" => "file",
                                                "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/tc.php",
                                            )
                                        ); ?>

                                        <div class="warning-message-company">
                                            <p>Стоимость доставки может быть изменена в случае смены расценок транспортных компаний или при заказе дополнительных услуг (страховка, паллетирование и др.). У некоторых транспортных компаний доставка оплачивается частично при получении товара. Подробности вам сообщит менеджер.</p>
                                            <p>Сроки доставки указаны на основе данных транспортных компаний и в зависимости от даты оплаты они могут сдвигаться.</p>
                                        </div>
                                        <div class="info-message2">
                                            <p>Если вы сотрудничаете с транспортной компанией, не представленной в этом списке, то напишите нам и мы довезем Ваш груз до любой ТК в пределах Москвы и ближайшего Подмосковья.</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
