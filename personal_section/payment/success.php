<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результат оплаты");?>
<div class="wrapp-txt">
    <div class="container">
        <p style="margin-top: 20px; text-align: center">Спасибо, Ваш заказ успешно оплачен!</p>
        <p>Наши менеджеры свяжутся с вами в ближайшее время.</p>
        <p>Номер заказа: №<?=$_REQUEST["ORDER_ID"]?></p>
        <p>Всю информацию о заказе, оплате и доставке вы сможете посмотреть в <a href="/personal_section/order/history/">личном кабинете</a>.</p>
        <p></p>
        <p>Присоединитесь к нам в социальных сетях:</p>
        <div class="list-social">
            <a href="https://www.youtube.com/channel/UCNoSo5_n22ZU91I-h_KW4Vg" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/yt-footer.svg" alt=""></a>
            <a href="https://vk.com/daewoopowerproducts" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/vk-footer.svg" alt=""></a>
            <a href="https://www.instagram.com/daewoo_power_products/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/insta-footer.svg" alt=""></a>
            <a href="https://www.facebook.com/daewoopowerproductsrussia/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/fb-footer.svg" alt=""></a>
            <a href="https://ok.ru/group/52738602827857/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/odn.svg" alt=""></a>
        </div>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>