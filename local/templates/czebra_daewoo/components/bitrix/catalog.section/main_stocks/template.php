<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>

<div class="wrapp-stocks-main">
    <div class="container">
        <div class="title-main title-stock">Акции</div>
        <div class="wrapp-slder-stock-main">
            <?foreach($arResult['ITEMS'] as $key => $arItem):?>
                <?if($key % 2 == 0):?>
                    <div class="slide-stock-main">
                <?endif;?>
                <div class="slide-stock">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                        <div class="bg-slide-stock"
                             style="background: url('<?=$arItem["DETAIL_PICTURE"]["SRC"]?>') no-repeat 320px 100px; "></div>
                    </a>

                        <div class="name-stock-main">
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                            <?=$arItem['NAME']?>
                            </a>
                        </div>

                    <?if($arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'):?>
                        <div class="old-price-stock-main">
                            <span class="old-price"><?=$arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></span>
                            <span class="percent"><?=$arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE']?></span>
                        </div>
                        <div class="price"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                    <?else:?>
                        <div class="price"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                    <?endif;?>
                    <div class="btn-stock-main">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" data-czaction="addtocart" data-czbuy="<?=$arItem["ID"]?>">
                            <span class="btn-trans">Купить</span>
                            <span class="btn-anim">Купить</span>
                        </a>
                    </div>
                </div>
                <?if($key % 2 == 1 || count($arResult['ITEMS']) == $key + 1):?>
                    </div>
                <?endif;?>
            <?endforeach;?>
        </div>
    </div>
</div>
