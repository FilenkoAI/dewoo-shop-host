<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>

<form id="forgot_form" class="forgot_form" method="post">
    <div class="forgot-stage stage_one active">
        <div class="wrapp-field phone-mask">
            <label>Номер телефона</label>
            <p><input type="text" name="phone" autocomplete="off" placeholder="+7 (999) 999-99-99"
                      data-cz-validated-type="data" data-cz-validated-group="group3" pattern="\+[0-9]\s?[\(][0-9]{3}[\)]\s?[0-9]{3}[-][0-9]{2}[-][0-9]{2}"></p>
        </div>
    </div>
    <div class="forgot-stage stage_two ">
        <div class="wrapp-field">
            <label>Код подтверждения:</label>
            <p>
                <input type="text" name="code" placeholder="Код подтвержения" data-cz-validated-type="data"
                       data-cz-validated-group="group4">
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
        <div class="wrapp-field">
            <label>Новый пароль:</label>
            <p><input type="password" name="newPassword" maxlength="255" autocomplete="off" data-cz-validated-type="data"
                      data-cz-validated-group="group4"></p>
        </div>
        <div class="wrapp-field">
            <label>Повторите пароль:</label>
            <p><input type="password" name="confirmPassword" maxlength="255" autocomplete="off" data-cz-validated-type="data"
                      data-cz-validated-group="group4"></p>
        </div>
    </div>
    <div class="auth error">
    </div>
    <input type="submit" class="registration-button" name="register_submit_button" value="Продолжить" id="forgot_button">
</form>

<script>
    $('#forgot_form').submit(function () {
        if (!$('#forgot_button').hasClass('disabled')) {

            let fields = {};
            $('#forgot_form').find('input').each(function () {
                fields[this.name] = $(this).val();
            });
            fields.sessid = BX.bitrix_sessid();
            fields.siteId = 's1';
            fields.templateName = 'main';
            if ($('.stage_one').hasClass('active')) {
                fields.sendCode = 'Y';
            }
            if (!$('#forgot_button').hasClass('stage_two')) {
                if (cz_validated.run('group3')) {
                    $('#forgot_button').addClass('disabled');
                    $.ajax({
                        url: '<?=$arParams['PATH']?>/ajax.php',
                        method: 'POST',
                        data: fields,
                        success: function (data) {
                            data = JSON.parse(data);
                            console.log(data)
                            if (data.success == false) {
                                $('.error').html(data.message);
                                $('.error').addClass('visible');
                            } else {
                                setForgotCountdown();
                                $('.error').removeClass('visible');
                                $('.stage_one').removeClass('active');
                                $('.stage_two').addClass('active');
                                $('#forgot_button').addClass('stage_two');
                            }
                            $('#forgot_button').removeClass('disabled');
                        }
                    });
                }
            } else {
                $('#forgot_button').addClass('disabled');
                if (cz_validated.run('group4')) {
                    $.ajax({
                        url: '<?=$arParams['PATH']?>/ajax.php',
                        method: 'POST',
                        data: fields,
                        success: function (data) {
                            data = JSON.parse(data);
                            console.log(data)
                            if (data.success == false) {
                                $('.error').html(data.message);
                                $('.error').addClass('visible');
                            } else {
                                window.location.href = '/auth/';
                            }
                            $('#forgot_button').removeClass('disabled');
                        }
                    });
                }
            }
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
    $('.forgot_form [name="phone"]').mask('+7 (999) 999 99 99');
</script>