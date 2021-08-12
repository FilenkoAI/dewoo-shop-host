<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<!--<div class="bx-auth">-->
<?//if($arResult["AUTH_SERVICES"]):?>
<!--	<div class="bx-auth-title">--><?//echo GetMessage("AUTH_TITLE")?><!--</div>-->
<?//endif?>
<!--	<div class="bx-auth-note">--><?//=GetMessage("AUTH_PLEASE_AUTH")?><!--</div>-->

<div class="wrapp-lk">
    <div class="container">
        <div class="block-lk">
            <div class="wrapp-personal-date">
                <div class="info-user-lk">
                    <?
                    ShowMessage($arParams["~AUTH_RESULT"]);
                    ShowMessage($arResult['ERROR_MESSAGE']);
                    ?>

	<form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
		<?if (strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>
		<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>


            <div class="wrapp-field phone-mask">
                <label><?=GetMessage("AUTH_LOGIN")?></label>
                <p><input class="bx-auth-input" type="text" autocomplete="off" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" /></p>
            </div>
            <div class="wrapp-field">
                <label><?=GetMessage("AUTH_PASSWORD")?></label>
                <p><input class="bx-auth-input" type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off" /></p>
            </div>
        <?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>
            <noindex>
                <div class="back-link-register">
                    <a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
                </div>
            </noindex>
        <?endif?>

        <?if($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y"):?>
            <noindex>
                <div class="back-link-register">
                    <a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a><br />
                </div>
            </noindex>
        <?endif?>
            <input type="submit" class="registration-button" name="register_submit_button" value="<?=GetMessage("AUTH_TITLE")?>">

    </form>
</div>
            </div>
        </div>
    </div>
</div>


