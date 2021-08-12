<?php

namespace Czebra\Project;
use Bitrix\Sale;


class EmailModified
{
    public static function Init($orderID, &$eventName, &$arFields)
    {
        $isFastOrder = $arFields['USER_DESCRIPTION'] == 'Быстрый заказ' ? 'Y' : 'N';

	    global $cityInfo;

        if($arFields['USER_DESCRIPTION'] == 'Быстрый заказ'){
            $eventName = 'CZ_FORM_BUY_ONE_CLICK';
            $arFields['CITY'] = $cityInfo['NAME'];
        }

        $fieldsToAdd = [
           'DELIVERY_TYPE',
           'DELIVERY_DESTINATION',
           'PHONE',
           'LOCATION'
        ];

        $order = Sale\Order::load($orderID);
        $propertyCollection = $order->getPropertyCollection();
        $ar = $propertyCollection->getArray();
        foreach ($ar['properties'] as $property){
            if(in_array($property['CODE'], $fieldsToAdd)){
                $arFields[$property['CODE']] = $property['VALUE'][0];
            }
        }

        // Рассылка дилерам
        if($eventName == 'SALE_NEW_ORDER' || $eventName = 'CZ_FORM_BUY_ONE_CLICK') {
            $selectedCity = \Bitrix\Iblock\Elements\ElementCitiesTable::query()
                ->setSelect(['*', 'DEALER_EMAIL', 'LOCATION'])
                ->setFilter(['LOCATION.VALUE' => $cityInfo['LOCATION']])
                ->fetchCollection();
            $arFields['DEALERS'] = '';
            foreach($selectedCity as $city){
                $dealerEmails = $city->getDealerEmail() ? $city->getDealerEmail()->getAll() : [];
                foreach($dealerEmails as $email){
                    $arFields['DEALERS'] .= $email->getValue() . ', ';
                }
            }
        }

        //Служба доставки
        if(!$arFields['DELIVERY_TYPE']){
            $shipmentCollection = $order->getShipmentCollection();
            foreach($shipmentCollection as $shipment) {
                $arShipmentName[$shipment->getDeliveryId()] = $shipment->getDeliveryName();
            }
            $arFields['DELIVERY_TYPE'] =  implode(', ', $arShipmentName);
        }

        //Способ оплаты
        $paymentCollection = $order->getPaymentCollection();
        foreach($paymentCollection as $payment) {
            $arPaymentName[$payment->getPaymentSystemId()] = $payment->getPaymentSystemName();
        }
        $arFields["PAY_SYSTEM_NAME"] =  implode(', ', $arPaymentName);

        //Стоимость доставки
        $arFields['DELIVERY_PRICE'] = CurrencyFormat($order->getDeliveryPrice(), $order->getCurrency());

        //Стоимость товаров
        $basket = $order->getBasket();
        $discountPrice = 0;
        $basePrice = 0;
        $links = '';

        foreach ($basket as $basketItem) {
            $quantity = $basketItem->getQuantity();
            $price = $basketItem->getPrice();
            $name = $basketItem->getField('NAME');
            $link = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $basketItem->getField('DETAIL_PAGE_URL');
            $link_str = $name . ' - ' . $quantity . ' шт x ' . $price . ' руб.' . ' - <a href="' . $link . '" target="_blank">' . $link . '</a><br>';
            $links .= $link_str;

            $discountPrice += $basketItem->getField('DISCOUNT_PRICE') * intval($basketItem->getQuantity());
            $basePrice += $basketItem->getField('BASE_PRICE') * intval($basketItem->getQuantity());
        }
        $arFields['ITEMS_LINKS'] = $links;

        $arFields['ITEMS_BASE_PRICE'] = CurrencyFormat($basePrice, $order->getCurrency());

        //Сумма скидки
        $arFields['DISCOUNT_PRICE'] = CurrencyFormat($discountPrice, $order->getCurrency());

        //Комментарий
        $arFields["USER_DESCRIPTION"] =  $order->getField('USER_DESCRIPTION');


        if($arFields['USER_DESCRIPTION'] == 'Быстрый заказ'){
            \Bitrix\Main\Diag\Debug::writeToFile($arFields, "", "/log/fastorders.txt");
        } else{
            $write = [
                'EVENT' => $eventName,
                'ORDER' => $arFields,
                'SESSION_ORDER' => $_SESSION['CZ_ORDER'],
	            'CITY' => $cityInfo
            ];
            \Bitrix\Main\Diag\Debug::writeToFile($write, "", "/log/orders.txt");
        }

    }
}
