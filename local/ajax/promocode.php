<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Application;
use Czebra\BFS\Basket;
use \Bitrix\Main;
use \Bitrix\Sale\Internals;
use \Bitrix\Sale\DiscountCouponsManager;
$request = Application::getInstance()->getContext()->getRequest();

if ($request['action'] == 'set_promo_code') {
    if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
        $result = array('RESULT' => "ERROR");
        //проверка на существованние купона
        $isCupon = CCatalogDiscountCoupon::IsExistCoupon($request['promo_code']);
        if ($isCupon == true) {
            //получение информации о скидке, к которой привязан купон
            $arDiscount = DiscountCouponsManager::getData(
                $request['promo_code'],
                true
            );
            //проверка на активность скидки
            if ($arDiscount["DISCOUNT_ACTIVE"] == "Y") {
                //получение информации о купоне
                $arCoupon = Internals\DiscountCouponTable::getRow([
                    'filter' => [
                        'COUPON' => $request['promo_code']
                    ]
                ]);
                $result['COUPON'] = $arCoupon;
                //проверка на активность купона
                if($arCoupon["ACTIVE"] == "Y") {
                    if($arCoupon["MAX_USE"] != 0 && $arCoupon["USE_COUNT"] == $arCoupon["MAX_USE"]){
                        $result['MESSAGE'] = "купон использован максимальное количество раз";
                    } else {
                        //CCatalogDiscountCoupon::ClearCoupon();
                        //\Bitrix\Sale\DiscountCouponsManager::clear(true);
                        if (\Bitrix\Sale\DiscountCouponsManager::add($request['promo_code'])) {
                            $result['RESULT'] = 'OK';
                            $result['PROMO_CODE'] = $request['promo_code'];
                        }
                    }
                } else {
                    $result['MESSAGE'] = "Промокод недействителен";
                }
            } else {
                $result['MESSAGE'] = "Промокод недействителен";
            }
        } else {
            $result['MESSAGE'] = "Промокод не существует";
        }
        echo  json_encode($result);
    }
} elseif ($request['action'] == 'del_coupon') {
    if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
        //CCatalogDiscountCoupon::ClearCoupon();
        \Bitrix\Sale\DiscountCouponsManager::delete($request['coupon']);
    }
}


//} elseif ($request['action'] == 'del_coupon') {
//    if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
//        //CCatalogDiscountCoupon::ClearCoupon();
//        \Bitrix\Sale\DiscountCouponsManager::clear(true);
//    }
//}