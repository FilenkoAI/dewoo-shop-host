<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
global $cityInfo;
?>

<?/*p class="prev-text-tab-pickup">Вы можете сами забрать товар из магазина</p*/?>
<p class="prev-text-tab-pickup-mobil">МАГАЗИНЫ DAEWOO г. МОСКВА</p>
<div class="table-items-pickup">
    <div class="body-table-pickup">
        <div class="list-service list-service3">
            <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
                <div class="item-service to-hint<?=$key?>">
                    <input type="radio" id="service<?=$key?>" autocomplete="off"
                           data-order_delivery_id="<?=$arParams['PICKUP_ID']?>" name="service-radio"
                           value="<?=$arItem['ID']?>"
                           <? if($arParams['SELECTED_PICKUP'] == $arItem['ID']): ?>checked<? endif; ?>>
                    <label for="service<?=$key?>">
                        <div class="logo-service"><img src="<?=$arItem['LIST_LOGO']?>" alt=""></div>
                        <div class="address-service">
                            <?=$arItem['PROPERTIES']['DESCRIPTION']['~VALUE']['TEXT']?>
                        </div>
                        <div class="phone-service"><?=$arItem['PROPERTIES']['PHONE']['VALUE']?></div>
                        <div class="working-time-service"><?=$arItem['PROPERTIES']['WORKTIME']['~VALUE']['TEXT']?></div>
                    </label>
                </div>
            <? endforeach; ?>
        </div>
        <div class="list-service list-service-mobil">
            <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
            <? endforeach; ?>
        </div>
    </div>
</div>
<div id="mapPickup" class="map-pickup custom-map map" style=""></div>

<input type="hidden" id="coordinates" value="<?=$cityInfo['COORDINATES']?>">
<script>
    let mapValues = <?=$arResult['MAP']?>;
    let centerCoords = $('#coordinates').val();
    centerCoords = centerCoords.split(',');

    function openSlider(event, id) {
        event.preventDefault();
        $('.shop-slider' + id).modal('show');
    }

    ymaps.ready(function () {
        var myMap = new ymaps.Map('mapPickup', {
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
            </div>
            `
        );
        mapValues.forEach(function (element, index) {
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

            $('.open-shop-slider' + index).on('click', (event) => {
                event.preventDefault();
                $('.shop-slider' + index).modal('show');
            })
            $('.to-hint' + index).on('click',  (event) => {
                // event.preventDefault();
                myPlacemark.balloon.open();
            })

            myMap.geoObjects.add(myPlacemark);
        })
    });
</script>
