<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
if ($_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW_ID'] && $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] == 'delivery_moscow') {
    $res = \Bitrix\Sale\Location\LocationTable::getList(array(
        'filter' => array('=NAME.LANGUAGE_ID' => LANGUAGE_ID, 'ID' => $_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW_ID']),
        'select' => array('NAME_RU' => 'NAME.NAME')
    ));
    if ($item = $res->fetch()) {
        $_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW'] = $item['NAME_RU'];
    }
}


if ($USER->IsAuthorized() || $arParams["ALLOW_AUTO_REGISTER"] == "Y") {
    if ($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y") {
        if (strlen($arResult["REDIRECT_URL"]) > 0) {
            $APPLICATION->RestartBuffer();
            ?>
            <script type="text/javascript">
                window.top.location.href = '<?=CUtil::JSEscape($arResult["REDIRECT_URL"])?>';
            </script>
            <?
            die();
        }

    }
}

?>

<a name="order_form"></a>


<NOSCRIPT>
    <div class="errortext"><?= GetMessage("SOA_NO_JS") ?></div>
</NOSCRIPT>

<?
if (!function_exists("getColumnName")) {
    function getColumnName($arHeader)
    {
        return (strlen($arHeader["name"]) > 0) ? $arHeader["name"] : GetMessage("SALE_" . $arHeader["id"]);
    }
}

if (!function_exists("cmpBySort")) {
    function cmpBySort($array1, $array2)
    {
        if (!isset($array1["SORT"]) || !isset($array2["SORT"]))
            return -1;

        if ($array1["SORT"] > $array2["SORT"])
            return 1;

        if ($array1["SORT"] < $array2["SORT"])
            return -1;

        if ($array1["SORT"] == $array2["SORT"])
            return 0;
    }
}
?>

<?
if (!$USER->IsAuthorized() && $arParams["ALLOW_AUTO_REGISTER"] == "N") {
    if (!empty($arResult["ERROR"])) {
        foreach ($arResult["ERROR"] as $v)
            echo ShowError($v);
    } elseif (!empty($arResult["OK_MESSAGE"])) {
        foreach ($arResult["OK_MESSAGE"] as $v)
            echo ShowNote($v);
    }

    include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/auth.php");
} else {
    if ($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y") {
        if (strlen($arResult["REDIRECT_URL"]) == 0) {
            include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/cz_confirm.php");
        }
    } else {
        if(!$_SESSION['CZ_ORDER']['DELIVERY']['TYPE']) {
            LocalRedirect('/personal_section/cart/order_address/');
        }
        ?>
        <script type="text/javascript">

            <?if(CSaleLocation::isLocationProEnabled()):?>

            <?
            // spike: for children of cities we place this prompt
            $city = \Bitrix\Sale\Location\TypeTable::getList(array('filter' => array('=CODE' => 'CITY'), 'select' => array('ID')))->fetch();
            ?>

            BX.saleOrderAjax.init(<?=CUtil::PhpToJSObject(array(
                'source' => $this->__component->getPath() . '/get.php',
                'cityTypeId' => intval($city['ID']),
                'messages' => array(
                    'otherLocation' => '--- ' . GetMessage('SOA_OTHER_LOCATION'),
                    'moreInfoLocation' => '--- ' . GetMessage('SOA_NOT_SELECTED_ALT'), // spike: for children of cities we place this prompt
                    'notFoundPrompt' => '<div class="-bx-popup-special-prompt">' . GetMessage('SOA_LOCATION_NOT_FOUND') . '.<br />' . GetMessage('SOA_LOCATION_NOT_FOUND_PROMPT', array(
                            '#ANCHOR#' => '<a href="javascript:void(0)" class="-bx-popup-set-mode-add-loc">',
                            '#ANCHOR_END#' => '</a>'
                        )) . '</div>'
                )
            ))?>);

            <?endif?>

            var BXFormPosting = false;

            function submitForm(val) {
                $('#hidepanel').show();
                if (BXFormPosting === true)
                    return true;

                BXFormPosting = true;
                if (val != 'Y')
                    BX('confirmorder').value = 'N';

                var orderForm = BX('ORDER_FORM');
                BX.showWait();

                <?if(CSaleLocation::isLocationProEnabled()):?>
                BX.saleOrderAjax.cleanUp();
                <?endif?>

                BX.ajax.submit(orderForm, ajaxResult);

                return true;
            }

            function ajaxResult(res) {
                $('#hidepanel').hide();
                var orderForm = BX('ORDER_FORM');
                try {
                    // if json came, it obviously a successfull order submit

                    var json = JSON.parse(res);
                    BX.closeWait();

                    if (json.error) {
                        BXFormPosting = false;
                        return;
                    } else if (json.redirect) {
                        window.top.location.href = json.redirect;
                    }
                } catch (e) {
                    // json parse failed, so it is a simple chunk of html

                    BXFormPosting = false;
                    // BX('order_form_content').innerHTML = res;
                    // ЧЕРТ ЕГО ЗНАЕТ ПОЧЕМУ
                    BX('ORDER_FORM').innerHTML = res;
                    <?if(CSaleLocation::isLocationProEnabled()):?>
                    BX.saleOrderAjax.initDeferredControl();
                    <?endif?>
                }

                BX.closeWait();
                BX.onCustomEvent(orderForm, 'onAjaxSuccess');
            }

            function SetContact(profileId) {
                BX("profile_change").value = "Y";
                submitForm();
            }
        </script>
        <? if ($_POST["is_ajax_post"] != "Y")
    {
        ?>
        <form action="<?= $APPLICATION->GetCurPage(); ?>" method="POST" name="ORDER_FORM" id="ORDER_FORM"
              enctype="multipart/form-data">
            <?= bitrix_sessid_post() ?>
            <?
            }
            else {
                $APPLICATION->RestartBuffer();
            }

            if ($_REQUEST['PERMANENT_MODE_STEPS'] == 1) {
                ?>
                <input type="hidden" name="PERMANENT_MODE_STEPS" value="1"/>
                <?
            }


            //include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/cz_summary.php");
            ?>
            <div class="wrapp-step-cart">
                <div class="container">
                    <ul>
                        <li><span class="name-step">Начало</span> <span class="count-step">1</span></li>
                        <li><span class="name-step">Адрес доставки</span><span class="count-step">2</span></li>
                        <li><span class="name-step">Дата доставки</span><span class="count-step">3</span></li>
                        <li><span class="name-step">Способ оплаты</span><span class="count-step">4</span></li>
                        <li class="selected"><span class="name-step">Подтверждение заказа</span><span
                                    class="count-step">5</span></li>
                    </ul>
                </div>
            </div>

            <div class="wrapp-registration-order page-date-delivery-cart">
                <div class="container">
                    <div class="workarea-registration-order">
                        <div class="left-column-registration-order">
                            <div class="wrapp-confirm-order">
                                <div class="list-info-confirm">
                                    <?
                                    if (!empty($arResult["ERROR"]) && $arResult["USER_VALS"]["FINAL_STEP"] == "Y") {
                                        foreach ($arResult["ERROR"] as $v)
                                            echo ShowError($v);
                                        ?>
                                        <script type="text/javascript">
                                            top.BX.scrollToNode(top.BX('ORDER_FORM'));
                                        </script>
                                        <?
                                    }
                                    ?>
                                    <? include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/panes/cz_check.php") ?>
                                    <? include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/panes/cz_person.php") ?>
                                    <? include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/panes/cz_delivery.php") ?>
                                    <? include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/panes/cz_payment.php") ?>

                                </div>
                                <div class="form-checkbox">
                                    <div class="wrapp-checkbox">
                                        <input type="hidden" name="ORDER_PROP_10" value="N">
                                        <input type="checkbox" id="check0" checked name="ORDER_PROP_10" value="Y">
                                        <label for="check0">Я согласен получать информационую рассылку о новинках,
                                            cкидках и спецпредложениях</label>
                                    </div>
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" id="check1" checked data-cz-validated-type="checkbox" data-cz-validated-group="group_order">
                                        <label for="check1">Принимаю положения <a href="/confidentiality/">Политики
                                                конфиденциальности</a>, <a href="/public_offer/">Пользовательского
                                                соглашения</a> и <a href="/public_offer/">Публичной оферты</a>.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-cart-bottom last-step">
                                <span class="next-step-cart confirm-order-btn">
                                    <a href="javascript:void();" id="ORDER_CONFIRM_BUTTON">
                                        <?/*if($_SESSION['CZ_ORDER']['DELIVERY']['PAYSYSTEM_ID'] == '3'):?>
                                            <span class="btn-trans">Оплатить</span>
                                            <span class="btn-anim">Оплатить</span>
                                        <?else:*/?>
                                            <span class="btn-trans">Заказ подтверждаю</span>
                                            <span class="btn-anim">Заказ подтверждаю</span>
                                        <?//endif?>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <?
                        include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/cz_summary.php");
                        ?>
                    </div>
                </div>
            </div>


            <?
            if (strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0)
                echo $arResult["PREPAY_ADIT_FIELDS"];
            ?>
            <? if ($_POST["is_ajax_post"] != "Y")
            {
            ?>
            <input type="hidden" name="confirmorder" id="confirmorder" value="Y">
            <input type="hidden" name="profile_change" id="profile_change" value="N">
            <input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y">
            <input type="hidden" name="json" value="Y">
        </form>
        <?
        if ($arParams["DELIVERY_NO_AJAX"] == "N") {
            ?>
            <div style="display:none;"><? $APPLICATION->IncludeComponent("bitrix:sale.ajax.delivery.calculator", "", array(), null, array('HIDE_ICONS' => 'Y')); ?></div>
            <?
        }
    }
    else {
        ?>
        <script type="text/javascript">
            top.BX('confirmorder').value = 'Y';
            top.BX('profile_change').value = 'N';
        </script>
        <?
        die();
    }
    }
}
?>


<? if (CSaleLocation::isLocationProEnabled()): ?>

    <div style="display: none">
        <? // we need to have all styles for sale.location.selector.steps, but RestartBuffer() cuts off document head with styles in it?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:sale.location.selector.steps",
            ".default",
            array(),
            false
        ); ?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:sale.location.selector.search",
            ".default",
            array(),
            false
        ); ?>
    </div>

