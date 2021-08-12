<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="item-info-confirm">
    <div class="name-item-info-confirm">
        <span><img src="<?=SITE_TEMPLATE_PATH?>/front/img/wallet.svg" alt=""></span> Оплата
    </div>
    <div class="detail-info-confirm">
        <p>Скидка по промокоду: <span><?=$arResult['DISCOUNT_PRICE']?> <span>₽</span></span></p>
        <p>Способ оплаты: <span><?=$arResult['CZ_ORDER']['PAYSYSTEM']['NAME']?></span></p>
        <a href="/personal_section/cart/order_payment/?from_confirm=Y" class="edit-info">Изменить</a>
    </div>
</div>
<input type="radio" name="PAY_SYSTEM_ID" class="style-input-radio" id="ID_PAY_SYSTEM_ID_<?=$_SESSION['CZ_ORDER']['DELIVERY']['PAYSYSTEM_ID']?>" value="<?=$_SESSION['CZ_ORDER']['DELIVERY']['PAYSYSTEM_ID']?>" class="css-checkbox" onclick="submitForm();" checked="checked" style="display: none;"/>

