<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("");
?>
<?
if (!Bitrix\Main\Loader::includeModule("sale")) {
	return false;
}
global $USER;
$cartItemsCount = CSaleBasket::GetList(false, array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"), false, false, array("ID"))->SelectedRowsCount();
$showUserForm = $USER->IsAuthorized() ? false : true;
?>
    <div class="wrapp-step-cart">
        <div class="container">
            <ul>
                <li class="selected"><span class="name-step">Начало</span> <span class="count-step">1</span></li>
                <li><span class="name-step">Адрес доставки</span><span class="count-step">2</span></li>
                <li><span class="name-step">Дата доставки</span><span class="count-step">3</span></li>
                <li><span class="name-step">Способ оплаты</span><span class="count-step">4</span></li>
                <li><span class="name-step">Подтверждение заказа</span><span class="count-step">5</span></li>
            </ul>
        </div>
    </div>

    <div class="wrapp-cart first-step">
        <div class="container">
			<? $APPLICATION->IncludeComponent(
				"bitrix:sale.basket.basket",
				"first_step_list",
				array(
					"ACTION_VARIABLE" => "action",
					"AUTO_CALCULATION" => "Y",
					"TEMPLATE_THEME" => "blue",
					"COLUMNS_LIST" => array(
						0 => "NAME",
						1 => "DISCOUNT",
						2 => "WEIGHT",
						3 => "DELETE",
						4 => "DELAY",
						5 => "TYPE",
						6 => "PRICE",
						7 => "QUANTITY",
					),
					"COMPONENT_TEMPLATE" => "first_step_list",
					"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
					"GIFTS_CONVERT_CURRENCY" => "Y",
					"GIFTS_HIDE_BLOCK_TITLE" => "N",
					"GIFTS_HIDE_NOT_AVAILABLE" => "N",
					"GIFTS_MESS_BTN_BUY" => "Выбрать",
					"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
					"GIFTS_PAGE_ELEMENT_COUNT" => "4",
					"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
					"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "",
					"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
					"GIFTS_SHOW_IMAGE" => "Y",
					"GIFTS_SHOW_NAME" => "Y",
					"GIFTS_SHOW_OLD_PRICE" => "Y",
					"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
					"GIFTS_PLACE" => "BOTTOM",
					"HIDE_COUPON" => "N",
					"OFFERS_PROPS" => array(
						0 => "SIZES_SHOES",
						1 => "SIZES_CLOTHES",
					),
					"PATH_TO_ORDER" => "/personal/order.php",
					"PRICE_VAT_SHOW_VALUE" => "N",
					"QUANTITY_FLOAT" => "N",
					"SET_TITLE" => "Y",
					"USE_GIFTS" => "Y",
					"USE_PREPAYMENT" => "N",
					"USE_ENHANCED_ECOMMERCE" => "Y",
					"DEFERRED_REFRESH" => "N",
					"USE_DYNAMIC_SCROLL" => "Y",
					"SHOW_FILTER" => "Y",
					"SHOW_RESTORE" => "Y",
					"COLUMNS_LIST_EXT" => array(
						0 => "PREVIEW_PICTURE",
						1 => "DISCOUNT",
						2 => "DELETE",
						3 => "DELAY",
						4 => "TYPE",
						5 => "SUM",
					),
					"COLUMNS_LIST_MOBILE" => array(
						0 => "PREVIEW_PICTURE",
						1 => "DISCOUNT",
						2 => "DELETE",
						3 => "DELAY",
						4 => "TYPE",
						5 => "SUM",
					),
					"TOTAL_BLOCK_DISPLAY" => array(
						0 => "top",
					),
					"DISPLAY_MODE" => "extended",
					"PRICE_DISPLAY_MODE" => "Y",
					"SHOW_DISCOUNT_PERCENT" => "Y",
					"DISCOUNT_PERCENT_POSITION" => "bottom-right",
					"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
					"USE_PRICE_ANIMATION" => "Y",
					"LABEL_PROP" => array(),
					"CORRECT_RATIO" => "Y",
					"COMPATIBLE_MODE" => "Y",
					"EMPTY_BASKET_HINT_PATH" => "/",
					"ADDITIONAL_PICT_PROP_24" => "-",
					"BASKET_IMAGES_SCALING" => "adaptive",
					"DATA_LAYER_NAME" => "dataLayer",
					"BRAND_PROPERTY" => "PROPERTY_CML2_MANUFACTURER"
				),
				false
			); ?>

			<? if ($showUserForm): ?>
                <div class="form-users-cart">
                    <div class="new-user-form">
                        <div class="title-user-form">Новый пользователь</div>

                        <form id="reg_form" class="auth_form" method="post">

                            <div class="wrapp-field">
                                <label>ФИО*</label>
                                <p><input type="text" name="name" autocomplete="off" data-cz-validated-type="data"
                                          data-cz-validated-group="reg_group1"></p>
                            </div>

                            <div class="wrapp-field">
                                <label>Номер телефона*</label>
                                <p><input type="text" name="phone" autocomplete="off" placeholder="+7 (999) 999-99-99"
                                          data-cz-validated-type="data" data-cz-validated-group="reg_group1" data-phone="yes_fastbuy" pattern="\+[0-9]\s?[\(][0-9]{3}[\)]\s?[0-9]{3}[-][0-9]{2}[-][0-9]{2}"></p>
                            </div>

                            <div class="wrapp-field">
                                <label>E-mail</label>
                                <p><input type="text" name="email" autocomplete="off" ></p>
                                <?/*p style="font-family: 'OpenSans-Regular', sans-serif;">Получать полезную информацию и
                                    уникальные предложения</p*/?>
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
                                   value="Получить код по СМС" id="reg_button">
                        </form>
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
                                        if(!$(this).hasClass('message_sent')){
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
                                                            window.location = '/personal_section/cart/order_address/'
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
                            $('#reg_form [name="code"], #reg_form [name="phone"]').on('input', function (){
                                $('#reg_form .auth.error').html('');
                                $('#reg_form .auth.error').removeClass('visible');
                            })
                        </script>
                    </div>
                    <div class="login-user-form">
                        <div class="title-user-form active" >Зарегистрированный пользователь</div>

                        <form id="auth_form" class="auth_form" method="post">
                            <div class="wrapp-field">
                                <label>Номер телефона</label>
                                <p><input type="text" name="phone" autocomplete="off" placeholder="+7 (999) 999-99-99" data-cz-validated-type="data" data-cz-validated-group="group1" data-phone="yes_fastbuy" pattern="\+[0-9]\s?[\(][0-9]{3}[\)]\s?[0-9]{3}[-][0-9]{2}[-][0-9]{2}"></p>
                            </div>

                            <div class="auth error authorize" >
                            </div>
                            <input type="submit" class="registration-button" name="register_submit_button" value="Получить код по СМС" id="auth_button">
                        </form>

                        <form id="confirm_form" class="auth_form disabled" method="post">
                            <div class="wrapp-field">
                                <label>Код из СМС</label>
                                <p><input type="text" name="code" autocomplete="off"  data-cz-validated-type="data" data-cz-validated-group="group2"></p>
                            </div>

                            <div class="wrapp-field sendAgain">
                                <a href="javascript:void(0);" class="hoverUnderline">Отправить повторно
                                    <div class="timer">
                                        через:
                                        <div class="minutes">01</div>:<div class="seconds">00</div>
                                    </div>
                                </a>
                            </div>

                            <div class="error send_code" >
                            </div>
                            <input type="submit" class="registration-button" name="register_submit_button" value="Отправить" id="confirm_button">
                        </form>
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
                                            if (response.data.STATUS == 'N'){
                                                if(response.data.MESSAGE){
                                                    $('#confirm_form .error.send_code').html(response.data.MESSAGE);
                                                    $('#confirm_form .error.send_code').addClass('visible');
                                                } else {
                                                    // $('.error.send_code').html('Неверный код подтвержения');
                                                    // $('.error.send_code').addClass('visible');
                                                }

                                            } else {
                                                window.location = '/personal_section/cart/order_address/'
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
                    </div>
                </div>
			<? endif ?>
			<? if ($cartItemsCount > 0): ?>
                <div class="btn-cart-bottom" style="<?= $showUserForm ? '' : 'border-top: none' ?>">
					<? if ($USER->IsAuthorized() && $USER->GetFullName()): ?>
						<?
						$name = $USER->GetFullName();
						$phone = \Bitrix\Main\UserPhoneAuthTable::getRowById($USER->GetId())['PHONE_NUMBER'];

						?>
                        <span class="quick-order">
                        <a href="javascript:void()" onclick="trueQuickOrder('<?= $name ?>', '<?= $phone ?>')">
                            <span class="btn-trans">Быстрый заказ</span>
                            <span class="btn-anim">Быстрый заказ</span>
                        </a>
                    </span>
					<? else: ?>
                        <span class="quick-order">
                        <a href="#" onclick="quickOrder(event, '')">
                            <span class="btn-trans">Быстрый заказ</span>
                            <span class="btn-anim">Быстрый заказ</span>
                        </a>
                    </span>
					<? endif; ?>
                    <span class="next-step-cart">
                    <?
                    $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
                    $link = $request['from_confirm'] === 'Y' ? "/personal_section/cart/order_confirm/" : "/personal_section/cart/order_address/";
                    ?>
                    <a href="<?= $link ?>">
                        <span class="btn-trans">Продолжить</span>
                        <span class="btn-anim">Продолжить</span>
                    </a>
                </span>
                </div>
			<? endif; ?>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>