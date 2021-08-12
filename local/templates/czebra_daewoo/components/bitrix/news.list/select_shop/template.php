<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<div class="wrapp-service-support">
        <div class="list-service list-service2 list-shops">
            <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
                <div class="item-service <?=$arItem['ID'] == $arResult['SELECTED_SHOP']['ID'] ? 'active' : ''?>" data-id="<?=$arItem['ID']?>">
                    <div class="logo-service" style="width: 150px"><?=$arItem['NAME']?></div>
                    <div class="address-service">
                        <?=$arItem['PROPERTIES']['DESCRIPTION']['~VALUE']['TEXT']?>
                    </div>
                    <div class="phone-service"><?=$arItem['PROPERTIES']['PHONE']['VALUE']?></div>
                </div>
             <?endforeach;?>
        </div>
</div>
<script>

    $('.open-shop-slider').each(function (index, element){
        $(this).on('click', function (event){
            event.preventDefault();
            $('.shop-slider' + index).modal('show');
        })
    })
</script>
