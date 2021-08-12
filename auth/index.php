<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
global $USER;
if ($USER->IsAuthorized()){
    LocalRedirect('/personal_section/');
}
?>
    <div class="title title-addresses-magazine">
        <div class="container">
            <h1><?=$APPLICATION->ShowTitle()?></h1>
        </div>
    </div>
    <div class="wrapp-lk">
        <div class="container">
            <div class="block-lk">
                <div class="wrapp-personal-date">
                    <div class="info-user-lk">

                        <form id="auth_form" class="auth_form" method="post">
                            <div class="wrapp-field">
                                <label>Номер телефона</label>
                                <p><input type="text" name="phone" autocomplete="off" placeholder="+7 (999) 999-99-99" data-cz-validated-type="data" data-cz-validated-group="group1" data-phone="yes_fastbuy" pattern="\+[0-9]\s?[\(][0-9]{3}[\)]\s?[0-9]{3}[-][0-9]{2}[-][0-9]{2}"></p>
                            </div>
                            <div class="auth error authorize" >
                            </div>
                            <input type="submit" class="registration-button" name="register_submit_button" value="Отправить код по СМС" id="auth_button">
                        </form>

                        <form id="confirm_form" class="auth_form disabled" method="post">
                            <div class="wrapp-field">
                                <label>Код из СМС</label>
                                <p><input type="text" name="code" autocomplete="off"  data-cz-validated-type="data" data-cz-validated-group="group2" ></p>
                            </div>

                            <div class="wrapp-field sendAgain">
                                <a href="javascript:void(0);" class="hoverUnderline">Отправить повторно
                                    <div class="timer">
                                        через:
                                        <div class="minutes">01</div>
                                        :
                                        <div class="seconds">00</div>
                                    </div>
                                </a>
                            </div>

                            <div class="error send_code" >
                            </div>
                            <input type="submit" class="registration-button" name="register_submit_button" value="Отправить" id="confirm_button">
                        </form>
                        <noindex>
                            <div class="back-link-register">
                                <a href="/auth/registration/" rel="nofollow">Зарегистрироваться</a><br>
                            </div>
                        </noindex>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // кнопка отправки телефона
        $('#auth_button').on('click', function (event){
            event.preventDefault();
            $('#auth_form').submit();
        })
        $('#auth_form').on('submit', function (event) {
            event.preventDefault();
            if (cz_validated.run('group1')) {
                console.log('validated1')
                if (!$(this).hasClass('disabled-button')) {
                    $(this).addClass('disabled-button');
                    // можно отправлять
                    let phone = $('#auth_form [name="phone"]').val();

                    BX.ajax.runAction('czebra:south.api.auth.sendCode', {
                        data: {
                            phone: phone,
                        }
                    }).then(
                        function (response) {
                            if(response.data.status == 'error'){
                                $('#auth_form .auth.error').html(response.data.message);
                                $('#auth_form .auth.error').addClass('visible');
                            } else {
                                if (response.data[0].status === 'success') {
                                    if (!$('#confirm_form .sendAgain a').hasClass('disabled')) {
                                        setForgotCountdown();
                                    }

                                    $('#auth_form').addClass('disabled');
                                    $('#confirm_form').removeClass('disabled');
                                } else {
                                    if (response.data.message){
                                        $('#auth_form .auth.error').html(response.data.message);
                                        $('#auth_form .auth.error').addClass('visible');
                                    } else{
                                        $('#auth_form .auth.error').html('Слишком много запросов. <br> Попробуйте позднее.');
                                        $('#auth_form .auth.error').addClass('visible');
                                    }
                                }
                            }

                            $('#auth_form').removeClass('disabled-button')
                        }
                    );

                }
            }

            return false;
        })
        // кнопка отправки кода
        $('#confirm_form').on('submit', function (event) {
            event.preventDefault();

            let phone = $('#auth_form [name="phone"]').val();
            let code = $('#confirm_form [name="code"]').val();
            console.log('phone -' + phone, 'code - ' + code )
            if (cz_validated.run('group2')) {

                BX.ajax.runAction('czebra:south.api.auth.checkcode', {
                    data: {
                        phone: phone,
                        code: code
                    }
                }).then(
                    function (response) {
                        console.log(response)
                        if (response.data.STATUS == 'N'){
                            if(response.data.MESSAGE){
                                $('#confirm_form .error.send_code').html(response.data.MESSAGE);
                                $('#confirm_form .error.send_code').addClass('visible');
                            } else {
                                // $('.error.send_code').html('Неверный код подтвержения');
                                // $('.error.send_code').addClass('visible');
                            }

                        } else {
                            window.location.reload();
                        }

                    }
                );
            }

        })

        function setForgotCountdown() {
            $('#confirm_form .sendAgain a').addClass('disabled');
            var num = 60; //количество секунд
            var index = num;
            var timerId = setInterval(function () {
                if (index == num){
                    --index;
                    $('#confirm_form .sendAgain .timer .seconds').html('00');
                    $('#confirm_form .sendAgain .timer .minutes').html('01');
                } else {
                    let seconds = index % 60;
                    let minutes = Math.floor(index / 60);
                    $('#confirm_form .sendAgain .timer .seconds').html(('0' + seconds).slice(-2));
                    $('#confirm_form .sendAgain .timer .minutes').html(('0' + minutes).slice(-2));
                    --index;
                }
            }, 1000);
            setTimeout(function () {
                clearInterval(timerId);
                $('#confirm_form .sendAgain a').removeClass('disabled');
                $('#confirm_form .sendAgain .timer .seconds').html('00');
                $('#confirm_form .sendAgain .timer .minutes').html('01');
            }, num * 1000);
        }

        $('#confirm_form .sendAgain a').on('click', function (event) {
            event.preventDefault();
            if (!$(this).hasClass('disabled')) {
                setForgotCountdown();
                let phone = $('#auth_form [name="phone"]').val();
                BX.ajax.runAction('czebra:south.api.auth.sendCode', {
                    data: {
                        phone: phone,
                    }
                });
            }
        })
        $('#auth_form [name="phone"]').on('input', function (){
            $('#auth_form .auth.error').html('');
            $('#auth_form .auth.error').removeClass('visible');
        })

        $('#confirm_form [name="code"]').on('input', function (){
            $('#confirm_form .error.send_code').html('');
            $('#confirm_form .error.send_code').removeClass('visible');
        })

    </script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>