<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<div class="right-card-mobil">
    <div class="top-block <? if($arResult['CATALOG_AVAILABLE'] == 'N'): ?>not-available<? endif ?>">
        <div class="rate">
            <a href="javascript::void(0)" onclick="openReviews()"
               class="count-reviews"><?=$arResult['CZ_PROPS']['REVIEWS_COUNT']?></a>

            <div class="rate">
                <input class="input-rating" name="input-name" type="number" style="display: none"
                       value="<?=$arResult['CZ_PROPS']['RATING']['AVERAGE_RATING'] / 20?>" disabled="true">
            </div>
        </div>
        <? if($arResult['CATALOG_AVAILABLE'] != 'N'): ?>
            <div class="avialable">В наличии</div>
        <? else: ?>
            <div class="avialable not-avialable">Нет в наличии</div>
        <? endif; ?>
        <? if($arResult['CATALOG_AVAILABLE'] != 'N'): ?>
            <div class="avialable-magazine"><a href="javascript:void(0)"
                                               onclick="$('#btn_form_FORM_AVAILABILITY').click()">Наличие в
                    магазинах</a></div>
        <? endif ?>

    </div>

    <div class="block-price">
        <? if($arResult['CZ_PROPS']['PRICES']['PRICE']['VALUE'] == 0): ?>
            <div class="price soon-in-sell">Скоро в продаже</div>
        <? else: ?>
            <? if($arResult['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'): ?>
                <div class="old-price">
                    <div class="percent">-<?=$arResult['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE']?></div>
                    <div class="value-old-price"><?=$arResult['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></div>
                </div>
                <div class="price"><?=$arResult['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
            <? else: ?>
                <div class="price"><?=$arResult['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
            <? endif; ?>
        <? endif; ?>
    </div>
    <div class="bottom-block <? if($arResult['CATALOG_AVAILABLE'] == 'N'): ?>not-available<? endif ?>">
        <? if($arResult['CATALOG_AVAILABLE'] != 'N'): ?>
            <div class="delivery">
                <div class="icon-delivery"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/card-mobil/delivery.svg" alt="">
                </div>
                <span>Доставка</span>
                <p><?=$arResult['CZ_PROPS']['DELIVERY']?></p>
            </div>
            <div class="pickup">
                <div class="icon-pickup"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/card-mobil/pickup.svg" alt="">
                </div>
                <span>Самовывоз</span>
                <p><?=$arResult['CZ_PROPS']['PICKUP']?></p>
            </div>
        <? endif; ?>
    </div>
    <? if($arResult['CATALOG_AVAILABLE'] != 'N' && ($arResult['CZ_PROPS']['PRICES']['PRICE']['VALUE'] > 0)): ?>
        <div class="btn-block">
            <a href="#" class="add-to-cart btn-site1" data-czaction="addtocart" data-czbuy="<?=$arResult["ID"]?>">
                <span class="btn-trans">Купить</span>
                <span class="btn-anim">Купить</span>
            </a>
            <a href="#" class="quick-order btn-site1" onclick="quickOrder(event, '<?=$arResult["ID"]?>')">
                <span class="btn-trans">Быстрый заказ</span>
                <span class="btn-anim">Быстрый заказ</span>
            </a>
        </div>
    <? else: ?>
        <div class="btn-block analog-mobile">
            <a href="javascript::void(0)" class="add-to-cart btn-site1" data-id="<?=$arResult['ID']?>"
               onclick="$('#btn_form_FORM_ANALOG_ELEMENT' + $(this).data('id')).click();">
                <span class="btn-trans">Подобрать аналог</span>
                <span class="btn-anim">Подобрать аналог</span>
            </a>
        </div>
    <? endif; ?>
</div>
