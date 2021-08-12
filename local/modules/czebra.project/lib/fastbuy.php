<?php

namespace Czebra\Project;

use Bitrix\Main\Context;
use Bitrix\Sale;

class FastBuy
{
    public static function create($name, $phone)
    {
        \Bitrix\Main\Loader::includeModule("sale");
        \Bitrix\Main\Loader::includeModule("catalog");
        global $cityInfo;

        $siteId = Context::getCurrent()->getSite();
        $currency = \Bitrix\Currency\CurrencyManager::getBaseCurrency();
        $userId = Sale\Fuser::getId();
        $basket = Sale\Basket::loadItemsForFUser($userId, $siteId);
        $order = Sale\Order::create($siteId, $userId);
        $order->setPersonTypeId(1); // Устанавливаем тип покупателя - Физические лица (ID=1)
        $order->setField('USER_DESCRIPTION', 'Быстрый заказ'); // Комментарий к заказу
        $order->setBasket($basket);
        $propertyCollection = $order->getPropertyCollection();
        $propertyNameValue = $propertyCollection->getItemByOrderPropertyId(1);
        $propertyNameValue->setField('VALUE', $name);

        if($cityInfo['LOCATION']){
            $propertyLocation = $propertyCollection->getItemByOrderPropertyId(3);
            $propertyLocation->setField('VALUE', $cityInfo['LOCATION']);
        }

        $propertyValue = $propertyCollection->getItemByOrderPropertyId(2);
        $propertyValue->setField('VALUE', $phone);
        $order->doFinalAction(true);
        $order->save();
        $result = [
            "ID" => $order->getId()
        ];
        return $result;
    }
}
