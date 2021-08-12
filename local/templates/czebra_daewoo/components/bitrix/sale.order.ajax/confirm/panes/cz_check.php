<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="item-info-confirm">
    <div class="name-item-info-confirm">
        <span><img src="<?=SITE_TEMPLATE_PATH?>/front/img/list-confirm.svg" alt=""></span> Проверка информации о заказе
    </div>
    <div class="detail-info-confirm">
        <p>Ваш заказ на сумму:  <span><?=$arResult["ORDER_PRICE_FORMATED"]?></span></p>
        <p>Товарных позиций в заказе: <span><?=count($arResult["ORDER_DATA"]["QUANTITY_LIST"])?></span></p>
        <?/*<a href="#" class="edit-info" onclick="$('.edit-list-modal').modal('show')">Изменить</a>*/?>
        <a href="/personal_section/cart/order_start/?from_confirm=Y" class="edit-info" >Изменить</a>
    </div>
</div>