<? endif ?>
<div id='hidepanel' style="display:none;"></div>
<script>
    jQuery(function ($) {
        initForm();
    });
    // BX.addCustomEvent('onAjaxSuccess', function () {
    //     initForm();
    // });

    function initForm() {
        styleForm();
        actionFrom();
        inBasketEvent();
    }

    function styleForm() {
        $("input[data-cz-telefon='Y']").mask("+7(999)999-99-99");

        var locationPropID = $("#location_prop").val();
        if (locationPropID !== undefined) {
            var el = $(locationPropID);
            el.attr("data-cz-validated-type", "data");
            el.attr("data-cz-validated-group", "group_order_delivery");
            el.attr("data-cz-validated-msg", "* Необходимо заполнить поле Регион доставки");
        }
    }

    function actionFrom() {
        $("#ORDER_CONFIRM_BUTTON").click(function () {
            var validBaseFields = cz_validated.run('group_order');
            var validDeliveryFields = deliveryValidate();
            if (validBaseFields && validDeliveryFields) {
                ym(31362968,'reachGoal','zakaz-podtverzjdau');
                gtag('event', 'zakaz-podtverzjdau', {'event_category': 'Korzina'});
                submitForm('Y');
            }
            return false;
        });
    }

    function deliveryValidate() {
        var result = true;
        var validAdress = $("#delivery_adress_valid").val();
        if (validAdress == "Y") {
            result = cz_validated.run('group_order_delivery');
        }
        return result;
    }

    BX.ready(function () {
        loader = BX('ajax-preloader-wrap');
        BX.showWait = function (node, msg) {
            BX.style(loader, 'display', 'none');
        };
    });

    function promoCodeButton(event) {
        event.preventDefault();
        let promoCode = $('#promocode').val();
        if (promoCode) {
            promoCodeUse(promoCode);
        }
    }

    $('.coupon-delete').on('click', function (event) {
        event.preventDefault();
        let coupon = $(this).data('coupon');
        promoCodeDelete(coupon);
    });

    function promoCodeUse(promoCode) {
        $.ajax({
            url: "/local/ajax/promocode.php?action=set_promo_code&promo_code=" + promoCode,
            cache: false,
            success: function (data) {
                promoCodeAfter(JSON.parse(data));
            }
        });
    }

    function promoCodeAfter(data) {
        if (data['RESULT'] != 'OK') {
            if (data['RESULT'] != 'OK') {
                $('#promocode_result p').html(data['MESSAGE']);
            }
        } else {
            submitForm();
        }
    }

    function promoCodeDelete(promoCode) {
        $.ajax({
            url: "/local/ajax/promocode.php?action=del_coupon&coupon=" + promoCode,
            cache: false,
            success: function () {
                submitForm();
            }
        });
    }
</script>
