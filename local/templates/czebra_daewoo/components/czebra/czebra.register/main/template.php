<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>

<form action="" id="register_form" class="register_form">
    <div class="wrapp-field">
        <label>ФИО*:</label>
        <p>
            <input size="30" type="text" name="name" data-cz-validated-type="data" data-cz-validated-group="group2">
        </p>
    </div>
    <div class="wrapp-field">
        <label>Номер телефона*:</label>
        <p>
            <input size="30" type="text" name="phone" data-cz-validated-type="data" data-cz-validated-group="group2 pattern="\+[0-9]\s?[\(][0-9]{3}[\)]\s?[0-9]{3}[-][0-9]{2}[-][0-9]{2}">
        </p>
    </div>

    <div class="wrapp-field">
        <label>E-mail:</label>
        <p>
            <input size="30" type="text" name="email" data-cz-validated-type="email" >
        </p>
        <p style="font-family: 'OpenSans-Regular', sans-serif;">Получать полезную информацию и уникальные предложения</p>
    </div>
    <div class="wrapp-field">
        <label>Пароль*:</label>
        <p>
            <input type="password"  name="password" data-cz-validated-type="data"
                   data-cz-validated-group="group2">
        </p>
    </div>
    <div class="wrapp-field">
        <label>Подтверждение пароля*:</label>
        <p>
            <input type="password"  name="confirmPassword"
                   data-cz-validated-type="data" data-cz-validated-group="group2">
        </p>
    </div>


    <div class="auth error reg">
    </div>
    <?if ($arParams['FROM_BASKET'] != 'Y'):?>
    <noindex>
        <div class="back-link-register">
            <a href="/auth/" rel="nofollow">Авторизация</a><br>
        </div>
    </noindex>
    <?endif?>
    <input type="submit" class="registration-button" id="register_button" value="Регистрация">
</form>

<form action="" id="confirm_form" class="register_form" style="display: none">
    <div class="wrapp-field">
        <label>Код из СМС:</label>
        <p>
            <input size="30" type="text" name="code" data-cz-validated-type="data" data-cz-validated-group="group3">
        </p>
    </div>
    <div class="wrapp-field sendAgain">
        <a href="javascript:void(0);" class="hoverUnderline">Отправить повторно
            <div class="timer">
                через:
                <div class="minutes">00</div>
                :
                <div class="seconds">00</div>
            </div>
        </a>
    </div>
    <div class="auth error confirm">
    </div>
    <input type="submit" class="registration-button" id="confirmation_button" value="Отправить">
</form>

<script>
    $('#register_form').submit(function () {
        if (!$('#register_button').hasClass('disabled')) {
            if (cz_validated.run('group2')) {
                let fields = {};
                $('#register_form').find('input').each(function () {
                    fields[this.name] = $(this).val();
                });
                fields.sessid = BX.bitrix_sessid();
                fields.siteId = 's1';
                fields.templateName = 'main';

                $('#register_button').addClass('disabled');
                $.ajax({
                    url: '<?=$arParams['PATH']?>/ajax.php',
                    method: 'POST',
                    data: fields,
                    success: function (data) {
                        data = JSON.parse(data);
                        if (data.success == false) {
                            $('.error.reg').html(data.message);
                            $('.error.reg').addClass('visible');
                            setForgotCountdown();
                        } else {

                            $('#register_form').css('display', 'none');
                            $('#confirm_form').css('display', 'block')

                        }
                        $('#register_button').removeClass('disabled');
                    }
                });
            }
        }
        return false;
    })
    $('#confirm_form').on('submit', function (){
        if (!$('#confirmation_button').hasClass('disabled')) {
            $('#confirm_form').addClass('disabled');
            let fields = {};
            let code = $('#confirm_form [name="code"]').val()
            let phone = $('#register_form [name="phone"]').val()
            fields.code = code;
            fields.phone = phone;
            fields.sessid = BX.bitrix_sessid();
            fields.siteId = 's1';
            fields.templateName = 'main';
            fields.activate = 'Y';

            $.ajax({
                url: '<?=$arParams['PATH']?>/ajax.php',
                method: 'POST',
                data: fields,
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.success == false) {
                        $('.error.confirm').html(data.message);
                        $('.error.confirm').addClass('visible');
                    } else {
                        <?if ($arParams['FROM_BASKET'] != 'Y'):?>
                            window.location.href = '/personal_section/';
                        <?else:?>
                            window.location.reload()
                        <?endif?>
                    }
                    $('#confirmation_button').removeClass('disabled');
                }
            });
        }
        return false;
    })
    function setForgotCountdown() {
        $('.sendAgain a').addClass('disabled');
        var num = 180; //количество секунд
        var index = num;
        var timerId = setInterval(function () {
            --index;
            let seconds = index % 60;
            let minutes = Math.floor(index / 60);
            $('.sendAgain .timer .seconds').html(('0' + seconds).slice(-2));
            $('.sendAgain .timer .minutes').html(('0' + minutes).slice(-2));
        }, 1000);
        setTimeout(function () {
            clearInterval(timerId);
            $('.sendAgain a').removeClass('disabled');
        }, num * 1000);
    }
    $('.sendAgain a').on('click', function () {
        if (!$(this).hasClass('disabled')) {
            setForgotCountdown();
            let fields = {
                'sendAgain': 'Y',
                'phone': $('form [name="phone"]').val()
            };
            fields.sessid = BX.bitrix_sessid();
            fields.siteId = 's1';
            fields.templateName = 'main';
            fields.send_again = 'Y';
            console.log('fields', fields);
            $.ajax({
                url: '<?=$arParams['PATH']?>/ajax.php',
                method: 'POST',
                data: fields,
                success: function (data) {
                    data = JSON.parse(data);
                    console.log('data', data);
                    if (data.success == false) {
                        $('.error').html(data.message);
                        $('.error').addClass('visible');
                    }
                }
            });
        }
    })
</script>