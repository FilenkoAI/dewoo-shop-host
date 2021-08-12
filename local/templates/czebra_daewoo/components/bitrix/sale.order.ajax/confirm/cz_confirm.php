<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

?>

<div class="wrapp-txt">
    <div class="container">
        <h2 class="order-main-header">Спасибо, Ваш заказ принят!</h2>

		<? if ($arResult['PAY_SYSTEM']['PSA_NAME'] == 'Счет'): ?>
			<? foreach ($arResult["PAYMENT"] as $payment): ?>
				<? if ($payment['PAY_SYSTEM_NAME'] == 'Счет'): ?>
					<? $pdf = $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . $payment['ACCOUNT_NUMBER'] . "&pdf=1&DOWNLOAD=Y" ?>
					<? $link = $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . $arResult['ORDER_ID'] . "&PAYMENT_ID=" . $payment['ACCOUNT_NUMBER'] ?>
				<? endif ?>
			<? endforeach ?>
            <script>
                function PrintElem() {
                    let elem = 'result';
                    if (document.getElementById(elem).innerHTML) {
                        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
                        mywindow.document.write(document.getElementById(elem).innerHTML);
                        mywindow.document.close(); // necessary for IE >= 10
                        mywindow.focus(); // necessary for IE >= 10*/
                        mywindow.print();
                        mywindow.close();
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
            <div id="result" style="display: none"></div>
            <script>
                $('#result').load('<?=$link?>')
            </script>
            <div class="wrapp-btn-order">
                <button class="btn-order" onclick="PrintElem()">Распечатать</button>
                <a class="btn-order" href="<?= $pdf ?>" download>Скачать счет</a>
                <button class="btn-order" id="sendEmail">Отправить по почте</button>
            </div>
            <script>
                $('#sendEmail').on('click', function () {
                    if (!$(this).hasClass('disabled')) {
                        let account = $('#result').html();
                        if (account) {
                            BX.ajax.runAction('czebra:project.api.sendaccount.sendaccount', {
                                data: {
                                    orderId: <?=$arResult['ORDER_ID']?>,
                                    account: account
                                }
                            }).then((data) => {
                                if (data.data.status !== 'error') {
                                    $('#sendEmail').html('Отправлено');
                                } else {
                                    $('#sendEmail').html('Превышен лимит');
                                    $('#sendEmail').css('background', 'gray')
                                }
                                $('#sendEmail').addClass('disabled');


                            });
                        }
                    }
                })
            </script>

		<? endif ?>
        <p>Наши менеджеры свяжутся с вами в ближайшее время.</p>
        <p>Номер заказа: <?= $arResult['ORDER_ID'] ?></p>
        <p>Присоединитесь к нам в социальных сетях:</p>
        <div class="list-social">
            <a href="https://www.youtube.com/channel/UCNoSo5_n22ZU91I-h_KW4Vg" target="_blank"><img
                        src="<?= SITE_TEMPLATE_PATH ?>/front/img/mobil/yt-footer.svg" alt=""></a>
            <a href="https://vk.com/daewoopowerproducts" target="_blank"><img
                        src="<?= SITE_TEMPLATE_PATH ?>/front/img/mobil/vk-footer.svg" alt=""></a>
            <a href="https://www.instagram.com/daewoo_power_products/" target="_blank"><img
                        src="<?= SITE_TEMPLATE_PATH ?>/front/img/mobil/insta-footer.svg" alt=""></a>
            <a href="https://www.facebook.com/daewoopowerproductsrussia/" target="_blank"><img
                        src="<?= SITE_TEMPLATE_PATH ?>/front/img/mobil/fb-footer.svg" alt=""></a>
            <a href="https://ok.ru/group/52738602827857/" target="_blank"><img
                        src="<?= SITE_TEMPLATE_PATH ?>/front/img/odn.svg" alt=""></a>
        </div>

		<? if (!empty($arResult["ORDER"])): ?>
			<?
			if ($arResult["ORDER"]["IS_ALLOW_PAY"] === 'Y') {
				if (!empty($arResult["PAYMENT"])) {
					foreach ($arResult["PAYMENT"] as $payment) {
						if ($payment["PAID"] != 'Y') {
							if (!empty($arResult['PAY_SYSTEM_LIST'])
								&& array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
							) {
								$arPaySystem = $arResult['PAY_SYSTEM_LIST_BY_PAYMENT_ID'][$payment["ID"]];

								if (empty($arPaySystem["ERROR"])) {
									?>
									<? // убираем счет для того что бы вывести его в кнопках?>
									<? if ($arPaySystem['PSA_NAME'] != 'Счет'): ?>
                                        <br/><br/>

                                        <table class="sale_order_full_table">
                                            <tr>
                                                <td class="ps_logo">
                                                    <div class="pay_name h3"><?= Loc::getMessage("SOA_PAY") ?></div>
													<?= CFile::ShowImage($arPaySystem["LOGOTIP"], 100, 100, "border=0\"", "", false) ?>
                                                    <div class="paysystem_name"><?= $arPaySystem["NAME"] ?></div>
                                                    <br/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
													<? if ($arPaySystem["ACTION_FILE"] <> '' && $arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
														<?
														$orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
														$paymentAccountNumber = $payment["ACCOUNT_NUMBER"];
														?>
                                                        <script>
                                                            window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
                                                        </script>
													<?= Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . $orderAccountNumber . "&PAYMENT_ID=" . $paymentAccountNumber)) ?>
													<? if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']): ?>
                                                    <br/>
													<?= Loc::getMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . $orderAccountNumber . "&pdf=1&DOWNLOAD=Y")) ?>
													<? endif ?>
													<? else: ?>
													<?

                                                        if ($arPaySystem['ID'] == '3')
                                                        {
                                                            if ($_SESSION['ORDERS'][$arResult['ORDER_ID']]['PAYMENT_SEEN'] != 'Y')
                                                            {
                                                                $_SESSION['ORDERS'][$arResult['ORDER_ID']]['PAYMENT_SEEN'] = 'Y';
                                                                    ?>
                                                                    <script>
                                                                        $('.sale_order_full_table form').submit();
                                                                        $('#loader').css('display', 'flex');
                                                                    </script>
                                                                    <?
                                                            }
                                                        }

													?>
														<?= $arPaySystem["BUFFERED_OUTPUT"] ?>
													<? endif ?>
                                                </td>
                                            </tr>
                                        </table>
									<? endif; ?>

									<?
								} else {
									?>
                                    <span style="color:red;"><?= Loc::getMessage("SOA_ORDER_PS_ERROR") ?></span>
									<?
								}
							} else {
								?>
                                <span style="color:red;"><?= Loc::getMessage("SOA_ORDER_PS_ERROR") ?></span>
								<?
							}
						}
					}
				}
			} else {
				?>
                <br/><strong><?= $arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR'] ?></strong>
				<?
			}
			?>

		<? else: ?>

            <b><?= Loc::getMessage("SOA_ERROR_ORDER") ?></b>
            <br/><br/>

            <table class="sale_order_full_table">
                <tr>
                    <td>
						<?= Loc::getMessage("SOA_ERROR_ORDER_LOST", ["#ORDER_ID#" => htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"])]) ?>
						<?= Loc::getMessage("SOA_ERROR_ORDER_LOST1") ?>
                    </td>
                </tr>
            </table>

		<? endif ?>
    </div>
</div>