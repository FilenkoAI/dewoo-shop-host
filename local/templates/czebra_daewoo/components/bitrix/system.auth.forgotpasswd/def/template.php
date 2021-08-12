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
	<p>
	<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>

    <div class="wrapp-field phone-mask">
        <label><?=GetMessage("AUTH_LOGIN")?></label>
        <p><input class="bx-auth-input" type="text" autocomplete="off" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" /></p>
    </div>
    <div class="back-link-register">
        <a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a>
    </div>

    <input type="submit" class="registration-button" name="register_submit_button" value="<?=GetMessage("AUTH_GET_CHECK_STRING")?>">


</form>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
