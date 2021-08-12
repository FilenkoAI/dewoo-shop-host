<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<div class="item-info-confirm">
    <div class="name-item-info-confirm">
        <span><img src="<?=SITE_TEMPLATE_PATH?>/front/img/user-confirm.svg" alt=""></span> Персональные данные
    </div>

    <div class="detail-info-confirm">
        <p>Имя и фамилия*: </p>
        <p><input type="text" name="ORDER_PROP_1" data-cz-validated-type="data" data-cz-validated-group="group_order"
                  value="<?=$USER->GetFullName();?>"></p>
        <p>Телефон*: </p>
        <p><input type="text" name="ORDER_PROP_2" data-cz-validated-type="data" data-cz-validated-group="group_order"
                  value="<? if($USER->GetId()): echo \Bitrix\Main\UserPhoneAuthTable::getRowById($USER->GetId())['PHONE_NUMBER'];endif; ?>">
        </p>
        <p>Email:</p>
        <p><input type="text" name="ORDER_PROP_9" value="<?=$USER->GetParam('EMAIL');?>"></p>
        <? /*
        <a href="/personal_section/profile/" class="edit-info">Изменить</a>
        */ ?>
    </div>
</div>
<script>
    $('[name="ORDER_PROP_2"]').mask('+7 (999) 999 99 99');
</script>


<? foreach($arResult["ORDER_PROP"]["USER_PROPS_Y"] as $arProperties): ?>
    <? if($arProperties["FIELD_ID"] == "ORDER_PROP_LOCATION"): ?>
        <input class="itext" type="hidden" value="<?=$arResult["CZ_ORDER"]["CITY"]["ID"];?>"
               name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>">
    <? endif ?>
<? endforeach; ?>
