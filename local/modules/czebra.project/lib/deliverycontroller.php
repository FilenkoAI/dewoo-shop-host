<?php

namespace Czebra\Project;

use \Bitrix\Highloadblock as HL;
use Bitrix\Sale;

class DeliveryController
{
    const HBID = 6;
    //id элементов в HB регулирующих доставку
    const MO_PICKUP = 1; // сумма оказалась меньше 3000, доставка невозможна
    const MO_NOT_FREE_DELIVERY = 2; // сумма в промежутке от 3000 до 10000, платная доставка
    const MO_FREE_DELIVERY = 3; // бесплатная доставка
    const ONLY_PICKUP_RF = 4; // для регионов доступна только доставка самовывозом
    const TO_TERMINAL_MOSCOW = 5; // платная доставка до терминала ТК
    const FREE_DELIVERY = 6; // бесплатная доставка в регионы
    const FREE_MOSCOW_DELIVERY_ID = 119;
    const PAID_MOSCOW_DELIVERY_ID = 2;
    const NAME_DELIVERY_TC = 'delivery';
    const NAME_DELIVERY_PICKUP = 'pickup';
    const NAME_DELIVERY_MOSCOW = 'delivery_moscow';
    public $price = 0;
    public $conditions = [];

    public function __construct()
    {
        $this->price = $this->getCartPrice();
        $this->conditions = $this->getConditions();
    }

    private function getCartPrice()
    {
//        if(!\Bitrix\Main\Loader::includeModule("sale")){
//            return false;
//        }
//        $basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), \Bitrix\Main\Context::getCurrent()->getSite());
        $basket = self::getBasketWithDiscount();
        $price = $basket['ORDER_PRICE'];
        return $price;
    }

    public function getMoscowDeliveryConditions()
    {

        if($this->price < $this->conditions[self::MO_PICKUP]['UF_PRICE_TO']) {
            $result = [
                'CODE' => self::MO_PICKUP,
                'MIN_PRICE_FOR_CONDITION' => $this->conditions[self::MO_PICKUP]['UF_PRICE_TO'],
                'DESCRIPTION' => $this->conditions[self::MO_PICKUP]['UF_DELIVERY_DESCRIPTION']
            ];
        } elseif($this->price >= $this->conditions[self::MO_NOT_FREE_DELIVERY]['UF_PRICE_FROM'] && $this->price < $this->conditions[self::MO_NOT_FREE_DELIVERY]['UF_PRICE_TO']) {
            $result = [
                'CODE' => self::MO_NOT_FREE_DELIVERY,
                'PRICE' => $this->conditions[self::MO_NOT_FREE_DELIVERY]['UF_DELIVERY_PRICE'],
                'DESCRIPTION' => $this->conditions[self::MO_NOT_FREE_DELIVERY]['UF_DELIVERY_DESCRIPTION']
            ];
        } else {
            $result = [
                'CODE' => self::MO_FREE_DELIVERY,
                'PRICE' => $this->conditions[self::MO_FREE_DELIVERY]['UF_DELIVERY_PRICE'],
                'DESCRIPTION' => $this->conditions[self::MO_FREE_DELIVERY]['UF_DELIVERY_DESCRIPTION']
            ];
        }
        return $result;

    }

    public function getTCDeliveryConditions()
    {
        if($this->price < $this->conditions[self::ONLY_PICKUP_RF]['UF_PRICE_TO']) {
            $result = [
                'CODE' => self::ONLY_PICKUP_RF,
                'MIN_PRICE_FOR_CONDITION' => $this->conditions[self::ONLY_PICKUP_RF]['UF_PRICE_TO']
            ];
        } elseif($this->price >= $this->conditions[self::TO_TERMINAL_MOSCOW]['UF_PRICE_FROM'] && $this->price < $this->conditions[self::TO_TERMINAL_MOSCOW]['UF_PRICE_TO']) {
            $result = [
                'CODE' => self::TO_TERMINAL_MOSCOW,
                'PRICE' => $this->conditions[self::TO_TERMINAL_MOSCOW]['UF_DELIVERY_PRICE']
            ];
        } else {
            $result = [
                'CODE' => self::FREE_DELIVERY,
                'PRICE' => $this->conditions[self::FREE_DELIVERY]['UF_DELIVERY_PRICE']
            ];
        }
        return $result;
    }

