<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(false);

?>

<div class="ask-modal modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="title-modal">Задать вопрос</div>
                <form id="<?=$arParams["FORM_ID"]?>" name="<?=$arParams["FORM_ID"]?>"
                      action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data"
                      class="form-reviews">
                    <div style="display:none;"><input name="czebra_control" type="text" value=""/></div>
                    <?=bitrix_sessid_post()?>
                    <input type="hidden" name="PROPERTY[PRODUCT][0]" value="<?=$arParams['PRODUCT']?>">
                    <div class="wrapp-field">
                        <label>Ваше имя</label>
                        <input type="text" name="PROPERTY[QUESTION_AUTHOR][0]" data-cz-validated-type="data" data-cz-validated-group="group2">
                    </div>
                    <div class="wrapp-field">
                        <label>Ваш email</label>
                        <input type="text" name="PROPERTY[EMAIL][0]" data-cz-validated-type="email" data-cz-validated-group="group2">
                    </div>
                    <div class="wrapp-field">
                        <label>Вопрос</label>
                        <textarea name="PROPERTY[QUESTION][0]" data-cz-validated-type="data" data-cz-validated-group="group2"></textarea>
                    </div>
                    <?$btmName = strlen($arParams["MSG_BTN"]) > 0 ? $arParams["MSG_BTN"] : GetMessage("CZEBRA.FORM.BTN_SUBMIT");?>
                    <p>Нажимая на кнопку "<?=$btmName?>", Вы соглашаетесь на обработку персональных данных в соответствии с <a href="/confidentiality/" target="_blank">политикой конфеденциальности</a></p>
                    <div class="wrapp-btn-ask">
                        <input type="submit" id="<?=$arParams["FORM_ID"]?>_sibmit" name="<?=$arParams["FORM_ID"]?>_submit" value="<?=$btmName?>" />
                    </div>
                </form>
                <a href="#" class="close-modal" data-dismiss="modal"></a>
            </div>
        </div>
    </div>
</div>

<script>
    cz_validated.runBtn('<?=$arParams["FORM_ID"]?>_sibmit', 'group2');
</script>
