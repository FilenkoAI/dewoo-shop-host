<?php

namespace Czebra\Project\Controller;

use Bitrix\Main;
use Bitrix\Sale;

class ChangeOrderProperty extends Main\Engine\Controller
{
    public function configureActions(): array
    {
        return [
            'changedelivery' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ],
            'changedeliverytype' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ],
            'changepaysystem' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ],
            'changedeliverycity' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ],
            'changedeliverycitymoscow' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ]
        ];
    }

    public function changeDeliveryAction($key, $val)
    {
        $_SESSION['CZ_ORDER']['DELIVERY'][$key] = trim($val);
    }

    public function changeDeliveryTypeAction($type)
    {
        if($type === \Czebra\Project\DeliveryController::NAME_DELIVERY_TC ||
            $type === \Czebra\Project\DeliveryController::NAME_DELIVERY_MOSCOW ||
            $type === \Czebra\Project\DeliveryController::NAME_DELIVERY_PICKUP
        ) { 
            $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] = trim($type);
            $deliveryData = \Czebra\Project\DeliveryController::getDeliveryPrice($_SESSION['CZ_ORDER']['DELIVERY']['TYPE']);
            switch ($_SESSION['CZ_ORDER']['DELIVERY']['TYPE']) {
                case \Czebra\Project\DeliveryController::NAME_DELIVERY_PICKUP:
                    $deliveryName = 'Самовывоз';
                    break;
                case \Czebra\Project\DeliveryController::NAME_DELIVERY_MOSCOW:
                    $deliveryName = 'Доставка по Москве и МО';
                    break;
                case \Czebra\Project\DeliveryController::NAME_DELIVERY_TC:
                    $deliveryName = 'До терминала ТК в Москве';
                    break;
            }
            $deliveryData['TYPE'] = $deliveryName;
            $deliveryData['TOTAL'] = number_format(intval($deliveryData['TOTAL']), 0, '.', ' ');
            $deliveryData['DELIVERY_PRICE'] = number_format(intval($deliveryData['DELIVERY_PRICE']), 0, '.', ' ');
            $deliveryData['PRICE'] = number_format(intval($deliveryData['PRICE']), 0, '.', ' ');

            return $deliveryData;
        } else {
            return -1;
        }
    }

    public function changePaysystemAction($val)
    {
        $_SESSION['CZ_ORDER']['DELIVERY']['PAYSYSTEM_ID'] = trim($val);
    }

    public function changeDeliveryCityAction($val, $id)
    {
        $_SESSION['CZ_ORDER']['CITY']['ID'] = $id;
        $_SESSION['CZ_ORDER']['DELIVERY']['LOCATION_ID'] = $id;

        $res = \Bitrix\Sale\Location\LocationTable::getList(array(
            'filter' => array('=NAME.LANGUAGE_ID' => LANGUAGE_ID, 'ID' => $id),
            'select' => array('NAME_RU' => 'NAME.NAME', 'ID', 'CODE')
        ));
        if($item = $res->fetch()) {
            $name = $item['NAME_RU'];
        }
        $_SESSION['CZ_ORDER']['CITY']['NAME'] = $name;
        $_SESSION['CZ_ORDER']['DELIVERY']['CITY'] = $name;

    }

    public function changeDeliveryCityMoscowAction($id)
    {
        $_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW_ID'] = $id;

        $res = \Bitrix\Sale\Location\LocationTable::getList(array(
            'filter' => array('=NAME.LANGUAGE_ID' => LANGUAGE_ID, 'ID' => $_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW_ID']),
            'select' => array('NAME_RU' => 'NAME.NAME', 'ID', 'CODE')
        ));

        if($item = $res->fetch()) {
            $name = $item['NAME_RU'];
            $code = $item['CODE'];
        }
        $_SESSION['CZ_ORDER']['CITY']['NAME'] = $name;
        $_SESSION['CZ_ORDER']['DELIVERY']['CITY_MOSCOW'] = $name;
        $_SESSION['CZ_ORDER']['DELIVERY']['LOCATION_ID_MOSCOW'] = $id;
    }

}