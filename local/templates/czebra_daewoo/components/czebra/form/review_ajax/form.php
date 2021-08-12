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
        <div class="rating_block">
            <?/*
            <input name="PROPERTY[RATING][0]" value="5" id="rating_5" type="radio">
            <label for="rating_5" class="label_rating"></label>

            <input name="PROPERTY[RATING][0]" value="4" id="rating_4" type="radio">
            <label for="rating_4" class="label_rating"></label>

            <input name="PROPERTY[RATING][0]" value="3" id="rating_3" type="radio">
            <label for="rating_3" class="label_rating"></label>

            <input name="PROPERTY[RATING][0]" value="2" id="rating_2" type="radio">
            <label for="rating_2" class="label_rating"></label>

            <input name="PROPERTY[RATING][0]" value="1" id="rating_1" type="radio">
            <label for="rating_1" class="label_rating"></label>
            */?>
            <div class="rate">
                <input class="input-rating" name="PROPERTY[RATING][0]" type = "number" style="display: none" value="<?//=$arItem['PROPERTIES']['RATING']['VALUE']?>">
            </div>
            <script>
                $(".rating_block .input-rating").rating({
                    showCaption: false,
                    step: 1,
                    rtl: false
                });
            </script>
        </div>
        <div class="wrapp-field">
            <label>Ваше имя</label>
            <input type="text" name="PROPERTY[AUTHOR][0]" data-cz-validated-type="data"
                   data-cz-validated-group="<?=$arParams["FORM_ID"]?>_group">
        </div>
        <div class="wrapp-field">
            <label>Ваш email</label>
            <input type="text" name="PROPERTY[EMAIL][0]" data-cz-validated-type="email"
                   data-cz-validated-group="<?=$arParams["FORM_ID"]?>_group">
        </div>
        <div class="wrapp-field">
            <label>Достоинства</label>
            <textarea name="PROPERTY[PROS][0]"></textarea>
        </div>
        <div class="wrapp-field">
            <label>Недостатки</label>
            <textarea name="PROPERTY[CONS][0]"></textarea>
        </div>
        <div class="wrapp-field">
            <label>Комментарий</label>
            <textarea name="PROPERTY[COMMENT][0]" data-cz-validated-type="data"
                      data-cz-validated-group="<?=$arParams["FORM_ID"]?>_group"></textarea>
        </div>
        <? $btmName = strlen($arParams["MSG_BTN"]) > 0 ? $arParams["MSG_BTN"] : GetMessage("CZEBRA.FORM.BTN_SUBMIT"); ?>
        <p>Нажимая на кнопку "<?=$btmName?>", Вы соглашаетесь на обработку персональных данных в соответствии с <a
                    href="/confidentiality/" target="_blank">политикой конфиденциальности</a></p>
        <div class="wrapp-btn-reviews">
            <input type="submit" id="<?=$arParams["FORM_ID"]?>_sibmit" name="<?=$arParams["FORM_ID"]?>_submit"
                   value="<?=$btmName?>"/>
        </div>


    </form>
