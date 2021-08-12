<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<?
global $cityInfo;
?>
<div class="wrapp-service-support wrapp-addresses-magazine">
    <div class="container" style="width: auto">
        <div id="mapService" class="custom-map" style="width: 939px; height: 395px"></div>
        <div class="list-service list-service-mini">
            <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
                <div class="item-service to-hint<?=$key?>" >
                    <div class="logo-service"><img src="<?=$arItem['LIST_LOGO']?>" alt=""></div>
                    <div class="address-service">
                        <?=$arItem['PROPERTIES']['DESCRIPTION']['~VALUE']['TEXT']?>
                    </div>
                    <div class="phone-service"><a href="tel:<?=$arItem['PROPERTIES']['PHONE']['TEL']?>"><?=$arItem['PROPERTIES']['PHONE']['VALUE']?></a></div>
                    <div class="working-time-service"><?=$arItem['PROPERTIES']['WORKTIME']['~VALUE']['TEXT']?></div>
                </div>

            <? endforeach; ?>
        </div>
    </div>
</div>

<input type="hidden" id="coordinates" value="<?=$cityInfo['COORDINATES']?>">
<script>
    let mapValuesCenters = <?=$arResult['MAP']?>;
    let centerCoordsCenters = $('#coordinates').val();
    centerCoordsCenters = centerCoordsCenters.split(',');
    function openSlider(event, id){
        event.preventDefault();
        $('.shop-slider' + id).modal('show');
    }
    ymaps.ready(function () {
        var myMapCenters = new ymaps.Map('mapService', {
            center: centerCoordsCenters,
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
            </div>
            `,
        );
        mapValuesCenters.forEach(function (element, index){
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
            myMapCenters.geoObjects.add(myPlacemark);
        })
    });
</script>
