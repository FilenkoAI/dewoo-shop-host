<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>
<? if ( count($arResult['ITEMS']) > 0 ):?>
<div class="item-accord-mobil">
    <a href="javascript:void(0)" class="open-accord"><?=$arParams['TITLE']?></a>
    <div class="block-accord">
        <div class="slider-recommendation-mobil">
            <div class="wrapp-catalog">
                <div class="wrapp-block-catalog-items">
                    <div class="block-catalog-items">
                        <?$currentItem = 0;?>
                        <?for($currentSlide = 0; $currentSlide < $arResult['SLIDES_COUNT']; $currentSlide++):?>
                        <?
                            if( (($currentSlide+1) * 2) > $arResult['ITEMS_COUNT'] ){
                                $maxItem = 1;
                            } else {
                                $maxItem = 2;
                            }
                        ?>
                        <div class="slide">
                            <?for($item = 0; $item < $maxItem; $item++):?>
                            <div class="wrapp-item">
                                <div class="item">
                                    <div class="icon-item">
                                        <a href="#" class="add-to-compare <?=$arResult['ITEMS'][$currentItem]['CZ_PROPS']['COMPARED'] === 'Y' ? 'selected' : ''?>" onclick="addToCompare(event, <?=$arResult['ITEMS'][$currentItem]['ID']?>, '<?=$arResult['ITEMS'][$currentItem]["DETAIL_PAGE_URL"]?>')" data-id="<?=$arResult['ITEMS'][$currentItem]['ID']?>"></a>
                                        <a href="#" class="add-to-favorites <?=$arResult['ITEMS'][$currentItem]['CZ_PROPS']['IN_FAV'] === 'Y' ? 'selected' : ''?>" onclick="addToFavs(event, <?=$arResult['ITEMS'][$currentItem]['ID']?>)"  data-id="<?=$arResult['ITEMS'][$currentItem]['ID']?>"></a>
                                    </div>
                                    <div class="img-item">
                                        <a href="<?=$arResult['ITEMS'][$currentItem]['DETAIL_PAGE_URL']?>"><img src="<?=$arResult['ITEMS'][$currentItem]['CZ_PROPS']['PREVIEW']?>" alt=""></a>
                                        <div class="wrapp-price-item">
                                            <?if($arResult['ITEMS'][$currentItem]['CZ_PRICE_VALUE'] == 0):?>
                                                <div class="price-item soon-in-sell">Скоро в продаже</div>
                                            <?else:?>
                                                <div class="price-item"><?=$arResult['ITEMS'][$currentItem]['CZ_PRICE']?></div>
                                            <?endif;?>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="name-item">
                                            <a href="<?=$arResult['ITEMS'][$currentItem]['DETAIL_PAGE_URL']?>"><?=$arResult['ITEMS'][$currentItem]['NAME']?></a>
                                        </div>
                                        <? if($arResult['ITEMS'][$currentItem]['CATALOG_AVAILABLE'] != 'N'): ?>
                                            <div class="avialable-mobil">
                                                <span class="yes-avialable">В наличии</span>
                                            </div>
                                        <? else: ?>
                                            <div class="avialable-mobil not-avialable">
                                                <span class="no-avialable">Нет в наличии</span>
                                            </div>
                                        <? endif; ?>

                                        <div class="list-features-item">
                                            <? foreach($arResult['ITEMS'][$currentItem]['ICONS'] as $icon): ?>
                                                <?/*в верстке первая иконка скрывалась в мобильной версии добавлением класса hidden-mobil*/?>
                                                <div class="features-item">
                                                    <img src="<?=$icon['IMG']?>" alt="">
                                                    <span><?=$icon['DISPLAY_DESC']?></span>
                                                </div>
                                            <? endforeach; ?>
                                        </div>

                                        <div class="wrapp-rate-and-bonus-item">
                                            <div class="rate-item">
                                                <div class="bg-rate"><span><span class="bg-color" style="width: <?=$arResult['ITEMS'][$currentItem]['CZ_PROPS']['AVERAGE_RATING']?>%"></span></span></div>
                                                <a href="<?=$arResult['ITEMS'][$currentItem]['DETAIL_PAGE_URL']?>?reviews=Y" class="count-rate"><?=$arResult['ITEMS'][$currentItem]['CZ_PROPS']['REVIEWS_COUNT']?></a>
                                            </div>
                                            <div class="new-sol-article bonus-item">
                                                <?=$arResult['ITEMS'][$currentItem]['PROPERTIES']['CML2_ARTICLE']['VALUE']?><a href="#" data-title="Артикул"></a>
                                            </div>
                                            <div class="block-delivery-mobil">
                                                <div class="delivery-product">
                                                    <div class="icon-delivery-product"><img
                                                                src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/delivery-mob.svg"></div>
                                                    <div class="text-delivery-product">
                                                        <span>Доставка</span>
                                                        <span><? if($arResult['ITEMS'][$currentItem]['CATALOG_AVAILABLE'] != 'N'): ?><?=$arResult['ITEMS'][$currentItem]['CZ_PROPS']['DELIVERY']?><?else:?>уточняйте<?endif?></span>
                                                    </div>
                                                </div>
                                                <div class="pickup-product">
                                                    <div class="icon-pickup-product"><img
                                                                src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/pickup-mob.svg"></div>
                                                    <div class="text-pickup-product">
                                                        <span>Самовывоз</span>
                                                        <span><? if($arResult['ITEMS'][$currentItem]['CATALOG_AVAILABLE'] != 'N'): ?><?=$arResult['ITEMS'][$currentItem]['CZ_PROPS']['PICKUP']?><?else:?>уточняйте<?endif?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrapp-price-item">
                                            <?if($arResult['ITEMS'][$currentItem]['CZ_PRICE_VALUE'] == 0):?>
                                                <div class="price-item soon-in-sell">Скоро в продаже</div>
                                            <?else:?>
                                                <div class="price-item"><?=$arResult['ITEMS'][$currentItem]['CZ_PRICE']?></div>
                                            <?endif;?>
                                        </div>
                                        <? if($arResult['ITEMS'][$currentItem]['CATALOG_AVAILABLE'] != 'N' && ($arResult['ITEMS'][$currentItem]['CZ_PRICE_VALUE'] > 0)): ?>
                                            <div class="btn-item">
                                                <span class="add-to-cart-item">
                                                    <a href="#" data-czaction="addtocart" data-czbuy="<?=$arResult['ITEMS'][$currentItem]["ID"]?>">
                                                        <span class="btn-trans">Купить</span>
                                                        <span class="btn-anim">Купить</span>
                                                    </a>
                                                </span>
                                                <span class="quick-order">
                                                    <a href="#" onclick="quickOrder(event, '<?=$arResult['ITEMS'][$currentItem]["ID"]?>')">
                                                        <span class="btn-trans">Быстрый заказ</span>
                                                        <span class="btn-anim">Быстрый заказ</span>
                                                    </a>
                                                </span>
                                            </div>
                                        <? else: ?>
                                            <div class="btn-item analog-mobile">
                                                <span class="add-to-cart-item" data-id="<?=$arResult['ITEMS'][$currentItem]['ID']?>"
                                                      onclick="$('#btn_form_FORM_ANALOG_SECTION' + $(this).data('id')).click();">
                                                    <a href="javascript:void(0)">
                                                        <span class="btn-trans">Подобрать аналог</span>
                                                        <span class="btn-anim">Подобрать аналог</span>
                                                    </a>
                                                </span>
                                            </div>
                                            <? $APPLICATION->IncludeComponent(
                                                "czebra:form",
                                                "chose_analog",
                                                array(
                                                    "PRODUCT" => $arResult['ITEMS'][$currentItem]['ID'],
                                                    "ACTIVE" => "N",
                                                    "FORM_ID" => "FORM_ANALOG_SECTION" . $arResult['ITEMS'][$currentItem]['ID'],
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
                            <?$currentItem++;?>
                            <?endfor?>
                        </div>
                        <?endfor?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?endif;?>
