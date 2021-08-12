<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<div class="wrapp-lk">
    <div class="container">
        <div class="block-lk">
            <div class="wrapp-personal-date">
                <div class="info-user-lk">
                    <?
                    ShowMessage($arParams["~AUTH_RESULT"]);
                    ?>
                    <form method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform">
                        <input type="hidden" name="USER_LOGIN" maxlength="50"
                               value="<?=$arResult["USER_PHONE_NUMBER"]?>" class="bx-auth-input"/>
                        <? if(strlen($arResult["BACKURL"]) > 0): ?>
                            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>"/>
                        <? endif ?>
                        <input type="hidden" name="AUTH_FORM" value="Y">
                        <input type="hidden" name="TYPE" value="CHANGE_PWD">
                        <div class="wrapp-field">
                            <label for=""><?=GetMessage("AUTH_CHECKWORD")?></label>
                            <p><input type="text" name="USER_CHECKWORD" maxlength="50"
                                      value="<?=$arResult["USER_CHECKWORD"]?>" class="bx-auth-input"/></p>
                        </div>
                        <div class="wrapp-field">
                            <label><?=GetMessage("AUTH_NEW_PASSWORD_REQ")?></label>
                            <p>
                                <input type="password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" class="bx-auth-input" autocomplete="off"/>
                            </p>
                        </div>
                        <div class="wrapp-field">
                            <label><?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?></label>
                            <p><input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="bx-auth-input" autocomplete="off"/></p>
                        </div>
                        <input type="submit" class="registration-button" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>">

                        <noindex>
                            <div class="back-link-register">
                                <a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_AUTH")?></a><br />
                            </div>
                        </noindex>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.bform.USER_LOGIN.focus();
</script>