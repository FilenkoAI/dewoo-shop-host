<?php

namespace Czebra\Project;

use Bitrix\Main;
use \Bitrix\Main\Context;
use \Bitrix\Sale;

class OrderHandler
{
    public static function RemoveDeliveryType(&$arFields)
    {
        $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['PICKUP_SHOP_ID'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['ORDER_DELIVERY_ID'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['CITY'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['STREET_MOSCOW'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['CORPUS_MOSCOW'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['HOUSE_MOSCOW'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['APARTMENT_MOSCOW'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['COMMENT_MOSCOW'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['STREET'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['HOUSE'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['CORPUS'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['APARTMENT'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW_ID'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['LOCATION_ID_MOSCOW'] = '';
        $_SESSION['CZ_ORDER']['DELIVERY']['LOCATION_ID'] = '';
        $_SESSION['CZ_ORDER']['CITY']['NAME'] = '';
        $_SESSION['CZ_ORDER']['CITY']['ID'] = '';
    }
    public static function Clear(Main\Event $event)
    {
        $_SESSION['CZ_ORDER'] = [];
    }
}
