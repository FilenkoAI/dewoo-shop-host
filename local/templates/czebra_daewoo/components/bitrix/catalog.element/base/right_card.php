<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<div class="right-card">
    <!-- <div class="article-product">
    <p>Артикул товара: <span>DLM 180E</span></p>
    <a href="#"><img src="img/title-icon-card.svg" alt=""></a>
    </div> -->

    <div class="wrapp-avialable-bonus-card">
        <? if($arResult['CATALOG_AVAILABLE'] != 'N'): ?>
            <div class="avialable-card">
                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/in-avialable.svg" alt="">
                <span>В наличии</span>
            </div>
        <? else: ?>
            <div class="avialable-card not-avialable-card">
                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/not-avialable.svg" alt="">
                <span>Нет в наличии</span>
            </div>
        <? endif; ?>
        <div class="quantity-bonus-card new-sol-article">
            <span><?=$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE']?></span>
            <?/*
            <a href="javascript:void(0)" data-title="Артикул"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/info.svg"
                                                                   alt=""></a>
            */?>
        </div>
    </div>
    <div class="block-price-card">
        <? if($arResult['CZ_PROPS']['PRICES']['PRICE']['VALUE'] == 0): ?>
            <div class="price-card soon-in-sell">Скоро в продаже</div>
        <? else: ?>
            <? if($arResult['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'): ?>
                <div class="old-price">
                    <div class="percent">-<?=$arResult['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE']?></div>
                    <div class="value-old-price"><?=$arResult['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></div>
                </div>
                <div class="price-card"><?=$arResult['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
            <? else: ?>
                <div class="price-card"><?=$arResult['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
            <? endif; ?>
        <? endif; ?>
    </div>
    <? if($arResult['CATALOG_AVAILABLE'] != 'N' && ($arResult['CZ_PROPS']['PRICES']['PRICE']['VALUE'] > 0)): ?>
        <div class="btn-item-card">
               <span class="add-to-cart">
                   <a href="#" data-czaction="addtocart" data-czbuy="<?=$arResult["ID"]?>">
                       <span class="btn-trans">Купить</span>
                       <span class="btn-anim">Купить</span>
                   </a>
               </span>
            <span class="quick-order">
               <a href="#" onclick="quickOrder(event, '<?=$arResult["ID"]?>')">
                   <span class="btn-trans">Быстрый заказ</span>
                   <span class="btn-anim">Быстрый заказ</span>
               </a>
            </span>
        </div>
    <? else: ?>
        <? /*sometimes before we can usher in the new the old must be put to rest
        <div class="btn-item-card">
           <span class="add-to-cart" style="opacity: 0.5">
               <a href="javascript:void(0)">
                   <span class="btn-trans">Нет в наличии</span>
                   <span class="btn-anim">Купить</span>
               </a>
           </span>
            <span class="quick-order" style="opacity: 0.5">
               <a href="javascript:void(0)">
                   <span class="btn-trans">Нет в наличии</span>
                   <span class="btn-anim">Быстрый заказ</span>
               </a>
            </span>
        </div>

        */ ?>

        <div class="btn-item-card analog">
           <span class="add-to-cart">
               <a href="javascript:void(0)" class="btn-analog-card" data-id="<?=$arResult['ID']?>"
                  onclick="$('#btn_form_FORM_ANALOG_ELEMENT' + $(this).data('id')).click();">
                   <span class="btn-trans">Подобрать аналог</span>
                   <span class="btn-anim">Подобрать аналог</span>
               </a>
           </span>
        </div>
        <? $APPLICATION->IncludeComponent(
            "czebra:form",
            "chose_analog",
            array(
                "PRODUCT" => $arResult['ID'],
                "ACTIVE" => "N",
                "FORM_ID" => "FORM_ANALOG_ELEMENT" . $arResult['ID'],
                "IBLOCK_ID" => "41",
                "IBLOCK_TYPE" => "feedback",
                "MSG_BTN" => "Отправить",
                "NAME_POST_EVENT" => "",
                "PROPERTY_CODES" => array("PHONE", "NAME", "PRODUCT", "EMAIL"),
                "PROPERTY_CODES_REQUIRED_CHECKBOX" => array(),
                "PROPERTY_CODES_REQUIRED_EMAIL" => array(),
                "RETURN_URL" => "",
                "USER_MESSAGE_ADD" => "Спасибо! Наш менеджер свяжется с Вами в ближайшее время.",
                "USE_CAPTCHA" => "N",
                "VALIDATED" => "Y",
                "TITLE" => 'Подобрать аналог',
            )
        ); ?>
    <? endif ?>
    <div class="wrapp-compare-favorites-card">
        <a href="#" onclick="addToCompare(event, <?=$arResult['ID']?>, '<?=$arResult["DETAIL_PAGE_URL"]?>')"
           class="compare-card" data-id="<?=$arResult['ID']?>">В сравнение</a>
        <a href="#" onclick="addToFavs(event, <?=$arResult['ID']?>, '<?=$arResult["DETAIL_PAGE_URL"]?>')"
           class="favorites-card" data-id="<?=$arResult['ID']?>">В избранное</a>
    </div>
    <div class="wrapp-getting-card">
        <div class="title-getting-card">Как получить товар</div>
        <? if($arResult['CATALOG_AVAILABLE'] != 'N'): ?>
            <div class="wrapp-delivery-card">
                <div class="delivery-card">
                    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-item.svg" alt="">
                    <a href="/delivery/" target="_blank">Доставка</a>
                </div>
                <div class="value-delivery-card">
                    <p><?=$arResult['CZ_PROPS']['DELIVERY']?></p>
                </div>
            </div>
            <div class="wrapp-pickup-card">
                <div class="pickup-card">
                    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/pickup.svg" alt="">
                    <a href="/delivery/?pickup=Y" target="_blank">Самовывоз</a>
                </div>
                <div class="value-pickup-card">
                    <p><?=$arResult['CZ_PROPS']['PICKUP']?></p>
                </div>
            </div>


            <div class="avialable-magazine-card">
                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/magazine.svg" alt="">
                <? $APPLICATION->IncludeComponent(
                    "czebra:form",
                    "availability_ajax",
                    array(
                        "PRODUCT" => $arResult['ID'],
                        "ACTIVE" => "N",
                        "FORM_ID" => "FORM_AVAILABILITY",
                        "IBLOCK_ID" => "35",
                        "IBLOCK_TYPE" => "feedback",
                        "MSG_BTN" => "Отправить",
                        "NAME_POST_EVENT" => "",
                        "PROPERTY_CODES" => array("PHONE", "NAME", "PRODUCT"),
                        "PROPERTY_CODES_REQUIRED_CHECKBOX" => array(),
                        "PROPERTY_CODES_REQUIRED_EMAIL" => array(),
                        "RETURN_URL" => "",
                        "USER_MESSAGE_ADD" => "Спасибо! Наш менеджер свяжется с Вами в ближайшее время.",
                        "USE_CAPTCHA" => "N",
                        "VALIDATED" => "Y",
                        "TITLE" => 'Узнать наличие',
                    )
                ); ?>
            </div>
        <? else: ?>
            <div class="avialable-card not-avialable-card">
                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/not-avialable.svg" alt="">
                <span>Нет в наличии</span>
            </div>
        <? endif; ?>

    </div>
    <div class="wrapp-benefitc-card">
        <div class="title-benefit-card">Хотите выгоднее?</div>
        <? /*
        <div class="installment-payment">
            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/coin.svg" alt="">
            <a href="#">Купить в рассрочку</a>
        </div>
        */ ?>
        <div class="subscribe-dumping">
            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/bell.svg" alt="">
            <? $APPLICATION->IncludeComponent(
                "czebra:form",
                "price_drop_ajax",
                array(
                    "PRODUCT" => $arResult['ID'],
                    "ACTIVE" => "N",
                    "FORM_ID" => "FORM_PRICE_DROP",
                    "IBLOCK_ID" => "36",
                    "IBLOCK_TYPE" => "feedback",
                    "MSG_BTN" => "Отправить",
                    "NAME_POST_EVENT" => "",
                    "PROPERTY_CODES" => array("EMAIL", "NAME", "PRODUCT"),
                    "PROPERTY_CODES_REQUIRED_CHECKBOX" => array(),
                    "PROPERTY_CODES_REQUIRED_EMAIL" => array(),
                    "RETURN_URL" => "",
                    "USER_MESSAGE_ADD" => "Спасибо! Наш менеджер свяжется с Вами в ближайшее время.",
                    "USE_CAPTCHA" => "N",
                    "VALIDATED" => "Y",
                    "TITLE" => 'Подписаться на снижение цены',
                )
            ); ?>
        </div>

    </div>
</div>
