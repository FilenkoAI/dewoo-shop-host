<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
global $USER;
?>

<div class="container">
    <div class="block-catalog-items">
        <? if(count($arResult['ITEMS']) > 0): ?>
            <? foreach($arResult['ITEMS'] as $key => $arItem): ?>

                <div class="wrapp-item">
                    <div class="item">
                        <div class="sticker">
                            <? if($arItem['PROPERTIES']['METKA_NOVINKA']['VALUE'] == 'Да'): ?>
                                <div class="sticker-novelty">
                                    <span>Новинка</span>
                                </div>
                            <? endif; ?>
                        </div>
                        <div class="icon-item">
                            <a title="В сравнение" class="add-to-compare"
                               onclick="addToCompare(event, <?=$arItem['ID']?>, '<?=$arItem["DETAIL_PAGE_URL"]?>')"
                               data-id="<?=$arItem['ID']?>"></a>
                            <a title="В избранное" class="add-to-favorites desktop" onclick="addToFavs(event, <?=$arItem['ID']?>)"
                               data-id="<?=$arItem['ID']?>"></a>
                        </div>
                        <div class="img-item">
                            <div class="icon-item">
                                <a title="В сравнение" class="add-to-favorites" onclick="addToFavs(event, <?=$arItem['ID']?>)"
                                   data-id="<?=$arItem['ID']?>"></a>
                            </div>
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="photo"><img
                                        src="<?=$arItem['CZ_PROPS']['PREVIEW']?>" alt="<?=$arItem['NAME']?>"></a>

                            <div class="wrapp-price-item">
                                <? if($arItem['CZ_PROPS']['PRICES']['PRICE']['VALUE'] == 0): ?>
                                    <div class="price-item soon-in-sell">Скоро в продаже</div>
                                <? else: ?>
                                    <? if($arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'): ?>
                                        <div class="old-price">
                                            <div class="percent">
                                                -<?=$arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE']?></div>
                                            <div class="value"><?=$arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></div>
                                        </div>
                                        <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                    <? else: ?>
                                        <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                    <? endif; ?>
                                <? endif ?>
                            </div>

                        </div>

                        <div class="item-info">
                            <div class="name-item">
                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                            </div>
                            <div class="avialable-mobil">
                                <? if($arItem['CATALOG_AVAILABLE'] != 'N'): ?>
                                    <span class="yes-avialable">В наличии</span>
                                <? else: ?>
                                    <span class="no-avialable">Нет в наличии</span>
                                <? endif; ?>
                                <div class="rate-item">
                                    <div class="rate">
                                        <input class="input-rating" name="input-name" type="number"
                                               style="display: none"
                                               value="<?=$arItem['CZ_PROPS']['AVERAGE_RATING'] / 20?>" disabled="true">
                                    </div>
                                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>?reviews_mobile=Y"
                                       class="count-rate"><?=$arItem['CZ_PROPS']['REVIEWS_COUNT']?></a>
                                    <div class="code">Артикул: <?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE']?></div>
                                </div>

                            </div>
                            <? if (in_array($USER->GetId(), ['1', '32'])):?>
                            <div class="list-features-item">
                                <? foreach($arItem['ICONS'] as $icon): ?>
                                    <div class="features-item">
                                        <img src="<?=$icon['IMG']?>" alt="">
                                        <span><?=$icon['DISPLAY_DESC']?></span>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <? endif ?>

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
                                <div class="bonus-item new-sol-article">
                                    <?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE']?> <a href="javascript:void(0)"
                                                                                           data-title="Артикул"></a>
                                </div>
                                <div class="block-delivery-mobil">
                                    <div class="delivery-product">
                                        <div class="icon-delivery-product"><img
                                                    src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/delivery-mob.svg">
                                        </div>
                                        <div class="text-delivery-product">
                                            <span>Доставка</span>
                                            <span><? if($arItem['CATALOG_AVAILABLE'] != 'N'): ?><?=$arItem['CZ_PROPS']['DELIVERY']?><? else: ?>уточняйте<? endif ?></span>
                                        </div>
                                    </div>
                                    <div class="pickup-product">
                                        <div class="icon-pickup-product"><img
                                                    src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/pickup-mob.svg"></div>
                                        <div class="text-pickup-product">
                                            <span>Самовывоз</span>
                                            <span><? if($arItem['CATALOG_AVAILABLE'] != 'N'): ?><?=$arItem['CZ_PROPS']['PICKUP']?><? else: ?>уточняйте<? endif ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapp-price-item">
                                <? if($arItem['CZ_PROPS']['PRICES']['PRICE']['VALUE'] == 0): ?>
                                    <div class="price-item soon-in-sell">Скоро в продаже</div>
                                <? else: ?>
                                    <? if($arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'): ?>
                                        <div class="old-price">
                                            <div class="percent">
                                                -<?=$arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE']?></div>
                                            <div class="value"><?=$arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></div>
                                        </div>
                                        <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                    <? else: ?>
                                        <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                    <? endif; ?>
                                <? endif; ?>
                            </div>


                            <? if($arItem['CATALOG_AVAILABLE'] != 'N' && ($arItem['CZ_PROPS']['PRICES']['PRICE']['VALUE'] > 0)): ?>
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
                                    <span class="add-to-cart-item analog">
                                        <a href="javascript:void(0)" class="btn-site1 analog"
                                           data-id="<?=$arItem['ID']?>"
                                           onclick="$('#btn_form_FORM_ANALOG_SECTION' + $(this).data('id')).click();"
                                        >
                                             <span class="btn-trans">Подобрать аналог</span>
                                             <span class="btn-anim">Подобрать аналог</span>
                                        </a>
                                    </span>
                                </div>

                            <? endif ?>
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

                        </div>
                    </div>
                </div>
            <? endforeach ?>
            <? if($arResult["NAV_RESULT"]->nEndPage > 1 && $arResult["NAV_RESULT"]->NavPageNomer < $arResult["NAV_RESULT"]->nEndPage): ?>
                <div class="more-item">
                    <a data-ajax-id="<?=$bxajaxid?>" href="javascript:void(0)"
                       data-show-more="<?=$arResult["NAV_RESULT"]->NavNum?>"
                       data-next-page="<?=($arResult["NAV_RESULT"]->NavPageNomer + 1)?>"
                       data-max-page="<?=$arResult["NAV_RESULT"]->nEndPage?>">Показать еще</a>
                </div>
            <? endif ?>
        <? else : ?>
            <div class="nothing-found">
                <p>К сожалению, ничего не найдено</p>
            </div>
        <? endif ?>
    </div>
</div>
