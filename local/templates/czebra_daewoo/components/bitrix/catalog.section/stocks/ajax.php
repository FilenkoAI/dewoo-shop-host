<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<div class="wrapp-list-stock">
    <? if(count($arResult["ITEMS"]) > 0): ?>
        <? foreach($arResult["ITEMS"] as $arItem): ?>
            <div class="item-stock">
                <div class="bg-item-stock"
                     style="background: url('<?=$arItem["DETAIL_PICTURE"]["SRC"]?>') no-repeat 80% center; "></div>
                <div class="bg-item-stock mobile"
                     style="background: url('<?=$arItem['CZ_PROPS']['MOBILE_PICTURE']["SRC"]?>') no-repeat 80% center; "></div>
                <div class="name-stock"><?=$arItem['NAME']?></div>
                <div class="name-stock"><?=$arItem['DISPLAY_PROPERTIES']['PRODUCT']['DISPLAY_VALUE']?></div>
                <? if($arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'): ?>
                    <div class="old-price-stock">
                        <span class="old-price"><?=$arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></span>
                        <span class="percent"><?=$arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE']?></span>
                    </div>
                    <div class="price"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                <? else: ?>
                    <div class="price"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                <? endif; ?>
                <div class="btn-stock">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                        <span class="btn-trans">Выбрать</span>
                        <span class="btn-anim">Выбрать</span>
                    </a>
                </div>
            </div>
        <? endforeach; ?>
    <? else : ?>
    <p>
        Ничего не найдено
    </p>
    <? endif ?>
    <? if($arResult["NAV_RESULT"]->nEndPage > 1 && $arResult["NAV_RESULT"]->NavPageNomer < $arResult["NAV_RESULT"]->nEndPage): ?>
        <div class="show-more">
            <a data-ajax-id="<?=$bxajaxid?>" href="javascript:void(0)"
               data-show-more="<?=$arResult["NAV_RESULT"]->NavNum?>"
               data-next-page="<?=($arResult["NAV_RESULT"]->NavPageNomer + 1)?>"
               data-max-page="<?=$arResult["NAV_RESULT"]->nEndPage?>">Показать еще</a>
        </div>
    <? endif ?>
</div>
