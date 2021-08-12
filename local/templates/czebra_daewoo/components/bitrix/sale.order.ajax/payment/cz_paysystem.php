<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
global $cityInfo;
$arPaymentsForDeliveries = [
    'pickup' => [
        'online_card', 'bank_bill', 'cash_shop', 'card_shop'
    ],
    'delivery' => [
        'online_card', 'bank_bill'
    ],
    'delivery_moscow' => ['online_card', 'courier_card', 'bank_bill', 'cash_courier']
];
?>
<div class="list-type-payment">
    <div class="title-block">Выберите способ оплаты</div>
    <div class="list-items-type-payment">
        <? foreach ($arResult["PAY_SYSTEM"] as $arPaySystem): ?>
            <?if(!in_array($arPaySystem['CODE'], $arPaymentsForDeliveries[$_SESSION['CZ_ORDER']['DELIVERY']['TYPE']])) continue;?>
            <div class="wrapp-radio">
                <input type="radio" name="PAY_SYSTEM_ID" class="style-input-radio"
                       id="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>" value="<?=$arPaySystem["ID"]?>"
                       class="css-checkbox"
                       onclick="changePaymentType(<?=$arPaySystem['ID']?>);" <? if ($_SESSION['CZ_ORDER']['DELIVERY']["PAYSYSTEM_ID"] == $arPaySystem['ID']) echo " checked=\"checked\""; ?> />
                <label for="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>" class="style-label-radio">
                    <div class="img-type-payment"><img src="<?=$arPaySystem['PSA_LOGOTIP']['SRC']?>" alt=""></div>
                    <div class="text-type-payment">
                        <div class="title-type-payment"><?=$arPaySystem['NAME']?></div>
                        <div class="descr-type-payment"><?=$arPaySystem['DESCRIPTION']?></div>
                    </div>
                </label>
            </div>
            <input type="hidden" value="<?=$arPaySystem["ID"]?>">
        <? endforeach ?>
    </div>
</div>

<script>
    function changePaymentType(id){
        $('#paysystem_id').val(id);
        BX.ajax.runAction('czebra:project.api.changeorderproperty.changepaysystem', {
            data: {
                val: id
            }
        });
    }
</script>