<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$delivery = new \Czebra\Project\DeliveryController();
global $cityInfo;
?>
<? if($_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] == 'delivery'): ?>
    <?
    $companyId = $_SESSION['CZ_ORDER']['DELIVERY']['DELIVERY_COMPANY_ID'];
    $address = $_SESSION['CZ_ORDER']['DELIVERY']['CITY'] . ', улица ' . $_SESSION['CZ_ORDER']['DELIVERY']['STREET'] . ', дом ' . $_SESSION['CZ_ORDER']['DELIVERY']['HOUSE'] . ', квартира/офис ' . $_SESSION['CZ_ORDER']['DELIVERY']['APARTMENT'] . ', корпус ' . ($_SESSION['CZ_ORDER']['DELIVERY']['CORPUS'] ?: '-');
    ?>
    <input type="hidden" name="DELIVERY_ID" id="ID_DELIVERY_ID_<?=$companyId?>" value="<?=$companyId?>"
           checked="checked">
    <input type="hidden" name="ORDER_PROP_5" value="Доставка транспортной компанией">
    <input type="hidden" name="ORDER_PROP_6" value="<?=$address?>">

    <? if($cityInfo['NAME'] !== 'Минск'): ?>
        <input type="hidden" id="ORDER_PROP_3" name="ORDER_PROP_3"
               value="<?=$_SESSION['CZ_ORDER']['DELIVERY']['LOCATION_ID'] ? $_SESSION['CZ_ORDER']['DELIVERY']['LOCATION_ID'] : $cityInfo['LOCATION_ID']?>">
    <? endif ?>
    <div class="item-info-confirm">
        <div class="name-item-info-confirm">
            <span><img src="<?=SITE_TEMPLATE_PATH?>/front/img/union.svg" alt=""></span> Доставка
        </div>
        <?
        $delivery_way = $_SESSION['CZ_ORDER']['DELIVERY']['DELIVERY_COMPANY_NAME'] ? $_SESSION['CZ_ORDER']['DELIVERY']['DELIVERY_COMPANY_NAME'] : 'транспортной компанией до терминала';
        ?>
        <div class="detail-info-confirm">
            <p>Способ доставки: <span><?=$delivery_way?></span></p>
            <p>Адрес:
                <span>г. <?=$_SESSION['CZ_ORDER']['CITY']['NAME']?>, <?=$_SESSION["CZ_ORDER"]["DELIVERY"]["STREET"]?>, д. <?=$_SESSION["CZ_ORDER"]["DELIVERY"]["HOUSE"]?>, <?=$_SESSION["CZ_ORDER"]["DELIVERY"]["APARTMENT"]?></span>
            </p>
            <? if($_SESSION["CZ_ORDER"]["DELIVERY"]["COMMENT"]): ?>
                <p>Дополнительная информация: <span><?=$_SESSION["CZ_ORDER"]["DELIVERY"]["COMMENT"]?></span></p>
            <? endif ?>
            <p>Дата доставки: <span>уточняется менеджером</span></p>

            <a href="/personal_section/cart/order_address/?from_confirm=Y" class="edit-info">Изменить</a>
        </div>
    </div>
<? elseif($_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] == 'pickup'): ?>
    <input type="hidden" name="DELIVERY_ID" id="ID_DELIVERY_ID_3" value="3" checked="checked">
    <input type="hidden" name="ORDER_PROP_5" value="Самовывоз">
    <?
    $pickupInfo = [];
    $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_DESCRIPTION", "PROPERTY_CITY.NAME");
    $arFilter = array("IBLOCK_ID" => "28", "ID" => $_SESSION['CZ_ORDER']['DELIVERY']['PICKUP_SHOP_ID']);
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
    if($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $pickupInfo['DESCRIPTION'] = strip_tags($arFields['~PROPERTY_DESCRIPTION_VALUE']['TEXT']);
        $pickupInfo['CITY'] = $arFields['PROPERTY_CITY_NAME'];
    }
    ?>
    <input type="hidden" name="ORDER_PROP_6" value="<?=$pickupInfo['CITY']?>, <?=$pickupInfo['DESCRIPTION']?>">
    <? if($cityInfo['NAME'] !== 'Минск'): ?>
        <input type="hidden" name="ORDER_PROP_3" id="ORDER_PROP_3" value="<?=$cityInfo['LOCATION_ID']?>">
    <? endif ?>
    <div class="item-info-confirm">
        <div class="name-item-info-confirm">
            <span><img src="<?=SITE_TEMPLATE_PATH?>/front/img/union.svg" alt=""></span> Доставка
        </div>
        <div class="detail-info-confirm">
            <p>Способ доставки: <span>Самовывоз</span></p>
            <p>Адрес: <span><?=$pickupInfo['CITY']?>, <?=$pickupInfo['DESCRIPTION']?></span></p>
            <a href="/personal_section/cart/order_address/?from_confirm=Y" class="edit-info">Изменить</a>
        </div>
    </div>
