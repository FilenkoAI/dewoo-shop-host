<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
$this->setFrameMode(true);

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>



<?if($arResult["SHOW_SMS_FIELD"] == true):?>

<form method="post" action="<?=$arResult["FORM_TARGET"]?>">
    <?/*
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
<table class="profile-table data-table">
	<tbody>
		<tr>
			<td><?echo GetMessage("main_profile_code")?><span class="starrequired">*</span></td>
			<td><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></td>
		</tr>
	</tbody>
</table>
    */?>

<p><input type="submit" name="code_submit_button" value="<?echo GetMessage("main_profile_send")?>" /></p>

</form>
<script>
new BX.PhoneAuth({
	containerId: 'bx_profile_resend',
	errorContainerId: 'bx_profile_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?=CUtil::PhpToJSObject([
			'signedData' => $arResult["SIGNED_DATA"],
		])?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_profile_error');
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

<div id="bx_profile_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_profile_resend"></div>

<?else:?>

<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if ($arResult["opened"] <> '')
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" id="lk-form" enctype="multipart/form-data">

<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

    <div class="wrapp-lk">
        <div class="container">
            <?ShowError($arResult["strProfileError"]);?>
            <?
            if ($arResult['DATA_SAVED'] == 'Y')
                ShowNote(GetMessage('PROFILE_DATA_SAVED'));
            ?>
            <div class="block-lk">
                <div class="wrapp-personal-date">
                    <div class="info-user-lk">
                            <div class="wrapp-field">
                                <label>ФИО</label>
                                <p>
                                   <input type="text" placeholder="Фамилия Имя Отчество" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" />
                                    <a href="javascript::void(0)" class="edit-field" ></a>
                                </p>
                            </div>
                            <div class="wrapp-field">
                                <label>Телефон</label>
                                <p>
                                    <input type="text" placeholder="+7 (999) 999-99-99" disabled maxlength="50" value="<?=$arResult["arUser"]["PHONE_NUMBER"]?>" />
                                </p>
                            </div>
                            <div class="wrapp-field">
                                <label>E-mail</label>
                                <p>
                                    <input type="text" placeholder="email@yandex.ru" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" />
                                    <a href="javascript::void(0)" class="edit-field"></a>
                                </p>
                            </div>
                            <?/*
                            <div class="reset-passw-user">
                                <a href="#">Изменить пароль</a>
                            </div>
                            */?>
                    </div>


                    <div class="btn-catalog-filter btn-personal-date">
                        <a href="/personal_section/" class="back-lk btn-site1">
                            <span class="btn-trans">Назад</span>
                            <span class="btn-anim">Назад</span>
                        </a>
                       <span class="apply-filter">
                            <button type="submit" name="save" class="btn-site1" id="set_filter" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
                                <span class="btn-trans">Применить</span>
                                <span class="btn-anim">Применить</span>
                            </button>
                       </span>

                        <a href="/?logout=yes" class="back-lk btn-site1 logout">
                            <span class="btn-trans">Выход</span>
                            <span class="btn-anim">Выход</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</form>
<?
if($arResult["SOCSERV_ENABLED"])
{
	$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
			"SHOW_PROFILES" => "Y",
			"ALLOW_DELETE" => "Y"
		),
		false
	);
}
?>

<?endif?>

</div>


