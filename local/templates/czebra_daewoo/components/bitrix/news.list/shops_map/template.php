<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<?
$api_key = \Czebra\Project\YandexMaps::getApiKey();

global $cityInfo;
?>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<?=$api_key?>" type="text/javascript"></script>
<div class="wrapp-service-support wrapp-addresses-magazine">
    <div class="container">
        <div id="map" class="custom-map"></div>
        <?
        //старая верстка( с фото и тлефонами ) доступна при добавлении класса list-service2
        ?>
        <div class="list-service list-service3">
            <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
                <div class="item-service to-hint<?=$key?>" >
                    <div class="logo-service"><img src="<?=$arItem['LIST_LOGO']?>" alt=""></div>
                    <div class="address-service">
                        <?=$arItem['PROPERTIES']['DESCRIPTION']['~VALUE']['TEXT']?>
                    </div>
                    <div class="phone-service"><a href="tel:<?=$arItem['PROPERTIES']['PHONE']['TEL']?>"><?=$arItem['PROPERTIES']['PHONE']['VALUE']?></a></div>
                    <div class="working-time-service"><?=$arItem['PROPERTIES']['WORKTIME']['~VALUE']['TEXT']?></div>
                    <?/*
                    <div class="photo-service">
                        <? if ( count($arItem['SHOP_SLIDER']) == 0 ): ?>
                            <a class="open-shop-slider" href="#">Фото</a>
                        <? else: ?>
                            <a class="open-shop-slider<?=$key?>" href="#">Фото</a>
                        <? endif ?>
                        <div class="wrapp-slider-mobil-magazine">
                            <div class="slider-mobil-magazine">
                                <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/address-magazine/mobil-slide.png" alt=""></div>
                                <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/address-magazine/mobil-slide.png" alt=""></div>
                                <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/frontimg/address-magazine/mobil-slide.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                    */?>
                </div>
                <?/*
                <? if ( count($arItem['SHOP_SLIDER']) != 0 ): ?>
                <div class="photo-magazine-modal modal fade shop-slider<?=$key?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="wrapp-slider-magazine">
                                    <div class="logo-magazine"><img src="<?=$arItem['LIST_LOGO']?>" alt=""></div>
                                    <div class="address-magazine"><?=$arItem['PROPERTIES']['DESCRIPTION']['~VALUE']['TEXT']?></div>
                                    <div class="slider-magazine">
                                        <?foreach($arItem['SHOP_SLIDER'] as $slide):?>
                                        <div class="slide">
                                            <img src="<?=$slide['BIG']?>" alt="">
                                        </div>
                                        <?endforeach;?>
                                    </div>
                                </div>
                                <div class="top-dots-magazine-nav"></div>
                                <div class="slider-magazine-nav">
                                    <?foreach($arItem['SHOP_SLIDER'] as $slide):?>
                                        <div class="slide">
                                            <img src="<?=$slide['SMALL']?>" alt="">
                                        </div>
                                    <?endforeach;?>
                                </div>
                                <a href="#" class="close-modal"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <? endif ?>
                */?>
            <? endforeach; ?>
        </div>
    </div>
</div>

<input type="hidden" id="coordinates" value="<?=$cityInfo['COORDINATES']?>">
<script>
    let mapValues = <?=$arResult['MAP']?>;
    let centerCoords = $('#coordinates').val();
    centerCoords = centerCoords.split(',');
    function openSlider(event, id){
        event.preventDefault();
        $('.shop-slider' + id).modal('show');
    }
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: centerCoords,
                zoom: 9,
                controls: ['zoomControl', 'fullscreenControl']
            }, {
                searchControlProvider: 'yandex#search'
            });

        let BalloonContentLayout = ymaps.templateLayoutFactory.createClass(
            `
            <div class="baloon">
                <div class="logo-baloon">
                    <img src="{{properties.logo}}" alt="">
                </div>
                <div class="address-baloon">
                    $[properties.address]
                </div>
                <div class="phone-baloon"><a href="tel:$[properties.phone]">$[properties.phone]</a></div>
                <div class="working-time-baloon">
                   $[properties.worktime]
                </div>
                <?/*
                <div class="photo-magazine-baloon">
                    <a href="javascript::void(0)" class="open-shop-slider-baloon" onclick="openSlider(event, $[properties.id])">Фото</a>
                </div>
                */?>
            </div>
            `,
        );
        mapValues.forEach(function (element, index){
            let myPlacemark = new ymaps.Placemark([element['LOCATION'][0], element['LOCATION'][1]], {
                logo: element['HINT_LOGO'],
                address: element['ADDRESS'],
                worktime: element['WORKTIME'],
                phone: element['PHONE'],
                id: element['ID']
            }, {
                balloonContentLayout: BalloonContentLayout,
                iconLayout: 'default#image',
                iconImageHref: element['BALOON_LOGO'],
                iconImageSize: [78, 85],
                iconImageOffset: [-30, -81]
            });

            $('.to-hint' + index).on('click',  (event) => {
                // event.preventDefault();
                myPlacemark.balloon.open();
            })
            $('.open-shop-slider' + index).on('click',  (event) => {
                event.preventDefault();
                $('.shop-slider' + index).modal('show');
            })
            myMap.geoObjects.add(myPlacemark);
        })
    });
</script>
