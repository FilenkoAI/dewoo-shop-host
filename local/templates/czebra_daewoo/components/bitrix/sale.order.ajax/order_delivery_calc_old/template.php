<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["DELIVERY"] as $delivery_id => $arDelivery):?>
<?if(in_array($delivery_id, $arParams['CZ_EXCLUDE_IDS'])):?>
    <?continue?>
<?else:?>

<div class="item-company">
    <input type="radio" id="company<?=$delivery_id?>" name="delivery-company">
    <label for="company<?=$delivery_id?>">
        <div class="wrapp-name-company">
            <div class="<?=SITE_TEMPLATE_PATH?>/front/img-company"><img src="<?=$arDelivery['LOGOTIP']['SRC']?>" alt=""></div>
            <div class="name-company"><?=$arDelivery["NAME"];?></div>
        </div>
        <div class="price-delivery-company"><?=$arDelivery["PRICE_FORMATED"];?></div>
        <div class="time-delivery-company">12 дн.</div>
    </label>
</div>
<?endif;?>
<?endforeach?>




