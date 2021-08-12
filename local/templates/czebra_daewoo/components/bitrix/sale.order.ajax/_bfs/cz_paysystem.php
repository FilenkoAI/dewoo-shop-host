<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="caption">Способ оплаты</div>
<?foreach($arResult["PAY_SYSTEM"] as $arPaySystem):?>
    <input type="radio" name="PAY_SYSTEM_ID" class="style-input-radio" id="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>" value="<?=$arPaySystem["ID"]?>" class="css-checkbox" onclick="submitForm();" <?if ($arPaySystem["CHECKED"]=="Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")) echo " checked=\"checked\"";?> />
    <label for="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>" class="style-label-radio"><?=$arPaySystem["NAME"]?></label>
    <input type="hidden" value="<?=$arPaySystem["ID"]?>">
<?endforeach?>