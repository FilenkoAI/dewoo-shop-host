<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>
<div class="wrapp-lk">
    <div class="container">
        <div class="block-lk">
            <div class="wrapp-personal-date">
                <div class="info-user-lk">

<?if($USER->IsAuthorized()):?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
<?
if (count($arResult["ERRORS"]) > 0):

	foreach ($arResult["ERRORS"] as $key => $error){
        if($key == "LOGIN"){
            if(strpos($arResult["ERRORS"][$key], 'с номером телефона') !== false && strpos($arResult["ERRORS"][$key], 'с логином') !== false){
               $arResult["ERRORS"][$key] = 'Пользователь с таким номером уже существует';
            } elseif(strpos($arResult["ERRORS"][$key], 'обязательно для заполнения') !== false){
                unset($arResult["ERRORS"][$key]);
                continue;
            }
        }
        if (intval($key) == 0 && $key !== 0 )
            $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);
    }
	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>

<?if($arResult["SHOW_SMS_FIELD"] == true):?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>
<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
    <div class="wrapp-field">
        <label for=""><?echo GetMessage("main_register_sms")?><span class="starrequired">*</span></label>
        <p><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></p>
    </div>
			<input type="submit" class="registration-button" name="code_submit_button" value="<?echo GetMessage("main_register_sms_send")?>" />
</form>

<script>
new BX.PhoneAuth({
	containerId: 'bx_register_resend',
	errorContainerId: 'bx_register_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?=CUtil::PhpToJSObject([
			'signedData' => $arResult["SIGNED_DATA"],
		])?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_register_error');
			var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
			errorNode.innerHTML = '';
			for(var i = 0; i < response.errors.length; i++)
			{
				errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
			}
			errorDiv.style.display = '';
		}
});
</script>

<div id="bx_register_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_register_resend"></div>

<?else:?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>

<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>
<!--<pre>-->
<?//print_r($FIELD)?>
<!--</pre>-->

        <div class="wrapp-field">
        <?if($FIELD != "LOGIN"):?>
            <label><?=GetMessage("REGISTER_FIELD_".$FIELD)?>:</label>
        <?endif;?>
			<?
	switch ($FIELD)
	{
		case "PASSWORD":
			?>
        <p>
            <input type="password" autocomplete="off" name="REGISTER[PASSWORD]" placeholder="" data-cz-validated-type="data" data-cz-validated-group="reggroup2" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_PSW")?>">
        </p>

<?
			break;
		case "CONFIRM_PASSWORD":
			?>
        <p>
            <input type="password" name="REGISTER[CONFIRM_PASSWORD]" autocomplete="off" value="" data-cz-validated-type="email" data-cz-validated-group="reggroup2" data-cz-validated-msg="<?=GetMessage("AUTH_REGISTER_NOT_CON_PSW")?>">
        </p>
        <?
            break;
            ?>
        <?
        case "LOGIN":
            ?>
            <input size="30" type="hidden" name="REGISTER[<?=$FIELD?>]" value="" />

        <?
            break;
		default: ?>
            <p>
                <input size="30" type="text" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" />
            </p>
        <?}?>

    </div>
<?endforeach?>
    <noindex>
        <div class="back-link-register">
            <a href="/login/" rel="nofollow"><?=GetMessage("AUTH_AUTHORIZE")?></a><br />
        </div>
    </noindex>

    <input type="submit" class="registration-button" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>">
</form>



<?endif //$arResult["SHOW_SMS_FIELD"] == true ?>


<?endif?>
</div>
            </div>
        </div>
    </div>
</div>