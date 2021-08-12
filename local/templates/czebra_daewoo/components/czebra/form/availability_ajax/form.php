<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
if(!empty($arResult["ERRORS"]))
    ShowError(implode("<br />", $arResult["ERRORS"]));

if(strlen($arResult["MESSAGE"]) > 0)
    ShowNote($arResult["MESSAGE"]);
?>

<div class="title-modal"><?=$arParams['TITLE']?></div>
<form id="<?=$arParams["FORM_ID"]?>" name="<?=$arParams["FORM_ID"]?>" action="<?=POST_FORM_ACTION_URI?>"
      method="post" enctype="multipart/form-data">
    <div style="display:none;"><input name="czebra_control" type="text" value=""/></div>
    <?=bitrix_sessid_post()?>
    <input type="hidden" name="PROPERTY[PRODUCT][0]" value="<?=$arParams['PRODUCT']?>">
    <div class="wrapp-field">
        <label>Ваше имя</label>
        <input type="text" name="PROPERTY[NAME][0]" data-cz-validated-type="data"
               data-cz-validated-group="<?=$arParams["FORM_ID"]?>_group">
    </div>
    <div class="wrapp-field">
        <label>Ваш телефон</label>
        <input type="text" name="PROPERTY[PHONE][0]" data-cz-validated-type="data" placeholder="+7 (___) ___-__-__"
               data-cz-validated-group="<?=$arParams["FORM_ID"]?>_group" data-phone="yes_<?=$arParams["FORM_ID"]?>">
    </div>

    <? $btmName = strlen($arParams["MSG_BTN"]) > 0 ? $arParams["MSG_BTN"] : GetMessage("CZEBRA.FORM.BTN_SUBMIT"); ?>
    <p>Нажимая на кнопку "<?=$btmName?>", Вы соглашаетесь на обработку персональных данных в соответствии с <a
                href="/confidentiality/" target="_blank">политикой конфиденциальности</a></p>
    <div class="wrapp-btn-ask">
        <input type="submit" id="<?=$arParams["FORM_ID"]?>_sibmit" name="<?=$arParams["FORM_ID"]?>_submit"
               value="<?=$btmName?>"/>
    </div>

</form>
