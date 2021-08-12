<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>
<div class="wrapp-novelty-main">
    <div class="container">
        <div class="title-main">Новинки</div>
        <div class="slider-novelty-main">
            <?foreach ($arResult['ITEMS'] as $arItem):?>
            <div class="wrapp-slide-novelty">
                <div class="slide-novelty-main">
                    <div class="sticker">
                        <div class="sticker-novelty">
                            <span>Новинка</span>
                        </div>
                    </div>
                    <div class="decor-item"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/decor-novelty-main.png" alt=""></div>
                    <div class="img-item-novelty"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>"></a></div>
                    <div class="name-item-novelty"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
                    <div class="icon-item-novelty">
                        <a href="#" class="add-to-compare <?=$arItem['CZ_PROPS']['COMPARED'] === 'Y' ? 'selected' : ''?>" onclick="addToCompare(event, <?=$arItem['ID']?>, '<?=$arItem["DETAIL_PAGE_URL"]?>')" data-id="<?=$arItem['ID']?>"></a>
                        <a href="#" class="add-to-favorites <?=$arItem['CZ_PROPS']['IN_FAV'] === 'Y' ? 'selected' : ''?>" onclick="addToFavs(event, <?=$arItem['ID']?>)"  data-id="<?=$arItem['ID']?>"></a>
                    </div>
                    <?if($arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'):?>
                        <div class="old-price-item"><?=$arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></div>
                        <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                    <?else:?>
                        <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                    <?endif;?>
                    <div class="add-to-cart">
                        <a href="#" data-czaction="addtocart" data-czbuy="<?=$arItem["ID"]?>">
                            <span class="btn-trans">Купить</span>
                            <span class="btn-anim">Купить</span>
                        </a>
                    </div>
                </div>
            </div>
            <?endforeach;?>
        </div>
    </div>
</div>
