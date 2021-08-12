<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
global $cityInfo;
$res = \Bitrix\Sale\Location\LocationTable::getList(array(
    'filter' => array('=NAME.LANGUAGE_ID' => LANGUAGE_ID, 'ID' => $_SESSION['CZ_ORDER']['CITY']['ID']),
    'select' => array('NAME_RU' => 'NAME.NAME', 'ID')
));
if ($item = $res->fetch()) {
    $locationCode = $item['ID'];
}
$items = [];
foreach ($arResult['BASKET_ITEMS'] as $item) {
    $items[] = [
        'PRODUCT_ID' => $item['PRODUCT_ID'],
        'NAME' => $item['NAME'],
        'PRICE' => $item['PRICE'],
        'CURRENCY' => $item['CURRENCY'],
        'QUANTITY' => $item['QUANTITY'],
        'WEIGHT' => $item['WEIGHT']
    ];
}
$deliveries = \Czebra\Project\Delivery::calc(1811, $_SESSION['CZ_ORDER']['CITY']['ID'], $items);


$logos = \Czebra\Project\C6v::getDeliveriesLogos();
foreach ($deliveries as &$delivery) {
    foreach ($deliveries as &$delivery) {
        foreach ($logos as $name => $logo) {
            if (strpos(mb_strtolower($delivery['NAME']), mb_strtolower($name)) !== false) {
                $delivery['LOGOTIP'] = $logo;
            }
        }
        if (!$delivery['LOGOTIP']) {
            $delivery['LOGOTIP'] = $logos['default'];
        }
    }
}
$selectedCompanyId = $_SESSION['CZ_ORDER']['DELIVERY']['DELIVERY_COMPANY_ID'];
$selectedCompany = $_SESSION['CZ_ORDER']['DELIVERY']['DELIVERY_COMPANY_NAME'];
?>
<?

$freeDeliveryStartsWith = CSaleDiscount::GetByID(4)['NAME'];

$deliveryConditions = (new \Czebra\Project\DeliveryController())->getTCDeliveryConditions();

?>

<? if ($deliveryConditions['CODE'] == \Czebra\Project\DeliveryController::ONLY_PICKUP_RF): ?>
    <div class="delivery_moscow_alert">
        Данный вид доставки возможен только при покупке
        от <?= $deliveryConditions['MIN_PRICE_FOR_CONDITION'] ?>
        руб.
    </div>
<? else: ?>
    <? if (!$_SESSION['CZ_ORDER']['CITY']['ID']): ?>
        <p class="title-delivery" style="color: red">Выберите город</p>
    <? elseif (count($deliveries) == 0): ?>
        <p class="title-delivery">К сожалению, доставка в выбранный город не осуществляется</p>
    <? elseif ($deliveryConditions['CODE'] !== \Czebra\Project\DeliveryController::FREE_DELIVERY): ?>

        <?
        if ($deliveryConditions['PRICE'] == 0) {
            $deliveryTCPrice = "<span class='icon-is-free'>Бесплатно</span>";
        } else {
            $deliveryTCPrice = '<b>' . $deliveryConditions['PRICE'] . '<span class="rubl">i</span>' . '</b>';
        }
        ?>
        <div class="free_delivery_badge">
            <p class="sum-delivery">Стоимость доставки до терминала транспортной компании <?= $deliveryTCPrice ?></p>
        </div>

        <p class="title-delivery">Выберите компанию</p>
        <div class="table-company">
            <div class="head-table">
                <div class="name-company">Способ доставки</div>
                <div class="price-company">Стоимость доставки <span> <div class="hidden-message">В стоимость не включена доставкка до транспортной компании</div></span>
                </div>
                <div class="time-delivery-company">Сроки доставки <span> <div class="hidden-message">В стоимость не включена доставкка до транспортной компании</div></span>
                </div>
            </div>

            <div class="body-table">
                <? if (count($deliveries)): ?>
                    <? foreach ($deliveries as $deliveryItem): ?>
                        <div class="item-company">
                            <input type="radio" name="DELIVERY_ID" autocomplete="off"
                                   id="DELIVERY_<?= $deliveryItem['ID'] ?>" value="<?= $deliveryItem['ID'] ?>"
                                   data-name="<?= $deliveryItem['NAME'] ?>"
                                   <? if ($selectedCompanyId == $deliveryItem['ID']): ?>checked<? endif; ?>>
                            <label for="DELIVERY_<?= $deliveryItem['ID'] ?>">
                                <div class="wrapp-name-company">
                                    <div class="img-company"><img src="<?= $deliveryItem['LOGOTIP'] ?>" alt=""></div>
                                    <div class="name-company"><?= $deliveryItem['NAME'] ?> <?= $deliveryItem['DESCRIPTION'] ?></div>
                                </div>
                                <div class="price-delivery-company"><?= $deliveryItem['PRICE'] ?> руб.</div>
                                <div class="time-delivery-company"><?= $deliveryItem['ADDITIONAL']['days'] ?> дн.</div>
                            </label>
                        </div>
                    <? endforeach ?>

                <? endif ?>
            </div>

        </div>
        <div class="warning-message-company">
            <p>Стоимость доставки может быть изменена в случае смены расценок транспортных компаний или при заказе
                дополнительных услуг (страховка, паллетирование и др.). У некоторых транспортных компаний доставка
                оплачивается частично при получении товара. Подробности вам сообщит менеджер.</p>
            <p>Сроки доставки указаны на основе данных транспортных компаний и в зависимости от даты оплаты они могут
                сдвигаться.</p>
        </div>

    <? else: ?>
        <div class="free_delivery_badge">
            <p class="sum-delivery">Стоимость доставки <span class="icon-is-free">Бесплатно</span></p>
        </div>

    <? endif; ?>
<? endif ?>


