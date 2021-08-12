<?php
namespace Czebra\Project;

use Bitrix\Sale;

class Ordering
{
    private static $request;
    private static $curDir;
    private static $cntBasketItems;
    public static function init()
    {
        global $_SESSION;
        global $APPLICATION;
        \Bitrix\Main\Loader::includeModule("sale");
        self::$curDir = $APPLICATION->GetCurDir();
        self::$cntBasketItems = \CSaleBasket::GetList(
            array(),
            array(
                "FUSER_ID" => \CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL"
            ),
            array()
        );
        self::$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        if(\CSite::InDir('/personal_section/cart/') ){
            // Если корзина пуста, перенаправляем на первый шаг
            if(self::$cntBasketItems == 0 && self::$curDir != '/personal_section/cart/' && self::$curDir != '/personal_section/cart/order_confirm/')
            {
//               LocalRedirect('/personal_section/cart/');
            }
            //если в корзине что-то есть обрабатываем каждую страницу
            else
            {
                switch (self::$curDir) {
                    case '/personal_section/cart/order_start/':
                        self::orderStart();
                        break;
                    case '/personal_section/cart/order_address/':
                        self::orderAddress();
                        break;
                    case '/personal_section/cart/order_date/':
                        self::orderDate();
                        break;
                    case '/personal_section/cart/order_payment/':
                        self::orderPayment();
                        break;
                    case '/personal_section/cart/order_confirm/':
                        if ( self::$request->get('from_confirmed') == "Y" ) {
                            self::orderDate("Y");
                        }
                        self::orderConfirm();
                        break;
                }
            }

        }

    }

    private static function orderStart()
    {
        \Bitrix\Main\Diag\Debug::writeToFile(self::$cntBasketItems, "", "prologgg.txt");
    }
    private static function orderAddress()
    {
        $fromConfirm = self::$request->get('from_confirm');
        $_SESSION['CZ_ORDER']['FROM_CONFIRM'] = $fromConfirm;
    }
    private static function orderDate($fromConfirm = 'N')
    {
        $deliveryType = self::$request->get('delivery_type');
//        $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] = self::$request->get('delivery_type');
//        $_SESSION['CZ_ORDER']['DELIVERY']['ORDER_DELIVERY_ID'] = self::$request->get('order_delivery_id');
//        $_SESSION['CZ_ORDER']['DELIVERY']['PICKUP_SHOP_ID'] = self::$request->get('pickup_shop_id');
//        $_SESSION['CZ_ORDER']['DELIVERY']['CITY'] = trim(self::$request->get('delivery_city'));
//        $_SESSION['CZ_ORDER']['DELIVERY']['STREET'] = trim(self::$request->get('delivery_street'));
//        $_SESSION['CZ_ORDER']['DELIVERY']['HOUSE'] = trim(self::$request->get('delivery_house'));
//        $_SESSION['CZ_ORDER']['DELIVERY']['CORPUS'] = trim(self::$request->get('delivery_corpus'));
//        $_SESSION['CZ_ORDER']['DELIVERY']['APARTMENT'] = trim(self::$request->get('delivery_apartment'));
//        $_SESSION['CZ_ORDER']['DELIVERY']['COMMENT'] = trim(self::$request->get('delivery_comment'));
        if($fromConfirm == 'N') {
            if($deliveryType == 'company_delivery' || $deliveryType == 'pickup') {
//                LocalRedirect('/personal_section/cart/order_payment/');
            }
            else {

            }
        }

    }
    private static function orderPayment()
    {
        $date = self::$request->get('date');
        $fromConfirm = self::$request->get('from_confirm');
//        $_SESSION['CZ_ORDER']['DELIVERY']['DATE'] = $date;
//        $_SESSION['CZ_ORDER']['FROM_CONFIRM'] = $fromConfirm;
//        OrderNavigationController::init();
    }
    private static function orderConfirm()
    {
        $paySystemId = self::$request->get('paysystem_id');
//        $_SESSION['CZ_ORDER']['PAYSYSTEM_ID'] = $paySystemId;
    }

}