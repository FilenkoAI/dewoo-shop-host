<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Заказы");
?>

    <div class="title-lk title-purchase-history">
        <div class="container">
            <h1>История покупок</h1>
        </div>
    </div>
    <div class="wrapp-purchase-history">
        <div class="container">

            <?if($bonusInfo):?>
            <div class="wrapp-info-bonus">
                <div class="active-bonus">Активные бонусы <span><?=$bonusInfo['Points'];?></span></div>
                <div class="wrapp-write-off-date">
                    <div class="to-write-off">К списанию <span><?//148?></span></div>
                    <div class="write-off-date">
                        Дата списания
                        <span class="date"><?//05.06.2020?></span>
                        <span class="icon-warning"><?/*<img src="<?=SITE_TEMPLATE_PATH?>/front/img/lk/warning.svg"
                                                        alt="">*/?></span>
                        <div class="text-warning"><span>ВНИМАНИЕ!</span> Ваши бонусы активны в течении 6 месяцев со дня
                            покупки.
                        </div>
                    </div>
                </div>
            </div>
            <?endif;?>
            <? $APPLICATION->IncludeComponent("bitrix:sale.personal.order", "main", array(
                "SEF_MODE" => "Y",
                "SEF_FOLDER" => "/personal_section/order/",
                "ORDERS_PER_PAGE" => "5",
                "PATH_TO_PAYMENT" => "/personal_section/order/payment/",
                "PATH_TO_BASKET" => "/personal_section/cart/",
                "SET_TITLE" => "Y",
                "SAVE_IN_SESSION" => "N",
                "NAV_TEMPLATE" => "simple",
                "SEF_URL_TEMPLATES" => array(
                    "list" => "index.php",
                    "detail" => "detail/#ID#/",
                    "cancel" => "cancel/#ID#/",
                ),
                "SHOW_ACCOUNT_NUMBER" => "Y"
            ),
                false
            ); ?>
            <?/*
            <div class="btn-back-mobil-purchase">
                <a href="#" class="btn-site1">
                    <span class="btn-trans">Назад</span>
                    <span class="btn-anim">Назад</span>
                </a>
            </div>
            */?>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>