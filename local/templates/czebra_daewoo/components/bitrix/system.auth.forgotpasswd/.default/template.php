<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?


?>
<div class="wrapp-lk">
    <div class="container">
        <div class="block-lk">
            <div class="wrapp-personal-date">
                <div class="info-user-lk">
                    <?ShowMessage($arParams["~AUTH_RESULT"])?>
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
<!--    <input type="hidden" name="USER_LOGIN" value="" />-->
<!--    <input type="hidden" name="USER_EMAIL" />-->
    <div class="wrapp-field">
        <label for=""><?=GetMessage("sys_forgot_pass_phone")?></label>
        <p><input type="text" name="USER_PHONE_NUMBER" maxlength="50" value=""/></p>
    </div>
    <input type="submit" name="send_account_info" class="registration-button" value="<?=GetMessage("AUTH_SEND")?>" />
    <noindex>
        <div class="back-link-register">
            <a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_AUTH")?></a>
        </div>
    </noindex>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
document.bform.USER_LOGIN.focus();
</script>
