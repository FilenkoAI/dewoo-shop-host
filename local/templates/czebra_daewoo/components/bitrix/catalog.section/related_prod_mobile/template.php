<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>
<? if ( count($arResult['ITEMS']) > 0 ):?>
<div class="wrapp-related-product">
    <div class="title-card2">Похожие продукты</div>
    <div class="caption-slider-related">
        <span class="cheap">Дешевле</span>
        <span class="expensive">Дороже</span>
    </div>
    <div class="slider-items">
        <?foreach ($arResult['ITEMS'] as $arItem):?>

        <div class="slide">
            <div class="wrapp-item">
                <div class="item">
                    <?if($arItem['CZ_PROPS']['IS_NEW'] == 'Y'):?>
                        <div class="sticker">
                            <div class="sticker-novelty">
                                <span>Новинка</span>
                            </div>
                        </div>
                    <?endif;?>
                    <div class="icon-item">
                        <a href="#" class="add-to-compare <?=$arItem['CZ_PROPS']['COMPARED'] === 'Y' ? 'selected' : ''?>" onclick="addToCompare(event, <?=$arItem['ID']?>, '<?=$arItem["DETAIL_PAGE_URL"]?>')" data-id="<?=$arItem['ID']?>"></a>
                        <a href="#" class="add-to-favorites <?=$arItem['CZ_PROPS']['IN_FAV'] === 'Y' ? 'selected' : ''?>" onclick="addToFavs(event, <?=$arItem['ID']?>)"  data-id="<?=$arItem['ID']?>"></a>
                    </div>
                    <div class="img-item"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=$arItem['CZ_PROPS']['PREVIEW']?>" alt="<?=$arItem['NAME']?>"></a></div>
                    <div class="name-item">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                    </div>
                    <?/* ДО ПОЯВЛЕНИЯ КАРТИОК
                    <div class="list-features-item">
                        <div class="features-item">
                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/icon-item1.svg" alt="">
                            <span>Электро-запуск</span>
                        </div>
                        <div class="features-item">
                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/icon-item2.svg" alt="">
                            <span>5,0 л.с</span>
                        </div>
                        <div class="features-item">
                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/icon-item3.svg" alt="">
                            <span>54 см</span>
                        </div>
                        <div class="features-item">
                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/icon-item4.svg" alt="">
                            <span>70 л</span>
                        </div>
                    </div>
                    */?>
                    <div class="wrapp-rate-and-bonus-item">
                        <div class="rate-item">
                            <div class="bg-rate"><span><span class="bg-color" style="width: <?=$arItem['CZ_PROPS']['AVERAGE_RATING']?>%"></span></span></div>
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>?reviews=Y" class="count-rate"><?=$arItem['CZ_PROPS']['REVIEWS_COUNT']?></a>
                        </div>
                        <div class="new-sol-article bonus-item">
                            <?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE']?><a href="#" data-title="Артикул"></a>
                        </div>
                    </div>
                    <div class="wrapp-price-item">
                        <div class="price-item"><?=$arItem['CZ_PRICE']?></div>
                    </div>
                    <? if($arItem['CATALOG_AVAILABLE'] != 'N'): ?>
                    <div class="btn-item">
                        <span class="add-to-cart-item">
                            <a href="#" data-czaction="addtocart" data-czbuy="<?=$arItem["ID"]?>">
                                <span class="btn-trans">Купить</span>
                                <span class="btn-anim">Купить</span>
                            </a>
                        </span>
                        <span class="quick-order">
                            <a href="#" onclick="quickOrder(event, '<?=$arItem["ID"]?>')">
                                <span class="btn-trans">Быстрый заказ</span>
                                <span class="btn-anim">Быстрый заказ</span>
                            </a>
                        </span>
                    </div>
                    <?else:?>
                        <div class="btn-item">
                            <span class="add-to-cart-item" style="opacity: 0.5">
                                <a href="javascript:void(0)">
                                    <span class="btn-trans">Купить</span>
                                    <span class="btn-anim">Купить</span>
                                </a>
                            </span>
                                <span class="quick-order">
                                <a href="javascript:void(0)" style="opacity: 0.5">
                                    <span class="btn-trans">Быстрый заказ</span>
                                    <span class="btn-anim">Быстрый заказ</span>
                                </a>
                            </span>
                        </div>
                    <? endif ?>
                </div>
            </div>
        </div>
        <?endforeach;?>
    </div>
</div>
<? endif; ?>