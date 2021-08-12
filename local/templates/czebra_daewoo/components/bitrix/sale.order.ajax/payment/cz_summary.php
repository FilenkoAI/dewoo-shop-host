<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$selectedDeliveryType = $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'];
if ($selectedDeliveryType) {
    $deliveryPrices = \Czebra\Project\DeliveryController::getDeliveryPrice($selectedDeliveryType);
    if ($deliveryPrices > 0) {
        $deliveryName = '';
        switch ($selectedDeliveryType) {
            case \Czebra\Project\DeliveryController::NAME_DELIVERY_PICKUP:
                $deliveryName = 'Самовывоз';
                break;
            case \Czebra\Project\DeliveryController::NAME_DELIVERY_MOSCOW:
                $deliveryName = 'Доставка по Москве и МО';
                break;
            case \Czebra\Project\DeliveryController::NAME_DELIVERY_TC:
                $deliveryName = 'До терминала ТК в Москве';
                break;
        }
        $deliveryPrices['TYPE_RU'] = $deliveryName;
        $deliveryPrices['DELIVERY_PRICE_FORMATED'] = $deliveryPrices['DELIVERY_PRICE'] . "<span class='rubl'>i</span>";
        $deliveryPrices['TOTAL_FORMATED'] = number_format(intval($deliveryPrices['TOTAL']), 0, '.', ' ') . "<span class='rubl'>i</span>";
        $deliveryPrices['PRICE_FORMATED'] = number_format(intval($deliveryPrices['PRICE']), 0, '.', ' ') . "<span class='rubl'>i</span>";
    }
}
global $USER;
?>

<div class="parametrs-order">
    <input type="hidden" id="free_delivery_price" value="<?= $arResult["allSum_FORMATED"] ?>">
    <div class="fixed-parametrs-order">
        <div class="title-parametrs">Параметры заказа</div>
        <div class="list-items-order">
            <? foreach ($arResult["BASKET_ITEMS"] as $k => $arItem): ?>

                <div class="item-order">
                    <div class="img-item-order">
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><img src="<?= $arItem['PREVIEW_PICTURE_SRC'] ?>"
                                                                         alt=""></a>
                    </div>
                    <div class="info-item-order">
                        <div class="name-item-order">
                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a>
                        </div>
                        <div class="count-item-order">
                            <span><?= $arItem['QUANTITY'] ?> шт.</span>
                        </div>

                        <div class="price-item-order">

                            <div class="price-item-order">
                                <? if ($arItem['BASE_PRICE_IS_MORE'] == 'Y'): ?>
                                    <div class="old-price"><?= $arItem['SUM_BASE_FORMATED'] ?></div>
                                    <div class="price"><?= $arItem["SUM"]; ?></div>
                                <? else: ?>
                                    <div class="price"><?= $arItem["SUM"]; ?></div>
                                <? endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
        <div class="info-items-order">
            <p class="sum-delivery"></p>
        </div>
        <? if ($selectedDeliveryType && $deliveryPrices > 0): ?>
            <div class="additional_data"
                 style="<? if ($selectedDeliveryType && $deliveryPrices > 0): ?>display: block<? else: ?>display: block<? endif; ?>">
                <div class="selected_delivery_type"><span class="name">Тип доставки</span>: <span
                            class="value"><?= $deliveryPrices['TYPE_RU'] ?></span>
                </div>
                <? if ($deliveryPrices['DESCRIPTION']): ?>
                    <div class="delivery_price"><span class="name">Стоимость доставки</span>: <span
                                class="value"><?= $deliveryPrices['DESCRIPTION'] ?></span></div>
                <? else: ?>
                    <div class="delivery_price"><span class="name">Стоимость доставки</span>: <span
                                class="value"><?= $deliveryPrices['DELIVERY_PRICE_FORMATED'] ?></span></div>
                <? endif; ?>

                <? if ($arResult['DISCOUNT_PRICE']): ?>
                    <div class="delivery_price"><span class="name">Скидка по промокоду</span>: <span
                                class="value"><?= $arResult['DISCOUNT_PRICE_FORMATED'] ?></span></div>
                <? endif; ?>

            </div>
        <? endif ?>

        <div class="sum-items-order">
            <? if ($deliveryPrices['TOTAL_FORMATED']): ?>
                <p>Итого: <span class="total"><?= $deliveryPrices['TOTAL_FORMATED'] ?></span></p>
            <? else: ?>
                <p>Итого: <span class="total"><?= $arResult["ORDER_PRICE_FORMATED"] ?></span></p>
            <? endif; ?>
        </div>
    </div>
</div>