<? elseif($_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] == 'delivery_moscow'): ?>
    <?
    $address = $_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW'] . ', улица ' . $_SESSION['CZ_ORDER']['DELIVERY']['STREET_MOSCOW'] . ', дом ' . $_SESSION['CZ_ORDER']['DELIVERY']['HOUSE_MOSCOW'] . ', квартира/офис ' . $_SESSION['CZ_ORDER']['DELIVERY']['APARTMENT_MOSCOW'] . ', корпус ' . ($_SESSION['CZ_ORDER']['DELIVERY']['CORPUS_MOSCOW'] ?: '-');
    ?>
    <input type="hidden" name="ORDER_DESCRIPTION" value="<?=$_SESSION['CZ_ORDER']['DELIVERY']['COMMENT_MOSCOW']?>">
    <input type="hidden" name="DELIVERY_ID" id="ID_DELIVERY_ID_<?=$delivery->getDeliveryMoscowId()?>"
           value="<?=$delivery->getDeliveryMoscowId()?>" checked="checked">
    <input type="hidden" name="ORDER_PROP_5" value="Доставка по Москве и МО">
    <input type="hidden" name="ORDER_PROP_6" value="<?=$address?>">
    <? if($cityInfo['NAME'] !== 'Минск'): ?>
        <input type="hidden" name="ORDER_PROP_3" id="ORDER_PROP_3"
               value="<?=$_SESSION['CZ_ORDER']['DELIVERY']['LOCATION_ID_MOSCOW'] ? $_SESSION['CZ_ORDER']['DELIVERY']['LOCATION_ID_MOSCOW'] : $cityInfo['LOCATION_ID']?>">
    <? endif ?>

    <?
    $pickupInfo = [];
    $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_DESCRIPTION", "PROPERTY_CITY.NAME");
    $arFilter = array("IBLOCK_ID" => "28", "ID" => $_SESSION['CZ_ORDER']['DELIVERY']['PICKUP_SHOP_ID']);
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
    if($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $pickupInfo['DESCRIPTION'] = strip_tags($arFields['~PROPERTY_DESCRIPTION_VALUE']['TEXT']);
        $pickupInfo['CITY'] = $arFields['PROPERTY_CITY_NAME'];
    }
    ?>
    <div class="item-info-confirm">
        <div class="name-item-info-confirm">
            <span><img src="<?=SITE_TEMPLATE_PATH?>/front/img/union.svg" alt=""></span> Доставка
        </div>
        <div class="detail-info-confirm">
            <p>Способ доставки: <span>курьером по Москве и МО</span></p>
            <p>Адрес: <span><?=$_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW']?></span>,
                <span><?=$_SESSION['CZ_ORDER']['DELIVERY']['STREET_MOSCOW']?>, </span>
                <span><?=$_SESSION['CZ_ORDER']['DELIVERY']['HOUSE_MOSCOW']?>, </span>
                <span><?=$_SESSION['CZ_ORDER']['DELIVERY']['APARTMENT_MOSCOW']?></span>
            </p>
            <a href="/personal_section/cart/order_address/?from_confirm=Y" class="edit-info">Изменить</a>
        </div>
    </div>
<? endif; ?>