    public static function getConditions(): array
    {
        $hlblock = HL\HighloadBlockTable::getById(self::HBID)->fetch();
        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entityDataClass = $entity->getDataClass();

        $rsData = $entityDataClass::getList([
            'select' => ['*'],
        ]);
        while($res = $rsData->fetch()) {
            $result[$res['ID']] = $res;
        }
        return $result;
    }

    public function getDeliveryMoscowId()
    {
        $conditions = self::getMoscowDeliveryConditions();
        if($conditions['CODE'] === self::MO_NOT_FREE_DELIVERY) {
            return self::PAID_MOSCOW_DELIVERY_ID;
        } elseif($conditions['CODE'] === self::MO_FREE_DELIVERY) {
            return self::FREE_MOSCOW_DELIVERY_ID;
        } else {
            return null;
        }
    }

    public static function getDeliveryPrice($deliveryType)
    {
//        $basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), \Bitrix\Main\Context::getCurrent()->getSite());
        if($deliveryType == self::NAME_DELIVERY_PICKUP) {
            $price = self::getBasketWithDiscount('3')['ORDER_PRICE'];
        } else {
            $price = self::getBasketWithDiscount()['ORDER_PRICE'];
        }
        $conditions = self::getConditions();
        global $USER;


        if($deliveryType === self::NAME_DELIVERY_TC) {
            if($price >= $conditions[self::TO_TERMINAL_MOSCOW]['UF_PRICE_FROM'] && $price < $conditions[self::TO_TERMINAL_MOSCOW]['UF_PRICE_TO']) {
                $deliveryPrice = $conditions[self::TO_TERMINAL_MOSCOW]['UF_DELIVERY_PRICE'];
                $total = $price + $deliveryPrice;
                return [
                    'TOTAL' => $total,
                    'DELIVERY_PRICE' => $deliveryPrice,
                    'PRICE' => $price
                ];
            }
            if($price >= $conditions[self::FREE_DELIVERY]['UF_PRICE_FROM']) {
                $deliveryPrice = $conditions[self::FREE_DELIVERY]['UF_DELIVERY_PRICE'];
                $total = $price + $deliveryPrice;

                return [
                    'TOTAL' => $total,
                    'DELIVERY_PRICE' => $deliveryPrice,
                    'PRICE' => $price
                ];
            }

            return -1;

        } elseif($deliveryType === self::NAME_DELIVERY_MOSCOW) {
            if($price < $conditions[self::MO_PICKUP]['UF_PRICE_FROM']) {
                $deliveryPrice = $conditions[self::MO_PICKUP]['UF_DELIVERY_PRICE'];
                $total = $price + $deliveryPrice;
                $description = $conditions[self::MO_PICKUP]['UF_DELIVERY_DESCRIPTION'];
                return [
                    'TOTAL' => $total,
                    'DELIVERY_PRICE' => $deliveryPrice,
                    'PRICE' => $price,
                    'DESCRIPTION' => $description
                ];
            }
            if($price >= $conditions[self::MO_NOT_FREE_DELIVERY]['UF_PRICE_FROM'] && $price < $conditions[self::MO_NOT_FREE_DELIVERY]['UF_PRICE_TO']) {
                $deliveryPrice = $conditions[self::MO_NOT_FREE_DELIVERY]['UF_DELIVERY_PRICE'];
                $total = $price + $deliveryPrice;
                $description = $conditions[self::MO_NOT_FREE_DELIVERY]['UF_DELIVERY_DESCRIPTION'];
                return [
                    'TOTAL' => $total,
                    'DELIVERY_PRICE' => $deliveryPrice,
                    'PRICE' => $price,
                    'DESCRIPTION' => $description
                ];
            }
            if($price >= $conditions[self::MO_FREE_DELIVERY]['UF_PRICE_FROM']) {
                $deliveryPrice = $conditions[self::MO_FREE_DELIVERY]['UF_DELIVERY_PRICE'];
                $total = $price + $deliveryPrice;
                $description = $conditions[self::MO_FREE_DELIVERY]['UF_DELIVERY_DESCRIPTION'];
                return [
                    'TOTAL' => $total,
                    'DELIVERY_PRICE' => $deliveryPrice,
                    'PRICE' => $price,
                    'DESCRIPTION' => $description
                ];
            }
            return -1;

        } elseif($deliveryType === self::NAME_DELIVERY_PICKUP) {
            return [
                'TOTAL' => $price,
                'DELIVERY_PRICE' => 0,
                'PRICE' => $price
            ];
        }
        return -1;
    }

