<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>

<form id="auth_form" class="auth_form" method="post">
    <div class="wrapp-field phone-mask">
        <label>Номер телефона</label>
        <p><input type="text" name="phone" autocomplete="off" placeholder="+7 (999) 999-99-99" data-cz-validated-type="data" data-cz-validated-group="group1" pattern="\+[0-9]\s?[\(][0-9]{3}[\)]\s?[0-9]{3}[-][0-9]{2}[-][0-9]{2}"></p>
    </div>
    <div class="wrapp-field">
        <label>Пароль:</label>
        <p><input type="password" name="password" maxlength="255" autocomplete="off" data-cz-validated-type="data" data-cz-validated-group="group1"></p>
    </div>
    <div class="auth error authorize">
    </div>
    <noindex>
        <div class="back-link-register">
            <a href="/auth/forgot/" rel="nofollow">Забыли свой пароль?</a>
        </div>
    </noindex>
    <?if ($arParams['FROM_BASKET'] != 'Y'):?>
    <noindex>
        <div class="back-link-register">
            <a href="/auth/registration/" rel="nofollow">Зарегистрироваться</a><br>
        </div>
    </noindex>
    <?endif;?>
    <input type="submit" class="registration-button" name="register_submit_button" value="Войти" id="auth_button">
</form>
<script>
    $('#auth_form').submit(function (){
        if ( !$('#auth_button').hasClass('disabled') ){
            if (cz_validated.run('group1')) {
                $('#auth_button').addClass('disabled');
                let fields = {};
                $('#auth_form').find('input').each(function() {
                    fields[this.name] = $(this).val();
                });
                fields.sessid = BX.bitrix_sessid();
                fields.siteId = 's1';
                fields.templateName = 'main';
                $.ajax({
                    url: '<?=$arParams['PATH']?>/ajax.php',
                    method: 'POST',
                    data: fields,
                    success: function (data){
                        data = JSON.parse(data);
                        if (data.success == false) {
                            $('.authorize.error').html(data.error);
                            $('.authorize.error').addClass('visible');
                        } else {
                            <?if ($arParams['FROM_BASKET'] != 'Y'):?>
                            window.location.href = '/personal_section/';
                            <?else:?>
                            window.location.reload()
                            <?endif?>
                        }
                        $('#auth_button').removeClass('disabled');
                    }
                });
            }
        }
        return false;
    })
    // $('.auth_form [name="phone"]').mask('+7(000)000-00-00');
</script>