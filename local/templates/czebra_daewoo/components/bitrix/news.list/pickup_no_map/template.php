<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<div class="wrapp-service-support">
    <div class="container">
        <div class="list-service list-service2">
            <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
                <div class="item-service to-hint<?=$key?>" >
                    <div class="logo-service"><img src="<?=$arItem['LIST_LOGO']?>" alt=""></div>
                    <div class="address-service">
                        <?=$arItem['PROPERTIES']['DESCRIPTION']['~VALUE']['TEXT']?>
                    </div>
                    <div class="phone-service"><?=$arItem['PROPERTIES']['PHONE']['VALUE']?></div>
                    <div class="working-time-service"><?=$arItem['PROPERTIES']['WORKTIME']['~VALUE']['TEXT']?></div>
                    <div class="photo-service">
                        <? if ( count($arItem['SHOP_SLIDER']) == 0 ): ?>
                            <a class="" href="javascript::void(0)">Фото</a>
                        <? else: ?>
                            <a class="open-shop-slider<?=$key?> open-shop-slider" href="#">Фото</a>
                        <? endif ?>
                        <div class="wrapp-slider-mobil-magazine">
                            <div class="slider-mobil-magazine">
                                <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/address-magazine/mobil-slide.png" alt=""></div>
                                <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/address-magazine/mobil-slide.png" alt=""></div>
                                <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/frontimg/address-magazine/mobil-slide.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
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
            <? endforeach ?>
        </div>
    </div>
</div>
<script>
    // $('.open-shop-slider' + index).on('click',  (event) => {
    //     event.preventDefault();
    //     $('.shop-slider' + index).modal('show');
    // })
    $('.open-shop-slider').each(function (index, element){
        console.log(index)
        $(this).on('click', function (event){
            event.preventDefault();
            $('.shop-slider' + index).modal('show');
        })
    })
</script>
