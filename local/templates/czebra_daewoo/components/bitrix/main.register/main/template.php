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
		echo '<pre>';
		print_r($key);
		echo '</pre>';
	}
	ShowError(implode("<br />", $arResult["ERRORS"]));
//elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
<!--	<p>--><?//echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?><!--</p>-->
<?endif?>

<div class="wrapp-lk">
    <div class="container">
        <div class="block-lk">
            <div class="wrapp-personal-date">
                <div class="info-user-lk">
                    <form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform">
                        <div class="wrapp-field">
                            <label><?=GetMessage("AUTH_REGISTER_First_Name")?></label>
                            <p>
                                <input type="text" name="REGISTER[NAME]" value="<?=$arResult["VALUES"]["NAME"]?>" placeholder="<?=GetMessage("AUTH_REGISTER_First_Name")?>" value="<?=$arResult["VALUES"]["NAME"]?>" data-cz-validated-type="data" data-cz-validated-group="reggroup" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_NAME")?>" >
                            </p>
                        </div>
                        <div class="wrapp-field">
                            <label><?=GetMessage("AUTH_REGISTER_Last_Name")?></label>
                            <p>
                                <input type="text" name="REGISTER[LAST_NAME]" placeholder="<?=GetMessage("AUTH_REGISTER_Last_Name")?>" value="<?=$arResult["VALUES"]["LAST_NAME"]?>" data-cz-validated-type="data" data-cz-validated-group="reggroup" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_FAM")?>">
                            </p>
                        </div>
                        <div class="wrapp-field">
                            <label><?=GetMessage("AUTH_REGISTER_Phone")?></label>
                            <p>
                                <input type="text" name="REGISTER[PHONE_NUMBER]" value="<?=$arResult["VALUES"]["PHONE_NUMBER"]?>" placeholder="">
                            </p>
                        </div>
                        <div class="wrapp-field">
                            <label><?=GetMessage("AUTH_REGISTER_Email")?></label>
                            <p>
                                <input type="email" name="REGISTER[EMAIL]" value="<?=$arResult["VALUES"]["EMAIL"]?>" data-cz-validated-type="email" data-cz-validated-group="reggroup" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_EMAIL")?>">
                            </p>
                        </div>
                        <div class="wrapp-field">
                            <label><?=GetMessage("AUTH_REGISTER_Password")?></label>
                            <p>
                                <input type="password" autocomplete="off" name="REGISTER[PASSWORD]" placeholder="" data-cz-validated-type="data" data-cz-validated-group="reggroup" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_PSW")?>">
                            </p>
                        </div>
                        <div class="wrapp-field">
                            <label><?=GetMessage("AUTH_REGISTER_Password_Confirm")?></label>
                            <p>
                                <input type="password" name="REGISTER[CONFIRM_PASSWORD]" autocomplete="off" value="" data-cz-validated-type="email" data-cz-validated-group="reggroup2" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_CON_PSW")?>">
                            </p>
                        </div>
                        <div class="back-link-register">
                            <a href="/login/"><?=GetMessage("AUTH_REGISTER_Authorisation")?></a>
                        </div>

                        <input type="submit" class="registration-button" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER_Registration")?>">

                        <input size="30" type="hidden" name="REGISTER[LOGIN]" value="<?=$arResult["VALUES"]["LOGIN"]?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>