<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)	die();?>
<?
if ($USER->IsAuthorized()) {
	LocalRedirect("/personal_section/", false);
}

if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error) {
		if (intval($key) == 0 && $key !== 0) {
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);
		}
	}
	ShowError(implode("<br />", $arResult["ERRORS"]));
elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
	<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform">
    <?if($arResult["BACKURL"] <> ''):?>
        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
    <?endif;?>
    <input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
    <input size="30" type="hidden" name="REGISTER[LOGIN]" value="<?=$arResult["VALUES"]["LOGIN"]?>">
    <input size="30" type="hidden" name="REGISTER[PERSONAL_BIRTHDAY]" value="<?=$arResult["VALUES"]["PERSONAL_BIRTHDAY"]?>">

    <div class="wrapp-select-gender">
        <span><?=GetMessage("AUTH_REGISTER_Gender")?></span>
        <div class="wrapp-radio">
            <input type="radio" id="radio1" name="REGISTER[PERSONAL_GENDER]" value="F"<?=$arResult["VALUES"]["PERSONAL_GENDER"] == "F" || $arResult["VALUES"]["PERSONAL_GENDER"] == "" ? " checked=\"checked\"" : ""?>>
            <label for="radio1"><?=GetMessage("AUTH_REGISTER_Female")?></label>
            
        </div>
        <div class="wrapp-radio">
            <input type="radio" id="radio2" name="REGISTER[PERSONAL_GENDER]" value="M"<?=$arResult["VALUES"]["PERSONAL_GENDER"] == "M" ? " checked=\"checked\"" : ""?>>
            <label for="radio2"><?=GetMessage("AUTH_REGISTER_Male")?></label>
        </div>
    </div>

    <div class="wrapp-field">
        <label for=""><?=GetMessage("AUTH_REGISTER_First_Name")?></label>
        <input type="text" size="30" name="REGISTER[NAME]" value="<?=$arResult["VALUES"]["NAME"]?>" data-cz-validated-type="data" data-cz-validated-group="reggroup" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_NAME")?>" >
    </div>

    <div class="wrapp-field">
        <label for=""><?=GetMessage("AUTH_REGISTER_Last_Name")?></label>
        <input type="text" size="30" name="REGISTER[LAST_NAME]" value="<?=$arResult["VALUES"]["LAST_NAME"]?>" data-cz-validated-type="data" data-cz-validated-group="reggroup" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_FAM")?>">
    </div>

    <div class="wrapp-field">
        <label for="">Email</label>
        <input type="text" size="30" name="REGISTER[EMAIL]" value="<?=$arResult["VALUES"]["EMAIL"]?>" data-cz-validated-type="email" data-cz-validated-group="reggroup" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_EMAIL")?>">
    </div>

    <div class="wrapp-field">
        <label for=""><?=GetMessage("AUTH_REGISTER_Password")?></label>
        <input size="30" type="password" name="REGISTER[PASSWORD]" autocomplete="off" value="<?=$arResult["VALUES"]["PASSWORD"]?>" data-cz-validated-type="data" data-cz-validated-group="reggroup" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_PSW")?>">
    </div>

    <div class="wrapp-field">
        <label for=""><?=GetMessage("AUTH_REGISTER_Confirm_password")?></label>
        <input size="30" type="password" name="REGISTER[CONFIRM_PASSWORD]" autocomplete="off" value="<?=$arResult["VALUES"]["CONFIRM_PASSWORD"]?>" data-cz-validated-type="email" data-cz-validated-group="reggroup2" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_CON_PSW")?>">
    </div>

    <div class="wrapp-checkbox">
        <input type="checkbox" id="check1" data-cz-validated-type="checkbox" data-cz-validated-group="reggroup" data-cz-validated-msg="">
        <label for="check1"><?=GetMessage("AUTH_REGISTER_DESC")?></label>
    </div>


    <input type="submit" name="register_submit_button" class="btn2" value="<?=GetMessage("AUTH_REGISTER_NEW")?>">
</form>
