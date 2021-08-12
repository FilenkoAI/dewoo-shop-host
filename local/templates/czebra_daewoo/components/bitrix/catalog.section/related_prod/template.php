<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<? if(count($arResult['ITEMS']) > 0): ?>
    <div class="wrapp-related-product">
        <div class="title-card2"><?=$arParams['H2']?></div>
        <? if(count($arResult["ITEMS"]) > 4 && $arParams['SHOW_SIDE_PRICING'] == 'Y'): ?>
            <div class="caption-slider-related">
                <span class="cheap">Дешевле</span>
                <span class="expensive">Дороже</span>
            </div>
        <? else: ?>
            <div class="caption-slider-related margin"></div>
        <? endif ?>
        <div class="slider-items">
            <? foreach($arResult['ITEMS'] as $arItem): ?>
                <div class="slide">
                    <div class="wrapp-item">
                        <div class="item">
                            <? if($arItem['CZ_PROPS']['IS_NEW'] == 'Y'): ?>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            <? endif; ?>
                            <div class="icon-item">
                                <a href="#"
                                   class="add-to-compare <?=$arItem['CZ_PROPS']['COMPARED'] === 'Y' ? 'selected' : ''?>"
                                   onclick="addToCompare(event, <?=$arItem['ID']?>, '<?=$arItem["DETAIL_PAGE_URL"]?>')"
                                   data-id="<?=$arItem['ID']?>"></a>
                                <a href="#"
                                   class="add-to-favorites <?=$arItem['CZ_PROPS']['IN_FAV'] === 'Y' ? 'selected' : ''?>"
                                   onclick="addToFavs(event, <?=$arItem['ID']?>)" data-id="<?=$arItem['ID']?>"></a>
                            </div>
                            <div class="img-item"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img
                                            src="<?=$arItem['CZ_PROPS']['PREVIEW']?>" alt="<?=$arItem['NAME']?>"></a>
                            </div>
                            <div class="name-item">
                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                            </div>

                            <div class="list-features-item">
                                <? foreach($arItem['ICONS'] as $icon): ?>
                                    <? /*в верстке первая иконка скрывалась в мобильной версии добавлением класса hidden-mobil*/ ?>
                                    <div class="features-item">
                                        <img src="<?=$icon['IMG']?>" alt="">
                                        <span><?=$icon['DISPLAY_DESC']?></span>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="wrapp-rate-and-bonus-item">
                                <div class="rate-item">

                                    <div class="rate">
                                        <input class="input-rating" name="input-name" type="number"
                                               style="display: none"
                                               value="<?=$arItem['CZ_PROPS']['AVERAGE_RATING'] / 20?>" disabled="true">
                                    </div>
                                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>?reviews=Y"
                                       class="count-rate"><?=$arItem['CZ_PROPS']['REVIEWS_COUNT']?></a>
                                </div>
                                <div class="new-sol-article bonus-item">
                                    <?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE']?><a href="#"
                                                                                          data-title="Артикул"></a>
                                </div>
                            </div>
                            <div class="wrapp-price-item">
                                <? if($arItem['CZ_PRICE_VALUE'] == 0): ?>
                                    <div class="price-item soon-in-sell" style="font-size: 25px">Скоро в продаже</div>
                                <? else: ?>
                                <div class="price-item"><?=$arItem['CZ_PRICE']?></div>
                                <?endif;?>
                            </div>
                            <? if($arItem['CATALOG_AVAILABLE'] != 'N' && ($arItem['CZ_PRICE_VALUE'] > 0)): ?>
                                <div class="btn-item">
                                    <span class="add-to-cart-item">
                                        <a href="#" data-czaction="addtocart" data-czbuy="<?=$arItem["ID"]?>">
                                            <span class="btn-trans">Купить</span>
                                            <span class="btn-anim">Купить</span>
                                        </a>
                                    </span>
                                    <span class="quick-order">
                                        <a href="#" onclick="quickOrder(event, '<?=$arItem["ID"]?>')">
                                            <span class="btn-trans">Быстрый заказ</span>
                                            <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                </div>
                            <? else: ?>
                                <div class="btn-item analog">
                                    <span class="add-to-cart-item">
                                        <a href="javascript:void(0)" data-id="<?=$arItem['ID']?>"
                                           onclick="$('#btn_form_FORM_ANALOG_SECTION' + $(this).data('id')).click();">
                                            <span class="btn-trans">Подобрать аналог</span>
                                            <span class="btn-anim">Подобрать аналог</span>
                                        </a>
                                    </span>
                                </div>
                                <? $APPLICATION->IncludeComponent(
                                    "czebra:form",
                                    "chose_analog",
                                    array(
                                        "PRODUCT" => $arItem['ID'],
                                        "ACTIVE" => "N",
                                        "FORM_ID" => "FORM_ANALOG_SECTION" . $arItem['ID'],
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
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
<? endif; ?>