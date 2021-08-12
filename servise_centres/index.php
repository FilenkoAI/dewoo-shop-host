<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Сервис и поддержка");
global $USER, $cityInfo, $arrFilterCity;

$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
$cityId = $request['city_id'];

if(!$cityId) {
    if($cityInfo['NAME']) {
        $filter = ['NAME' => $cityInfo['NAME']];
    } else {
        $filter = ['NAME' => 'Москва'];
    }

    $defaultCity = \Bitrix\Iblock\Elements\ElementCitiesTable::getList([
        'select' => ['ID', 'NAME', 'COORDINATES'],
        'filter' => $filter
    ])->fetchAll();

    if(count($defaultCity) > 0) {
        $defaultCity = $defaultCity[0];
    }

    $city_service = [
        'ID' => $defaultCity['ID'],
        'COORDINATES' => $defaultCity['IBLOCK_ELEMENTS_ELEMENT_CITIES_COORDINATES_VALUE'],
    ];
} else {
    $selectedCity = \Bitrix\Iblock\Elements\ElementCitiesTable::getByPrimary($cityId, [
        'select' => ['ID', 'NAME', 'COORDINATES'],
    ])->fetch();

    $city_service = [
        'ID' => $cityId,
        'COORDINATES' => $selectedCity['IBLOCK_ELEMENTS_ELEMENT_CITIES_COORDINATES_VALUE'],
    ];
}


$cities = \Bitrix\Iblock\Elements\ElementCitiesTable::getList([
    'select' => ['ID', 'NAME'],
//    'cache' => ["ttl" => 3600],
    'order' => ['NAME' => 'ASC']
])->fetchAll();

if($cityInfo['NAME'] !== 'Другой город') {
    $arrFilterCity = [
        "PROPERTY_CITY.ID" => $city_service['ID']
    ];
} else {
    $arrFilterCity = [];
}
?>

    <div class="title">
        <div class="container">
            <h1><?=$APPLICATION->ShowTitle()?></h1>
        </div>
    </div>
    <div class="wrapp-service-support">
        <div class="container">
            <div class="service-support">
                <div class="phone-service">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/service/service_phone.php"
                        )
                    ) ?>
                </div>
                <p>Служба технической поддержки</p>
            </div>
            <h2>Центральный сервисный центр daewoo power products</h2>
            <div class="contacts-central-service">
                <div class="address-central-service">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/service/central_service_address.php"
                        )
                    ) ?>
                </div>
                <div class="phone-central-service">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/service/central_service_phone.php"
                        )
                    ) ?>
                </div>
                <div class="working-time-central-service">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/service/central_service_worktime.php"
                        )
                    ) ?>
                </div>
                <div class="site-central-service">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/service/central_service_link.php"
                        )
                    ) ?>
                </div>
                <?global $USER;?>
                <?if($USER->GetId() == '1'):?>
                <div class="photo-service">
                    <a href="#">Фото</a>
                    <div class="wrapp-slider-mobil-magazine">
                        <div class="slider-mobil-magazine">
                            <div class="slide"><img
                                        src="<?=SITE_TEMPLATE_PATH?>/front/img/address-magazine/mobil-slide.png" alt="">
                            </div>
                            <div class="slide"><img
                                        src="<?=SITE_TEMPLATE_PATH?>/front/img/address-magazine/mobil-slide.png" alt="">
                            </div>
                            <div class="slide"><img
                                        src="<?=SITE_TEMPLATE_PATH?>/front/img/address-magazine/mobil-slide.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('.photo-service a').on('click', function (e){
                        e.preventDefault();
                        $('.wrapp-slider-mobil-magazine').slideToggle()
                        $(this).toggleClass('opened')
                    })
                </script>
                    <style>
                        .photo-service a.opened:after{
                            transform: rotate(0)!important;
                        }
                    </style>
                <?endif?>
            </div>
            <div class="receiving-city city-select-service">
                <select class="select-city chosen-select">
                    <? foreach($cities as $city): ?>
                        <option value="<?=$city['ID']?>"
                                <? if($city['ID'] == $city_service['ID']): ?>selected<? endif ?>><?=$city['NAME']?></option>
                    <? endforeach; ?>
                </select>
            </div>

            <script>
                let citySelector = $('.city-select-service .select-city');
                citySelector.on('change', function () {
                    let currentUrl = new URL(window.location);
                    let city_id = this.options[this.selectedIndex].value;
                    currentUrl.searchParams.delete('city_id');
                    currentUrl.searchParams.append('city_id', city_id);
                    window.location.href = currentUrl;
                })
            </script>
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "service_centers_no_photo_new",
                array(
                    "COORDINATES" => $city_service['COORDINATES'],
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
                    "FILTER_NAME" => "arrFilterCity",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "30",
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

        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>