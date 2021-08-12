<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>
<? if ( count($arResult['ITEMS']) > 0 ):?>
<div class="wrapp-recommendation-card">
    <div class="title-card2">Рекомендуем с этой моделью</div>
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
                    <div class="list-features-item">
                        <? foreach($arItem['ICONS'] as $icon): ?>
                            <?/*в верстке первая иконка скрывалась в мобильной версии добавлением класса hidden-mobil*/?>
                            <div class="features-item">
                                <img src="<?=$icon['IMG']?>" alt="">
                                <span><?=$icon['DISPLAY_DESC']?></span>
                            </div>
                        <? endforeach; ?>
                    </div>
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
                        <span class="quick-order" onclick="quickOrder(event, '<?=$arItem["ID"]?>')">
                            <a href="#">
                                <span class="btn-trans">Быстрый заказ</span>
                                <span class="btn-anim">Быстрый заказ</span>
                            </a>
                        </span>
                    </div>
                    <? else: ?>
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
<?endif;?>