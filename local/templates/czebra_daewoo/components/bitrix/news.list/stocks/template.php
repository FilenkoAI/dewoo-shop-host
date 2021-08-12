<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<? foreach ($arResult["ITEMS"] as $arItem): ?>
        <div class="item-stock">
            <div class="bg-item-stock" style="background: url('img/stock-main1.png') no-repeat center center; background-size: cover;"></div>
            <div class="name-stock"><?=$arItem['NAME']?></div>
            <div class="name-stock"><?=$arItem['DISPLAY_PROPERTIES']['PRODUCT']['DISPLAY_VALUE']?></div>
            <div class="old-price-stock">
                <span class="old-price">9 990 <span>₽</span></span>
                <span class="percent">-25%</span>
            </div>
            <div class="price">7 990 <span>₽</span></div>
            <div class="btn-stock">
                <a href="#">
                    <span class="btn-trans">Выбрать</span>
                    <span class="btn-anim">Выбрать</span>
                </a>
            </div>
        </div>
<? endforeach; ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
    <?= $arResult["NAV_STRING"] ?>
<? endif; ?>

