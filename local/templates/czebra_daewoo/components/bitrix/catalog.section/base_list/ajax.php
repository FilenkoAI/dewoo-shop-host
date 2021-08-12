<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<div class="container">
    <div class="list-catalog-items">
        <? if(count($arResult['ITEMS']) > 0): ?>
            <? foreach($arResult['ITEMS'] as $key => $arItem): ?>
                <div class="item">
                    <div class="img-item">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=$arItem['CZ_PROPS']['PREVIEW']?>"
                                                                       alt="<?=$arItem['NAME']?>"></a>
                        <div class="sticker">
                            <? if($arItem['PROPERTIES']['METKA_NOVINKA']['VALUE'] == 'Да'): ?>
                                <div class="sticker-novelty">
                                    <span>Новинка</span>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="wrapp-name-item">
                            <div class="name-item"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                            </div>
                            <div class="icon-item">
                                <a title="В сравнение"
                                   class="add-to-compare <?=$arItem['CZ_PROPS']['COMPARED'] === 'Y' ? 'selected' : ''?>"
                                   onclick="addToCompare(event, <?=$arItem['ID']?>, '<?=$arItem["DETAIL_PAGE_URL"]?>')"
                                   data-id="<?=$arItem['ID']?>"></a>
                                <a title="В избранное"
                                   class="add-to-favorites <?=$arItem['CZ_PROPS']['IN_FAV'] === 'Y' ? 'selected' : ''?>"
                                   onclick="addToFavs(event, <?=$arItem['ID']?>)" data-id="<?=$arItem['ID']?>"></a>
                            </div>
                        </div>
                        <div class="table-item">
                            <div class="left-table-item">
                                <? if($arItem['PROPERTIES']['ELEKTROZAPUSK']['VALUE'] == 'да'): ?>
                                    <div class="features-item">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/icon-item1.svg" alt="">
                                        <span>Электрозапуск</span>
                                    </div>
                                <? endif ?>
                                <div class="characteristics-item <? if(count($arItem['DISPLAY_PROPERTIES']) <= 5 && $arItem['PROPERTIES']['ELEKTROZAPUSK']['VALUE'] == 'да'): ?>characteristics-item1<? elseif(count($arItem['DISPLAY_PROPERTIES']) >= 6 && $arItem['PROPERTIES']['ELEKTROZAPUSK']['VALUE'] == 'да'): ?>characteristics-item2<? elseif(count($arItem['DISPLAY_PROPERTIES']) <= 5): ?>characteristics-item3<? elseif(count($arItem['DISPLAY_PROPERTIES']) >= 6): ?>characteristics-item4<? endif; ?>">
                                    <? //временно 05.04.21?>
                                    <? $count = 0; ?>
                                    <? foreach($arItem['DISPLAY_PROPERTIES'] as $key => $arProperty): ?>
                                        <?
                                        if($count >= 6) {
                                            break;
                                        }
                                        ?>
                                        <? if($arProperty['NAME']): ?>
                                            <div class="characheristic">
                                                <div class="name-characheristic"><?=$arProperty['NAME']?></div>
                                                <div class="value-characheristic"><?=$arProperty['VALUE']?></div>
                                            </div>
                                        <? endif; ?>
                                        <? $count++ ?>
                                    <? endforeach ?>
                                </div>
                                <div class="more-info-item">
                                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее...</a>
                                </div>
                            </div>
                            <div class="right-table-item <? if($arItem['CATALOG_AVAILABLE'] == 'N'): ?>not-available<? endif ?>">
                                <div class="wrapp-available">
                                    <? if($arItem['CATALOG_AVAILABLE'] != 'N'): ?>
                                        <div class="in-avialable">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/in-avialable.svg" alt="">
                                            <span>В наличии</span>
                                        </div>
                                    <? else: ?>
                                        <div class="in-avialable not-avialable">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/not-avialable.svg" alt="">
                                            <span>Нет в наличии</span>
                                        </div>
                                    <? endif; ?>
                                    <? if($arItem['CATALOG_AVAILABLE'] != 'N'): ?>
                                        <div class="avialable-magazine">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/front/img/magazine.svg" alt="">
                                            <? $APPLICATION->IncludeComponent(
                                                "czebra:form",
                                                "availability_ajax",
                                                array(
                                                    "PRODUCT" => $arItem['ID'],
                                                    "ACTIVE" => "N",
                                                    "FORM_ID" => "FORM_AVAILABILITY_SECTION" . $arItem['ID'],
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
                                    <? endif; ?>
                                </div>
                                <div class="rate-item">
                                    <div class="rate">
                                        <input class="input-rating" name="input-name" type="number"
                                               style="display: none"
                                               value="<?=$arItem['CZ_PROPS']['AVERAGE_RATING'] / 20?>" disabled="true">
                                    </div>
                                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>?reviews=Y"
                                       class="count-reviews"><?=$arItem['CZ_PROPS']['REVIEWS_COUNT']?> отзывов</a>
                                </div>
                                <div class="block-price <? if((count($arItem['DISPLAY_PROPERTIES']) <= 5) && $arItem['PROPERTIES']['ELEKTROZAPUSK']['VALUE'] == 'да'): ?>block-price1<? elseif((count($arItem['DISPLAY_PROPERTIES']) >= 6) && $arItem['PROPERTIES']['ELEKTROZAPUSK']['VALUE'] == 'да'): ?>block-price2<? elseif(count($arItem['DISPLAY_PROPERTIES']) <= 5): ?>block-price3<? elseif(count($arItem['DISPLAY_PROPERTIES']) >= 6): ?>block-price4<? endif; ?>">
                                    <? if($arItem['CZ_PROPS']['PRICES']['PRICE']['VALUE'] == 0): ?>
                                        <div class="price-item soon-in-sell">Скоро в продаже</div>
                                    <? else: ?>
                                        <? if($arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'): ?>
                                            <div class="old-price">
                                                <div class="percent">
                                                    -<?=$arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE']?></div>
                                                <div class="value-old-price"><?=$arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></div>
                                            </div>
                                            <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                        <? else: ?>
                                            <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                        <? endif; ?>
                                    <? endif; ?>

                                </div>
                                <? if($arItem['CATALOG_AVAILABLE'] != 'N'): ?>
                                    <?global $USER;?>
                                    <?if($USER->GetId() == '1'):?>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-item.svg" alt="">
                                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>?delivery=Y">Доставка</a>
                                            </div>
                                            <div class="date-delivery"><?=$arItem['CZ_PROPS']['DELIVERY']?></div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/pickup.svg" alt="">
                                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>?pickup=Y">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup"><?=$arItem['CZ_PROPS']['PICKUP']?></div>
                                        </div>
                                    <?else:?>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery"><?=$arItem['CZ_PROPS']['DELIVERY']?></div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup"><?=$arItem['CZ_PROPS']['PICKUP']?></div>
                                        </div>
                                    <?endif;?>

                                <? endif ?>
                                <? if($arItem['CATALOG_AVAILABLE'] != 'N' && ($arItem['CZ_PROPS']['PRICES']['PRICE']['VALUE'] > 0)): ?>
                                    <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart"
                                            data-czbuy="<?=$arItem["ID"]?>">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                        <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '<?=$arItem["ID"]?>')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                    </div>
                                <? else: ?>
                                    <? // подобрать аналог?>
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
                            </div>
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
        <? else: ?>
            <div class="nothing-found">
                <p>К сожалению, ничего не найдено</p>
            </div>
        <? endif ?>
    </div>
    <div class="block-catalog-items mobil-version">

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
                            <a title="В сравнение"
                               class="add-to-compare <?=$arItem['CZ_PROPS']['COMPARED'] === 'Y' ? 'selected' : ''?>"
                               onclick="addToCompare(event, <?=$arItem['ID']?>, '<?=$arItem["DETAIL_PAGE_URL"]?>')"
                               data-id="<?=$arItem['ID']?>"></a>
                            <a href="В избранное"
                               class="add-to-favorites <?=$arItem['CZ_PROPS']['IN_FAV'] === 'Y' ? 'selected' : ''?>"
                               onclick="addToFavs(event, <?=$arItem['ID']?>)" data-id="<?=$arItem['ID']?>"></a>
                        </div>
                        <div class="img-item">
                            <div class="icon-item">
                                <a href="#"
                                   class="add-to-favorites <?=$arItem['CZ_PROPS']['IN_FAV'] === 'Y' ? 'selected' : ''?>"
                                   onclick="addToFavs(event, <?=$arItem['ID']?>)" data-id="<?=$arItem['ID']?>"></a>
                            </div>
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="photo"><img
                                        src="<?=$arItem['CZ_PROPS']['PREVIEW']?>" alt=""></a>
                            <div class="wrapp-price-item">
                                <? if($arItem['CZ_PROPS']['PRICES']['PRICE']['VALUE'] == 0): ?>
                                    <div class="price-item soon-in-sell">Скоро в продаже</div>
                                <? else: ?>
                                    <? if($arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'): ?>
                                        <div class="old-price">
                                            <div class="percent">
                                                -<?=$arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE']?></div>
                                            <div class="value-old-price"><?=$arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></div>
                                        </div>
                                        <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                    <? else: ?>
                                        <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                    <? endif; ?>
                                <? endif; ?>
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
                                    <div class="bg-rate"><span><span class="bg-color"></span></span></div>
                                    <a href="#" class="count-rate">79</a>
                                </div>
                                <? /*
                            <div class="bonus-item">
                                +1000 бонусов <a href="#"></a>
                            </div>
                            */ ?>
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
                            <? if($arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] == 'Y'): ?>
                                <div class="wrapp-price-item">
                                    <div class="old-price">
                                        <div class="percent">
                                            -<?=$arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER_PERCENTAGE']?></div>
                                        <div class="value"><?=$arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></div>
                                    </div>
                                    <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                </div>
                            <? else: ?>
                                <div class="wrapp-price-item">
                                    <div class="price-item"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
                                </div>
                            <? endif; ?>
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
                                    <a href="javascript:void(0)" class="btn-site1 analog" data-id="<?=$arItem['ID']?>"
                                       onclick="$('#btn_form_FORM_ANALOG_SECTION' + $(this).data('id')).click();"
                                    >
                                         <span class="btn-trans">Подобрать аналог</span>
                                         <span class="btn-anim">Подобрать аналог</span>
                                    </a>
                                </span>
                                </div>
                            <? endif ?>


                        </div>
                    </div>
                </div>
                <? //форма аналога?>

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
            <? endforeach; ?>
            <? if($arResult["NAV_RESULT"]->nEndPage > 1 && $arResult["NAV_RESULT"]->NavPageNomer < $arResult["NAV_RESULT"]->nEndPage): ?>
                <div class="more-item">
                    <a data-ajax-id="<?=$bxajaxid?>" href="javascript:void(0)"
                       data-show-more="<?=$arResult["NAV_RESULT"]->NavNum?>"
                       data-next-page="<?=($arResult["NAV_RESULT"]->NavPageNomer + 1)?>"
                       data-max-page="<?=$arResult["NAV_RESULT"]->nEndPage?>">Показать еще</a>
                </div>
            <? endif ?>
        <? else: ?>
            <div class="nothing-found">
                <p>К сожалению, ничего не найдено</p>
            </div>
        <? endif; ?>
    </div>

</div>
