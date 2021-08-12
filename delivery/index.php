<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и самовывоз");
?>
<?
$api_key = \Czebra\Project\YandexMaps::getApiKey();
$json = file_get_contents('moscow.json');
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();

global $cityInfo;
global $arrFilterCity;
$arrFilterCity = [
    "PROPERTY_CITY.NAME" => $cityInfo['NAME']
];
?>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<?=$api_key?>" type="text/javascript"></script>
    <div class="title title-delivery-pickup">
        <div class="container">
            <h1><?=$APPLICATION->ShowTitle()?></h1>
        </div>
    </div>
    <div class="wrapp-delivery-pickup">
        <div class="container">
            <p class="prev-text">
                Мы осуществляем доставку техники не только по Москве и МО, но и по всей России. Также предоставляем
                возможность осуществить самовывоз из нашего фирменного магазина.
            </p>
            <div class="terms-delivery">
                <div class="wrapp-tabs-delivery-pickup">
                    <ul class="tabs-delivery-pickup">
                        <li class="<?if($request['pickup'] != 'Y'):?>active<?endif;?>"><a href="#delivery-msk" class="icon-tabs1">По Москве и Московской области</a>
                        </li>
                        <li><a href="#delivery-regions" class="icon-tabs2">В регионы России</a></li>
                        <li class="<?if($request['pickup'] == 'Y'):?>active<?endif;?>"><a href="#delivery-pickup" class="icon-tabs3">Самовывоз со скидкой 5%</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade <?if($request['pickup'] != 'Y'):?>active in<?endif;?> " id="delivery-msk">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/banner.php"
                                )
                            ); ?>
                            <div class="title-tabs">
                                Порядок и условия доставки по москве и московской области
                            </div>
                            <? /*
                        <div class="price-delivery">
                            Стоимость доставки: <span class="icon-is-free">Бесплатно</span>
                        </div>
                        */ ?>
                            <div class="info-tarif-delivery">
                                <div class="wrapp-table-info-tarif">
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/delivery_moscow_prices.php"
                                        )
                                    ); ?>
                                </div>
                            </div>
                            <div class="wrapp-features-list">
                                <div class="detailed-conditions-mobil">
                                    Подробные условия
                                </div>
                                <div class="list-block-features" style="display: flex;">
                                    <div class="block-features">
                                        <div class="item-features">
                                            <div class="img-features">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/phone.svg"
                                                     alt="">
                                                <div class="count-features">
                                                    1
                                                </div>
                                            </div>
                                            <div class="text-features">
                                                Вы оформляете заказ в режиме онлайн или по номеру, указанному на сайте.
                                            </div>
                                        </div>
                                        <div class="item-features">
                                            <div class="img-features">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/operator.svg"
                                                     alt="">
                                                <div class="count-features">
                                                    2
                                                </div>
                                            </div>
                                            <div class="text-features">
                                                Сотрудник нашего интернет-магазина связывается с вами для уточнения
                                                деталей и откладывает технику к вашему приезду.
                                            </div>
                                        </div>
                                        <div class="item-features">
                                            <div class="img-features">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/box.svg"
                                                     alt="">
                                                <div class="count-features">
                                                    3
                                                </div>
                                            </div>
                                            <div class="text-features">
                                                Менеджер осуществит предварительную сборку заказа и его проверку.
                                            </div>
                                        </div>
                                        <div class="item-features">
                                            <div class="img-features">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/clipboard.svg"
                                                     alt="">
                                                <div class="count-features">
                                                    4
                                                </div>
                                            </div>
                                            <div class="text-features">
                                                Выполним предпродажную подготовку оборудования (услуга бесплатная и
                                                осуществляется на ваше усмотрение).
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-features">
                                        <div class="item-features">
                                            <div class="img-features">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/document.svg"
                                                     alt="">
                                                <div class="count-features">
                                                    5
                                                </div>
                                            </div>
                                            <div class="text-features">
                                                Вместе с товаром вы получите все необходимые документы и скидку 5% за
                                                самовывоз.
                                            </div>
                                        </div>
                                        <div class="item-features">
                                            <div class="img-features">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/wallet.svg"
                                                     alt="">
                                                <div class="count-features">
                                                    6
                                                </div>
                                            </div>
                                            <div class="text-features">
                                                Доступны различные способы оплаты: наличный и безналичный расчет, карты
                                                VISA, MASTERCARD.
                                            </div>
                                        </div>
                                        <div class="item-features">
                                            <div class="img-features">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/like.svg"
                                                     alt="">
                                                <div class="count-features">
                                                    7
                                                </div>
                                            </div>
                                            <div class="text-features">
                                                На ваших глазах менеджер магазина осуществляет проверку оборудования.
                                            </div>
                                        </div>
                                        <div class="item-features">
                                            <div class="img-features">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/discount.svg"
                                                     alt="">
                                                <div class="count-features">
                                                    8
                                                </div>
                                            </div>
                                            <div class="text-features small-text-features">
                                                Вы можете смело забирать товар со скидкой 5% и быть уверенными в его
                                                полной комплектации и эффективной работоспособности. Внимание! Скидка 5%
                                                за самовывоз предоставляется только при оплате наличными и регистрации в
                                                нашей бонусной программе.
                                            </div>
                                        </div>
                                    </div>
                                    <? /*
                                <div class="block-features">
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/clock.svg"
                                                 alt="">
                                            <div class="count-features">1</div>
                                        </div>
                                        <div class="text-features">Менеджер нашего интернет-магазина уточнит временной
                                            интервал доставки, осуществит сбор и проверку заказа;
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/settings.svg"
                                                 alt="">
                                            <div class="count-features">2</div>
                                        </div>
                                        <div class="text-features">При необходимости проведем предпродажную подготовку
                                            техники (услуга осуществляется бесплатно);
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/list.svg"
                                                 alt="">
                                            <div class="count-features">3</div>
                                        </div>
                                        <div class="text-features">Подготовим пакет необходимой документации;</div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/delivery.svg"
                                                 alt="">
                                            <div class="count-features">4</div>
                                        </div>
                                        <div class="text-features">Осуществим доставку до подъезда, участка, дома;</div>
                                    </div>
                                </div>
                                <div class="block-features">
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/timer.svg"
                                                 alt="">
                                            <div class="count-features">5</div>
                                        </div>
                                        <div class="text-features">За 60 минут до приезда вам поступит звонок от нашего
                                            курьера;
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/box2.svg"
                                                 alt="">
                                            <div class="count-features">6</div>
                                        </div>
                                        <div class="text-features">При передаче заказа в руки владельца осуществляется
                                            проверка техники: запуск и демонстрация работоспособности.
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/worker.svg"
                                                 alt="">
                                            <div class="count-features">7</div>
                                        </div>
                                        <div class="text-features">Разгрузка товара весом до 30 кг осуществляется
                                            водителем-экспедитором самостоятельно, свыше 30 кг - совместно с
                                            представителем покупателя.
                                        </div>
                                    </div>
                                </div>
                                */ ?>
                                </div>
                            </div>
                            <b>Условия доставки:</b> <br>
                            <br>
                            Доставка осуществляется ежедневно&nbsp;с 10:00-20:00 ч. <br>
                            <br>
                            Мы можем Вам предложить два временных интервала: <br>
                            <br>
                            <u>1 половина дня</u>: с 10:00 до 15:00 ч. <br>
                            <u>2 половина дня</u>: с 15:00 до 20:00 ч. <br>
                            <br>
                            Более точное время, согласовывается с менеджером при оформлении заказа. <br>
                            Мы постараемся учесть ваши пожелания исходя из загруженности службы доставки и места
                            назначения.<br>
                            <br>
                            Доставки осуществляются до подъезда, участка, дома:<br>
                            <br>
                            - Разгрузка товара весом до 30 кг осуществляется водителем-экспедитором; <br>
                            - Разгрузка товара весом от 30 кг осуществляется представителем закупки и
                            водителем-экспедитором. <br>
                            <br>
                        </div>
                        <div class="tab-pane fade" id="delivery-regions">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/banner1.php"
                                )
                            ); ?>
                            <div class="title-tabs">
                                Мы осуществляем доставку в регионы России следующими транспортными компаниями:
                            </div>
                            <form action="">
                                <div class="select-company">
                                    <div class="block-select-company">
                                        <div class="select-company-delivery single-page">
                                            <? $APPLICATION->IncludeComponent(
                                                "bitrix:main.include",
                                                "",
                                                array(
                                                    "AREA_FILE_SHOW" => "file",
                                                    "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/tc.php"
                                                )
                                            ); ?>
                                        </div>
                                        <div class="warning-message-company">
                                            <p>
                                                Стоимость доставки вы можете рассчитать самостоятельно с помощью
                                                калькулятора при оформлении заказа.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="delivery-text">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_TEMPLATE_PATH . "/include/delivery/conditions.php"
                                    )
                                ); ?>
                            </div>
                            <? /*before we can usher in the new the old must be put to rest
                        <div class="wrapp-features-list">
                            <div class="detailed-conditions-mobil">Подробные условия</div>
                            <div class="list-block-features" style="display: flex">
                                <div class="block-features">
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/telephone.svg"
                                                 alt="">
                                            <div class="count-features">1</div>
                                        </div>
                                        <div class="text-features">Заказать технику можно в режиме онлайн или по
                                            телефону, указанному на сайте. Важно указать населенный пункт, в который
                                            нужно привезти заказ.
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/support.svg"
                                                 alt="">
                                            <div class="count-features">2</div>
                                        </div>
                                        <div class="text-features">Наш сотрудник свяжется с вами для уточнения деталей,
                                            предоставит информацию о размере и весе купленного оборудования.
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/wholesale.svg"
                                                 alt="">
                                            <div class="count-features">3</div>
                                        </div>
                                        <div class="text-features">Вам нужно будет лично связаться с необходимой
                                            логистической компанией и узнать о наличии ее представительства в вашем
                                            городе. Если его нет, нужно будет уточнить, в каком населенном пункте
                                            находится терминал ТК – именно туда мы доставим ваш заказ! (Ниже
                                            представлены транспортные фирмы, с которыми мы работаем, и ссылки на их
                                            сайты) **
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/document.svg"
                                                 alt="">
                                            <div class="count-features">4</div>
                                        </div>
                                        <div class="text-features">
                                            Наш сотрудник вышлет вам счет за покупку техники на основе следующей
                                            информации:
                                            <ul>
                                                <li>а) для физ. лиц – ФИО, адрес прописки или регистрации с индексом;
                                                </li>
                                                <li>б) для юридического лица – полные реквизиты вашей организации.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-features">
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/delivery.svg"
                                                 alt="">
                                            <div class="count-features">5</div>
                                        </div>
                                        <div class="text-features">Счет необходимо оплатить через банк, как только
                                            поступят деньги (около 1-3 дней после расчета). Мы выполним бесплатную
                                            транспортировку груза до пункта ТК в Москве (за два рабочих дня) и оплатим
                                            перевозку до терминала логистической компании в вашем городе или ближайшем
                                            населенном пункте.
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/track.svg"
                                                 alt="">
                                            <div class="count-features">6</div>
                                        </div>
                                        <div class="text-features">Как только будет произведена отгрузка, наш сотрудник
                                            сообщит вам номер отгрузочной накладной, чтобы вы могли самостоятельно
                                            контролировать движение груза.
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/checked.svg"
                                                 alt="">
                                            <div class="count-features">7</div>
                                        </div>
                                        <div class="text-features">О прибытии груза в ваш город вам сообщит сотрудник
                                            ТК.
                                        </div>
                                    </div>
                                    <div class="item-features">
                                        <div class="img-features">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-pickup-page/delivery-man.svg"
                                                 alt="">
                                            <div class="count-features">8</div>
                                        </div>
                                        <div class="text-features">Чтобы получить товар, необходимо предоставить:
                                            паспорт или доверенность, также можно воспользоваться услугой «Адресная
                                            доставка».
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        */ ?>
                        </div>
                        <div class="tab-pane fade <?if($request['pickup'] == 'Y'):?>active in<?endif;?> " id="delivery-pickup">
                            <div class="title-tabs open-city-modal">
                                Условия и порядок самовывоза в г. <?=$cityInfo['NAME']?>
                            </div>
                            <div class="wrapp-service-support">
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
                                        "SET_TITLE" => "N",
                                        "SHOW_404" => "N",
                                        "SORT_BY1" => "ACTIVE_FROM",
                                        "SORT_BY2" => "SORT",
                                        "SORT_ORDER1" => "DESC",
                                        "SORT_ORDER2" => "ASC",
                                        "STRICT_SECTION_CHECK" => "N"
                                    )
                                ); ?>
                                <div class="wrapp-features-list">
                                    <div class="detailed-conditions-mobil">
                                        Подробные условия
                                    </div>
                                    <div class="list-block-features" style="display: flex;">
                                        <div class="block-features">
                                            <div class="item-features">
                                                <div class="img-features">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/phone.svg"
                                                         alt="">
                                                    <div class="count-features">
                                                        1
                                                    </div>
                                                </div>
                                                <div class="text-features">
                                                    Вы оформляете заказ в режиме онлайн или по номеру, указанному на
                                                    сайте.
                                                </div>
                                            </div>
                                            <div class="item-features">
                                                <div class="img-features">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/operator.svg"
                                                         alt="">
                                                    <div class="count-features">
                                                        2
                                                    </div>
                                                </div>
                                                <div class="text-features">
                                                    Сотрудник нашего интернет-магазина связывается с вами для уточнения
                                                    деталей и откладывает технику к вашему приезду.
                                                </div>
                                            </div>
                                            <div class="item-features">
                                                <div class="img-features">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/box.svg"
                                                         alt="">
                                                    <div class="count-features">
                                                        3
                                                    </div>
                                                </div>
                                                <div class="text-features">
                                                    Менеджер осуществит предварительную сборку заказа и его проверку.
                                                </div>
                                            </div>
                                            <div class="item-features">
                                                <div class="img-features">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/clipboard.svg"
                                                         alt="">
                                                    <div class="count-features">
                                                        4
                                                    </div>
                                                </div>
                                                <div class="text-features">
                                                    Выполним предпродажную подготовку оборудования (услуга бесплатная и
                                                    осуществляется на ваше усмотрение).
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-features">
                                            <div class="item-features">
                                                <div class="img-features">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/document.svg"
                                                         alt="">
                                                    <div class="count-features">
                                                        5
                                                    </div>
                                                </div>
                                                <div class="text-features">
                                                    Вместе с товаром вы получите все необходимые документы и скидку 5%
                                                    за самовывоз.
                                                </div>
                                            </div>
                                            <div class="item-features">
                                                <div class="img-features">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/wallet.svg"
                                                         alt="">
                                                    <div class="count-features">
                                                        6
                                                    </div>
                                                </div>
                                                <div class="text-features">
                                                    Доступны различные способы оплаты: наличный и безналичный расчет,
                                                    карты VISA, MASTERCARD.
                                                </div>
                                            </div>
                                            <div class="item-features">
                                                <div class="img-features">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/like.svg"
                                                         alt="">
                                                    <div class="count-features">
                                                        7
                                                    </div>
                                                </div>
                                                <div class="text-features">
                                                    На ваших глазах менеджер магазина осуществляет проверку
                                                    оборудования.
                                                </div>
                                            </div>
                                            <div class="item-features">
                                                <div class="img-features">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-pickup-page/discount.svg"
                                                         alt="">
                                                    <div class="count-features">
                                                        8
                                                    </div>
                                                </div>
                                                <div class="text-features small-text-features">
                                                    Вы можете смело забирать товар со скидкой 5% и быть уверенными в его
                                                    полной комплектации и эффективной работоспособности. Внимание!
                                                    Скидка 5% за самовывоз предоставляется только при оплате наличными и
                                                    регистрации в нашей бонусной программе.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        ymaps.ready(init);

        let json = <?=$json?>;
        let coordinates = json;

        function init() {
            var myMap = new ymaps.Map("mapMoscow", {
                center: [55.73, 37.75],
                zoom: 10,
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

    </script> <br>
    <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>