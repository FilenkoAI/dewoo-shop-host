<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
global $USER;
if ($USER->IsAuthorized()) {
	LocalRedirect('/personal_section/');
}
?>

    <div class="title title-addresses-magazine">
        <div class="container">
            <h1>Регистрация</h1>
        </div>
    </div>
    <div class="wrapp-lk">
        <div class="container">
            <div class="block-lk">
                <div class="wrapp-personal-date">
                    <div class="info-user-lk">
                        <form id="reg_form" class="auth_form" method="post">

                            <div class="wrapp-field">
                                <label>ФИО</label>
                                <p><input type="text" name="name" autocomplete="off"></p>
                            </div>

                            <div class="wrapp-field">
                                <label>Номер телефона*</label>
                                <p><input type="text" name="phone" autocomplete="off" placeholder="+7 (999) 999-99-99"
                                          data-cz-validated-type="data" data-cz-validated-group="reg_group1"
                                          data-phone="yes_fastbuy"
                                          pattern="\+[0-9]\s?[\(][0-9]{3}[\)]\s?[0-9]{3}[-][0-9]{2}[-][0-9]{2}"></p>
                            </div>

                            <div class="wrapp-field">
                                <label>E-mail*:</label>
                                <p><input type="text" name="email" autocomplete="off" data-cz-validated-type="data"
                                          data-cz-validated-group="reg_group1"></p>
                                <p style="font-family: 'OpenSans-Regular', sans-serif;">Получать полезную информацию и
                                    уникальные предложения</p>
                            </div>

                            <div class="wrapp-field" id="reg_code_field" style="display: none">
                                <label>Код из СМС</label>
                                <p><input type="text" name="code" autocomplete="off" data-cz-validated-type="data"
                                          data-cz-validated-group="reg_group2"></p>
                            </div>

                            <div class="wrapp-field sendAgain sendAgain--reg" style="display: none">
                                <a href="javascript:void(0);" class="hoverUnderline">Отправить повторно
                                    <div class="timer">
                                        через:
                                        <div class="minutes">01</div>:<div class="seconds">00</div>
                                    </div>
                                </a>
                            </div>

                            <div class="auth error authorize">
                            </div>
                            <input type="submit" class="registration-button" name="register_submit_button"
                                   value="Отправить код по СМС" id="reg_button">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $('#reg_button').on('click', function (event) {
            event.preventDefault();
            $('#reg_form').submit();
        })


        $('#reg_form').on('submit', function (event) {
            event.preventDefault();
            if (cz_validated.run('reg_group1')) {
                if (!$(this).hasClass('disabled-button')) {

                    $(this).addClass('disabled-button');
					<?//если код еще не отправлен?>
                    if (!$(this).hasClass('message_sent')) {
                        let phone = $('#reg_form [name="phone"]').val();

                        BX.ajax.runAction('czebra:south.api.auth.sendCode', {
                            data: {
                                phone: phone,
                                register: 'Y'
                            }
                        }).then(
                            function (response) {
                                if (response.data.status == 'error') {
                                    $('#reg_form .auth.error').html(response.data.message);
                                    $('#reg_form .auth.error').addClass('visible');
                                } else {
                                    if (response.data[0].status === 'success') {
                                        if (!$('.sendAgain a').hasClass('disabled')) {
                                            setForgotCountdownReg();
                                        }
                                        $('#reg_code_field').css('display', 'block');
                                        $('#reg_form [name="name"], #reg_form [name="phone"], #reg_form [name="email"]').attr('readonly', true);
                                        $('#reg_form').addClass('message_sent');
                                        $('#reg_form .auth.error').html('');
                                        $('#reg_form .auth.error').removeClass('visible');
                                        $('#reg_form input[type="submit"]').val('Отправить');

                                    } else {
                                        if (response.data.message) {
                                            $('#reg_form .auth.error').html(response.data.message);
                                            $('#reg_form .auth.error').addClass('visible');
                                        } else {
                                            $('#reg_form .auth.error').html('Слишком много запросов. <br> Попробуйте позднее.');
                                            $('#reg_form .auth.error').addClass('visible');
                                        }
                                    }
                                }
                                $('#reg_form').removeClass('disabled-button')
                            }
                        );
                    } else {
						<?//если код уже отправлен?>
                        if (cz_validated.run('reg_group2')) {
                            let name = $('#reg_form [name="name"]').val();
                            let phone = $('#reg_form [name="phone"]').val();
                            let email = $('#reg_form [name="email"]').val();
                            let code = $('#reg_form [name="code"]').val();

                            BX.ajax.runAction('czebra:south.api.auth.register', {
                                data: {
                                    phone, name, email, code
                                }
                            }).then(
                                function (response) {
                                    console.log(response)
                                    if (response.data.status == 'error') {
                                        $('#reg_form .auth.error').html(response.data.message);
                                        $('#reg_form .auth.error').addClass('visible');
                                    } else {
                                        window.location.reload();
                                    }
                                    $('#reg_form').removeClass('disabled-button')
                                }
                            )
                        }

                    }

                }
            }
            return false;
        })

        function setForgotCountdownReg() {
            $('.sendAgain--reg').css('display', 'block');
            $('.sendAgain--reg a').addClass('disabled');
            var num = 60; //количество секунд
            var index = num;
            var timerId = setInterval(function () {
                if (index == num) {
                    --index;
                    $('.sendAgain--reg .timer .seconds').html('00');
                    $('.sendAgain--reg .timer .minutes').html('01');
                } else {
                    let seconds = index % 60;
                    let minutes = Math.floor(index / 60);
                    $('.sendAgain--reg .timer .seconds').html(('0' + seconds).slice(-2));
                    $('.sendAgain--reg .timer .minutes').html(('0' + minutes).slice(-2));
                    --index;
                }
            }, 1000);
            setTimeout(function () {
                clearInterval(timerId);
                $('.sendAgain--reg a').removeClass('disabled');
                $('.sendAgain--reg .timer .seconds').html('00');
                $('.sendAgain--reg .timer .minutes').html('01');
            }, num * 1000);
        }

        $('.sendAgain--reg a').on('click', function (event) {
            event.preventDefault();
            if (!$(this).hasClass('disabled')) {
                setForgotCountdownReg();
                let phone = $('#reg_form [name="phone"]').val();
                BX.ajax.runAction('czebra:south.api.auth.sendCode', {
                    data: {
                        phone: phone,
                        register: 'Y'
                    }
                });
            }
        })
        $('#reg_form [name="code"], #reg_form [name="phone"]').on('input', function () {
            $('#reg_form .auth.error').html('');
            $('#reg_form .auth.error').removeClass('visible');
        })
    </script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>