    public static function getBasketWithDiscount($deliveryId = '', $paySystemId = '')
    {
        $fuserId = \CSaleBasket::GetBasketUserID();

        $dbBasketItems = \CSaleBasket::GetList(
            array("ID" => "ASC"),
            array(
                "FUSER_ID" => $fuserId,
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL",
                "DELAY" => "N"
            ),
            false,
            false,
            array(
                "ID", "NAME", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "PRODUCT_PRICE_ID", "QUANTITY", "DELAY", "CAN_BUY",
                "PRICE", "WEIGHT", "DETAIL_PAGE_URL", "NOTES", "CURRENCY", "VAT_RATE", "CATALOG_XML_ID",
                "PRODUCT_XML_ID", "SUBSCRIBE", "DISCOUNT_PRICE", "PRODUCT_PROVIDER_CLASS", "TYPE", "SET_PARENT_ID"
            )
        );

        $allSum = 0;
        $allWeight = 0;
        $arResult = array();

        while($arBasketItems = $dbBasketItems->Fetch()) {
            $allSum += ($arBasketItems["PRICE"] * $arBasketItems["QUANTITY"]);
            $allWeight += ($arBasketItems["WEIGHT"] * $arBasketItems["QUANTITY"]);
            $arResult[] = $arBasketItems;
        }

        $arOrder = array(
            'SITE_ID' => SITE_ID,
            'USER_ID' => $GLOBALS["USER"]->GetID(),
            'ORDER_PRICE' => $allSum, // сумма всей корзины
            'ORDER_WEIGHT' => $allWeight, // вес всей корзины
            'BASKET_ITEMS' => $arResult, // товары сами
            'DELIVERY_ID' => $deliveryId
        );

        $arOptions = array(
            'COUNT_DISCOUNT_4_ALL_QUANTITY' => "Y",
        );

        $arErrors = array();

        \CSaleDiscount::DoProcessOrder($arOrder, $arOptions, $arErrors);

        return $arOrder;
    }

    public static function getBasketWithDiscount1($deliveryId = '', $paySystemId = '')
    {
        $siteId = \Bitrix\Main\Context::getCurrent()->getSite();
        $currency = \Bitrix\Currency\CurrencyManager::getBaseCurrency();
        $userId = \Bitrix\Sale\Fuser::getId();
        $basket = \Bitrix\Sale\Basket::loadItemsForFUser($userId, $siteId);
        $order = \Bitrix\Sale\Order::create($siteId, $userId);

        $order->setPersonTypeId(1); // Устанавливаем тип покупателя - Физические лица (ID=1)
        $order->setBasket($basket);

        // устанавливаю доставку, самовывоз
        $shipmentCollection = $order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem(
            \Bitrix\Sale\Delivery\Services\Manager::getObjectById($deliveryId)
        );

        // устанавливаю оплату, наличными
        $paymentCollection = $order->getPaymentCollection();
        $payment = $paymentCollection->createItem();

        $payment->setFields([
            'PAY_SYSTEM_ID' => $paySystemId
        ]);

        $propertyCollection = $order->getPropertyCollection();

        return $order->getPrice();
    }
}