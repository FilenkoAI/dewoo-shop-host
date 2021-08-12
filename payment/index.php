<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Оплата");
?><div class="title payment-title">
	<div class="container">
		<h1><img src="/local/templates/czebra_daewoo/front/img/payment/icon-title.png" alt="">Оплата</h1>
	</div>
</div>
<div class="wrapp-payment">
	<div class="container">
		<p class="prev-text">
			 Заплатить за купленный в магазине товар Вы можете любым удобным способом:
		</p>
		<div class="wrapp-column-payment">
			<div class="left-column-payment">
				<div class="caption-column">
					 Физическим лицам
				</div>
				<div class="list-column-payment">
					 <? /*
                        <div class="item-column-payment">
                            <div class="img-column-payment">
                                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/payment/time-is-money.svg" alt="">
                            </div>
                            <div class="info-column-payment">
                                <div class="title-item">Купить в рассрочку</div>
                                <div class="descr-item">Покупайте сейчас — платите потом, без первого взноса и переплат.</div>
                            </div>
                        </div>
                        */ ?>
					<div class="item-column-payment">
						<div class="img-column-payment">
 <img src="/local/templates/czebra_daewoo/front/img/payment/card.svg" alt="">
						</div>
						<div class="info-column-payment">
							<div class="title-item">
								 Онлайн оплата без комиссии
							</div>
							<div class="descr-item">
								 Моментальная оплата Вашего заказа при помощи банковской карты, не отходя от компьютера.
							</div>
						</div>
					</div>
					<div class="item-column-payment">
						<div class="img-column-payment">
 <img src="/local/templates/czebra_daewoo/front/img/payment/wallet.svg" alt="">
						</div>
						<div class="info-column-payment">
							<div class="title-item">
								 Наличными курьеру
							</div>
							<div class="descr-item">
								 Вы можете оплатить заказ нашему курьеру, непосредственно в момент доставки.
							</div>
						</div>
					</div>
					<div class="item-column-payment">
						<div class="img-column-payment">
 <img src="/local/templates/czebra_daewoo/front/img/payment/card-user.svg" alt="">
						</div>
						<div class="info-column-payment">
							<div class="title-item">
								 Банковской картой по ссылке
							</div>
							<div class="descr-item">
								 Вы можете оплатить заказ нашему курьеру, непосредственно в момент доставки, по сгенерированной ссылке и высланной Вам на эл. адрес почты.
							</div>
						</div>
					</div>
					<div class="item-column-payment">
						<div class="img-column-payment">
 <img src="/local/templates/czebra_daewoo/front/img/payment/files-and-folders.svg" alt="">
						</div>
						<div class="info-column-payment">
							<div class="title-item">
								 Банковский или почтовый перевод
							</div>
							<div class="descr-item">
								 Счет будет выставлен на физическое лицо, данные которого будут указаны при заказе. Данный счет можно оплатить в любом банке.
							</div>
						</div>
					</div>
				</div>
				<div class="info-online-payment-security">
 <a href="#" class="btn-accord">Подробнее о безопасности онлайн платежей</a>
					<div class="text-accord collapse">
						 Уважаемый клиент!<br>
						 Вы можете оплатить свой заказ онлайн с помощью предложенных методов оплат через платежный сервис&nbsp;АО&nbsp;« <nobr>АЛЬФА-БАНК</nobr>
						». После подтверждения заказа Вы будете перенаправлены на защищенную платежную страницу АО&nbsp;« <nobr>АЛЬФА-БАНК</nobr>
						», где необходимо будет ввести данные для оплаты заказа. После успешной оплаты на указанную в форме оплаты электронную почту будет направлен электронный чек с информацией о заказе и данными по произведенной оплате. Гарантии безопасности<br>
						 Безопасность процессинга АО&nbsp;« <nobr>АЛЬФА-БАНК</nobr>
						»&nbsp;подтверждена сертификатом стандарта безопасности данных индустрии платежных карт PCI DSS. Надежность сервиса обеспечивается интеллектуальной системой мониторинга мошеннических операций, а также применением 3D Secure - современной технологией безопасности интернет-платежей. Данные Вашей карты вводятся на специальной защищенной платежной странице. Передача информации в процессинговую компанию АО&nbsp;« <nobr>АЛЬФА-БАНК</nobr>
						»&nbsp;происходит с применением технологии шифрования TLS. Дальнейшая передача информации осуществляется по закрытым банковским каналам, имеющим наивысший уровень надежности.<br>
						 АО&nbsp;« <nobr>АЛЬФА-БАНК</nobr>
						»&nbsp;не передает данные Вашей карты магазину и иным третьим лицам!<br>
						 Если Ваша карта поддерживает технологию 3D Secure, для осуществления платежа, Вам необходимо будет пройти дополнительную проверку пользователя в банке-эмитенте (банк, который выпустил Вашу карту). Для этого Вы будете направлены на страницу банка, выдавшего карту. Вид проверки зависит от банка. Как правило, это дополнительный пароль, который отправляется в SMS, карта переменных кодов, либо другие способы.<br>
						 Если у Вас возникли вопросы по совершенному платежу, Вы можете обратиться в службу поддержки клиентов&nbsp;АО&nbsp;« <nobr>АЛЬФА-БАНК</nobr>
						».&nbsp;&nbsp;
					</div>
				</div>
			</div>
 <br>
 <br>
			<div class="right-column-payment">
				<div class="caption-column">
					 Юридическим лицам
				</div>
				<div class="list-column-payment">
					<div class="item-column-payment">
						<div class="img-column-payment">
 <img src="/local/templates/czebra_daewoo/front/img/payment/credit-card.svg" alt="">
						</div>
						<div class="info-column-payment">
							<div class="title-item">
								 Безналичная оплата
							</div>
							<div class="descr-item">
								 Моментальная оплата Вашего заказа при помощи банковской карты, не отходя от компьютера.
							</div>
						</div>
					</div>
					<div class="item-column-payment">
						<div class="img-column-payment">
 <img src="/local/templates/czebra_daewoo/front/img/payment/delivery.svg" alt="">
						</div>
						<div class="info-column-payment">
							<div class="title-item">
								 Сроки доставки
							</div>
							<div class="descr-item">
								 Во время доставки в регионы России сроки транспортировки засчитываются исходя из времени, необходимого для перевозки груза до ТК. После этого длительность поставки определяется условиями транспортной компании.
							</div>
						</div>
					</div>
				</div>
				<div class="download-requisites">
 <a href="/payment/rekvizity.pdf" download="">Скачать реквизиты</a>
				</div>
			</div>
 <br>
		</div>
	</div>
 <br>
</div>
 <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>