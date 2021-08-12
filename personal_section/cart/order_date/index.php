<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
$deliveryType = $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'];
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();

if($request['from_payment'] === 'Y'){
    LocalRedirect('/personal_section/cart/order_address/');
}

if($deliveryType === 'delivery' ){
    LocalRedirect('/personal_section/cart/order_payment/');
}

if($deliveryType === 'pickup' ){
    LocalRedirect('/personal_section/cart/order_payment/');
}

if(!$_SESSION['CZ_ORDER']['DELIVERY']['TYPE']) {
    LocalRedirect('/personal_section/cart/order_address/');
}
?>

<div class="wrapp-step-cart">
    <div class="container">
        <ul>
            <li><span class="name-step">Начало</span> <span class="count-step">1</span></li>
            <li><span class="name-step">Адрес доставки</span><span class="count-step">2</span></li>
            <li class="selected"><span class="name-step">Дата доставки</span><span class="count-step">3</span></li>
            <li><span class="name-step">Способ оплаты</span><span class="count-step">4</span></li>
            <li><span class="name-step">Подтверждение заказа</span><span class="count-step">5</span></li>
        </ul>
    </div>
</div>

<div class="wrapp-registration-order page-date-delivery-cart">
        <div class="container">
            <div class="workarea-registration-order">
                <div class="left-column-registration-order">
                    <div class="wrapp-date-delivery">
                        <div class="title-date-delivery">Выберите дату и время доставки</div>
                        <div class="wrapp-info-date">
                            <div class="calendar-delivery">
                                <div class="calendar"></div>
                            </div>
                            <?/*
                            <div class="time-delivery">

                                <div class="chart">
                                    <div class="circle circle1">
                                        <input type="radio" id="clock1" name="clock" value="9:00 - 11:00">
                                        <label for="clock1" class="sector1">
                                            <p> 09:00</p>
                                        </label>
                                    </div>
                                    <div class="circle circle2">
                                        <input type="radio" id="clock2" name="clock" value="11:00 - 13:00">
                                        <label for="clock2"  class="sector2">
                                            <p>11:00</p>
                                        </label>
                                    </div>
                                    <div class="circle circle3">
                                        <input type="radio" id="clock3" name="clock" value="13:00 - 15:00">
                                        <label for="clock3"  class="sector3">
                                            <p>13:00</p>
                                        </label>
                                    </div>
                                    <div class="circle circle4">
                                        <input type="radio" id="clock4" name="clock" value="15:00 - 17:00">
                                        <label for="clock4" class="sector4">
                                            <p>15:00</p>
                                        </label>
                                    </div>
                                    <div class="circle circle5">
                                        <input type="radio" id="clock5" name="clock" value="17:00 - 19:00">
                                        <label for="clock5" class="sector5">
                                            <p>17:00</p>
                                        </label>
                                    </div>
                                    <div class="circle circle6">
                                        <input type="radio" id="clock6" name="clock" value="19:00 - 21:00">
                                        <label for="clock6" class="sector6">
                                            <p><span>21:00</span> 19:00</p>
                                        </label>
                                    </div>
                                    <div class="img-clock">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/date-clock.svg" alt="">
                                    </div>
                                </div>
                            </div>
                             */?>
                        </div>
                        <div class="date-field">
                            <p>Дата доставки <span>-</span></p>
                        </div>
                        <?/*
                        <div class="time-field">
                            <p>Время доставки <span>-</span></p>
                        </div>
                        */?>
                    </div>
                    <form action="/personal_section/cart/order_payment/" method="post" id="order_date_form">
                        <input type="hidden" name="date" data-name="дату доставки" value="">
                    </form>
                    <div class="btn-cart-bottom">
                        <span class="back-step-cart">
                            <a href="/personal_section/cart/order_address/" >
                                <span class="btn-trans">Назад</span>
                                <span class="btn-anim">Назад</span>
                            </a>
                        </span>
                        <span class="next-step-cart" id="order_date_submit">
                            <a href="" onclick="submitHandler(event)">
                                <span class="btn-trans">Продолжить</span>
                                <span class="btn-anim">Продолжить</span>
                            </a>
                        </span>
                    </div>
                </div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket",
                    "order_params",
                    Array(
                        "ACTION_VARIABLE" => "action",
                        "AUTO_CALCULATION" => "Y",
                        "TEMPLATE_THEME" => "blue",
                        "COLUMNS_LIST" => array("NAME","DISCOUNT","WEIGHT","DELETE","DELAY","TYPE","PRICE","QUANTITY"),
                        "COMPONENT_TEMPLATE" => "bootstrap_v4",
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
                        "OFFERS_PROPS" => array("SIZES_SHOES","SIZES_CLOTHES"),
                        "PATH_TO_ORDER" => "/personal/order.php",
                        "PRICE_VAT_SHOW_VALUE" => "N",
                        "QUANTITY_FLOAT" => "N",
                        "SET_TITLE" => "Y",
                        "USE_GIFTS" => "Y",
                        "USE_PREPAYMENT" => "N"
                    )
                );?>
            </div>
        </div>
    </div>
    <div class="order-alert modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p></p>
                    <a href="javascript:void(0);" data-dismiss="modal" class="close-modal"></a>
                </div>
            </div>
        </div>
    </div>
    <?
        if ($_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] === 'delivery') {
            $dateMin  = \Czebra\Project\DeliveryCalendar\Calendar::calculateDate('delivery');
        } else {
            $dateMin  = \Czebra\Project\DeliveryCalendar\Calendar::calculateDate('pickup');
        }
    ?>
    <script>
        let date = new Date();
        let minDate = new Date(Date.parse('<?=$dateMin?>'));
        let maxDate = new Date(new Date(Date.parse('<?=$dateMin?>')).setMonth(date.getMonth() + 1));
        $('.calendar').datepicker({
            minDate: minDate,
            maxDate: maxDate,
            onSelect: function (data){
                if(data){
                    let months = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
                    let date = data.split('.');
                    let selectedDate = new Date(date[2] + '-' + date[1] + '-' + date[0]);
                    let day = selectedDate.getDate();
                    let month = months[selectedDate.getMonth()];
                    $('#order_date_form [name="date"]').val(data);
                    $('.date-field p span').html(day + ' ' + month);
                    BX.ajax.runAction('czebra:project.api.changeorderproperty.changedelivery', {
                        data: {
                            key: 'DATE',
                            val: selectedDate.getTime()
                        }
                    });
                }
            }
        });
        function submitHandler(event){
            event.preventDefault();
            if (!$('#order_date_form [name="date"]').val()){
                errorAlert("Выберите дату доставки");
                return false;
            } else {
                window.location.href = '/personal_section/cart/order_payment/'
                return true;
            }
        }
        // $('#order_date_submit').on('click', function (event){
        //     event.preventDefault();
        //     if(submitHandler()){
        //         $('#order_date_form').submit();
        //     }
        // })
    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>