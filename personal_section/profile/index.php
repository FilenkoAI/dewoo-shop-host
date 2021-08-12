<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Настройки пользователя");
?>
<?
global $USER;
if (!$USER->IsAuthorized()) {
	LocalRedirect("/login/?backurl=" . urlencode($APPLICATION->GetCurPageParam()));
}
?>
<div class="title-lk title-personal-date">
    <div class="container">
        <h1>Личные данные</h1>
    </div>
</div>
<?$APPLICATION->IncludeComponent("bitrix:main.profile", "main", Array(
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
	),
	false
);?>

<?

?>
    <?/*
	<div class="address-delivery-modal modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<div class="title-modal">Адрес доставки</div>
					<form action="">
						<div class="wrapp-field">
							<label>Область / Республика / Край</label>
							<input type="text">
						</div>
						<div class="wrapp-field">
							<label>Город / Населённый пункт</label>
							<input type="text">
						</div>
						<div class="wrapp-field">
							<label>Улица</label>
							<input type="text">
						</div>
						<div class="row-wrapp-field">
							<div class="wrapp-field">
								<label>Дом</label>
								<input type="text">
							</div>
							<div class="wrapp-field">
								<label>Корпус</label>
								<input type="text">
							</div>
							<div class="wrapp-field">
								<label>Кв. / офис</label>
								<input type="text">
							</div>
						</div>
						<div class="wrapp-field">
							<label>Комментарий</label>
							<textarea></textarea>
						</div>

						<a href="#" class="save-address-modal btn-site1">
							<span class="btn-trans">Сохранить</span>
							<span class="btn-anim">Сохранить</span>
						</a>

					</form>
					<a href="#" class="close-modal"></a>
				</div>
			</div>
		</div>
	</div>
    */?>
    <?/*
	<div class="address-pickup-modal modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<div class="title-modal">Выберите магазин в г. Москва</div>
					<div class="wrapp-select-magazine-modal">
						<div class="map-modal">
							<img src="img/lk/map.png" alt="">
						</div>
						<div class="info-magazine-modal">
							<div class="name-magazine">Твой Дом - Строгино Бренд-зона DAEWOO</div>
							<div class="address-magazine">66 км МКАД, ТЦ “Крокус Сити”</div>
							<div class="phone-magazine">+7 (495) 151-29-20</div>
							<div class="working-time-magazine">Ежедневно <span>Круглосуточно</span></div>
							<div class="photo-magazine">
								<p>Фото магазина</p>
								<div class="slider-photo-magazine">
									<div class="slide">
										<a href="img/lk/photo-magazine1.png" data-fancybox='gallery'><img src="img/lk/photo-magazine2.png" alt=""></a>
									</div>
									<div class="slide">
										<a href="img/lk/photo-magazine2.png" data-fancybox='gallery'> <img src="img/lk/photo-magazine3.png" alt=""></a>
									</div>
									<div class="slide">
										<a href="img/lk/photo-magazine3.png" data-fancybox='gallery'><img src="img/lk/photo-magazine2.png" alt=""></a>
									</div>
									<div class="slide">
										<a href="img/lk/photo-magazine4.png" data-fancybox='gallery'><img src="img/lk/photo-magazine3.png" alt=""></a>
									</div>
									<div class="slide">
										<a href="img/lk/photo-magazine3.png" data-fancybox='gallery'><img src="img/lk/photo-magazine2.png" alt=""></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<a href="#" class="save-address-modal btn-site1">
						<span class="btn-trans">Сохранить</span>
						<span class="btn-anim">Сохранить</span>
					</a>

					<a href="#" class="close-modal"></a>
				</div>
			</div>
		</div>
	</div>
    */?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>