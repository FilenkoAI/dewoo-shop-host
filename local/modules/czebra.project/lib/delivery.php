<?php
namespace Czebra\Project;

use \Bitrix\Main\Context;
use \Bitrix\Sale;

class Delivery
{
    const PERSONAL_TYPE = 1;
    const CURRENCY = 'RUB';

    public function calc($productId, $locationCode, $arProducts = [])
    {
        \Bitrix\Main\Loader::includeModule("sale");

        $siteId = Context::getCurrent()->getSite();
        $userId = Sale\Fuser::getId();
        if ($arProducts == []) {
            $products = [
                [
                    'PRODUCT_ID' => $productId,
                    'NAME' => 'Товар 1',
                    'PRICE' => 1390,
                    'CURRENCY' => self::CURRENCY,
                    'QUANTITY' => 1,
                    'WEIGHT' => 813
                ]
            ];
        } else {
            $products = $arProducts;
        }
        $basket = Sale\Basket::create(SITE_ID);
        foreach ($products as $product)
        {
            $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
            unset($product["PRODUCT_ID"]);
            $item->setFields($product);
        }
        $order = Sale\Order::create($siteId, $userId);
        $order->setPersonTypeId(self::PERSONAL_TYPE);
        $order->setBasket($basket);



        $zipCode = Location::getZipCode($locationCode);
        $propertyCollection = $order->getPropertyCollection();
        $propertyNameValue = $propertyCollection->getDeliveryLocation();
        $propertyNameValue->setField('VALUE', $locationCode);
        $propertyNameValue = $propertyCollection->getDeliveryLocationZip();
        $propertyNameValue->setField('VALUE', $zipCode);

        $shipmentCollection = $order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem();
        $shipment->setField('CURRENCY', self::CURRENCY);
        $shipmentItemCollection = $shipment->getShipmentItemCollection();
        foreach ($basket as $basketItem) {
            $item = $shipmentItemCollection->createItem($basketItem);
            $item->setQuantity($basketItem->getQuantity());
        }

        $arDeliveryServiceAll = Sale\Delivery\Services\Manager::getRestrictedObjectsList($shipment);
        foreach ($arDeliveryServiceAll as $service) {
            if (!$service->isCalculatePriceImmediately()) {
                $calcResult = $service->calculate($shipment);
                if ($calcResult->isSuccess()) {
                    $price = Sale\PriceMaths::roundPrecision($calcResult->getPrice());
                    $code = \Bitrix\Sale\Delivery\Services\Manager::getById($service->getId());
                    $profile = str_replace('atl_s6v:', '', $code);
                    $result[] = [
                        "ID" => $service->getId(),
                        "NAME" => $service->getName(),
                        "NAME_WITH_PARENT" => $service->getNameWithParent(),
                        "PRICE" => $price,
                        "LOGOTIP" => $service->getLogotip(),
                        "LOGOTIP_PATH" => $service->getLogotipPath(),
                        "PERIOD_FROM" => $calcResult->getPeriodFrom(),
                        "PERIOD_TO" => $calcResult->getPeriodTo(),
                        "PERIOD_TYPE" => $calcResult->getPeriodType(),
                        "DESCRIPTION" => $service->getDescription(),
                        "PROFILE" => $profile,
                        "ADDITIONAL" => $_SESSION['atl_c6v']['last_calculate'][$profile['CODE']],
                    ];
                }
            }
        }
        return $result;
    }
}
