<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>
<div class="wrapp-list-purchase-history">
    <?if(count($arResult['ORDERS']) > 0):?>
        <?foreach ($arResult['ORDERS'] as $key => $order) :?>
            <div class="item-purchase-history">
                <div class="info-detail-purchase-history">
              
                    <div class="number-order-purchase-history"><?=Loc::getMessage('SPOL_TPL_ORDER')?> <?=Loc::getMessage('SPOL_TPL_NUMBER_SIGN').$order['ORDER']['ACCOUNT_NUMBER']?> <?=Loc::getMessage('SPOL_TPL_FROM_DATE')?> <?=$order['ORDER']['DATE_INSERT_FORMATED']?></div>
                    <div class="type-payment-purchase-history">Способ оплаты <img src="<?=$arResult['CZ_PAY_SYSTEMS'][$order['PAYMENT'][0]['PAY_SYSTEM_ID']]['LOGO']?>" alt=""></div>
                    <div class="type-delivery-purchase-history">Способ получения <span>товара</span> <img src="<?=SITE_TEMPLATE_PATH?>/front/img/delivery-item.svg" alt=""></div>
                </div>
            <div class="table-item-purchase-history">
                <div class="head-table-purchase-history">
                    <div class="product">Товар</div>
                    <div class="price">Стоимость</div>
                    <div class="count">Количество</div>
                    <div class="sum-price">Итого</div>
                    <?/*
                    <div class="accrued-bonus">Начислено бонусов</div>
                    */?>
                </div>

                <?foreach ($order['BASKET_ITEMS'] as $keyItem => $itemBasket) :?>
                    <div class="body-table-purchase-history">
                        <div class="product-name">
                            <div class="img-item-purchase-history">
                                <a href="<?=$itemBasket['DETAIL_PAGE_URL']?>"><img src="<?=$itemBasket["PREVIEW_PICTURE"]?>" alt=""></a>
                            </div>
                            <div class="name-item-purchase-history"><a href="<?=$itemBasket['DETAIL_PAGE_URL']?>"><?=$itemBasket['NAME']?></a></div>
                        </div>
                        <div class="price-item-purchase-history"><?= $itemBasket["PRICE_FORMATED"] ?></div>
                        <div class="count-item-purchase-history"><?=$itemBasket['QUANTITY']?> <?=$itemBasket['MEASURE_NAME']?>.</div>
                        <div class="sum-price-item-purchase-history"><?= $itemBasket["TOTAL_PRICE_FORMATED"] ?></div>
                        <?/*
                        <div class="accrued-bonus-item-purchase-history">54</div>
                        */?>
                    </div>

                <?endforeach?>
                <div class="total-price-and-bonus">
                    <div class="price_delivery"><p>Стоимость доставки:</p> <?=$order['DELIVERY_PRICE_FORMATED']?></div>
                    <div class="total-price"><p>Итого: </p> <?= str_replace('руб.', '<span class=\'rubl\'>c</span>', $order['ORDER']['FORMATED_PRICE']) ?></div>
                    <?/*
                    <div class="total-bonus">640 <span>бонусов</span></div>
                     */?>
                </div>
            </div>
            </div>
        <?endforeach?>
    <?else:?>
        <p>Ничего не найдено</p>
    <?endif;?>
</div>
<?=$arResult["NAV_STRING"]?>


