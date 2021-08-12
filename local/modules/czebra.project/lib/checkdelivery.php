<?php
namespace Czebra\Project;

// коды ошибок
// 1 - не выбран тип доставки
// 2 - какое-то из обязательных полей массива REQUIRED_DELIVERY_FIELDS не заполнено (выбрана доставка транспортной)
// 3 - какое-то из обязательных полей массива REQUIRED_DELIVERY_MOSCOW_FIELDS не заполнено (выбрана доставка по Москве)
// 4 - скорее всего, невозможная ошибка: тип доставки - самовывоз, но id магазина не выбран. Вероятно ошибка в шаблоне вывода магазинов

class CheckDelivery
{
    const REQUIRED_DELIVERY_FIELDS = [
        'CITY' => 'Город',
        'STREET' => 'Улица',
        'HOUSE' => 'Дом',
//        'APARTMENT' => 'Квартира/офис'
    ];

    const REQUIRED_DELIVERY_MOSCOW_FIELDS = [
        'CITY_MOSCOW_ID' => 'Город',
        'STREET_MOSCOW' => 'Улица',
        'HOUSE_MOSCOW' => 'Дом',
//        'APARTMENT_MOSCOW' => 'Квартира/офис'
    ];

    public static function checkDeliveryProperties()
    {
        global $_SESSION;
        $result = [];
        if( !$_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] ) {
            $result = [
                'status' => 'error',
                'message' => 'Выберите тип доставки',
                'code' => 1
            ];
        } else {
            if ( $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] === 'pickup' ) {
                if ( !$_SESSION['CZ_ORDER']['DELIVERY']['PICKUP_SHOP_ID'] ){
                    $result['status'] = 'error';
                    $result['message'] = 'Не выбран магазин для самовывоза';
                    $result['code'] = 4;
                } else {
                    $result['status'] = 'success';
                }
            } elseif ( $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] === 'delivery' ) {

                $result = self::checkRequiredFields(self::REQUIRED_DELIVERY_FIELDS, 2, 'Не заполнены поля');

            } elseif ( $_SESSION['CZ_ORDER']['DELIVERY']['TYPE'] === 'delivery_moscow' ) {

                $result = self::checkRequiredFields(self::REQUIRED_DELIVERY_MOSCOW_FIELDS, 3, 'Не заполнены поля');

            } else {
                $result = [
                    'status' => 'error',
                    'message' => 'Неверный тип доставки'
                ];
            }
        }

        return $result;
    }
    private static function checkRequiredFields($fieldsArray, $errorCode, $errorMessage) : array
    {
        $missingFieldsExist = false;
        $tempRes = [];

        foreach($fieldsArray as $key => $field){

            if (!$_SESSION['CZ_ORDER']['DELIVERY'][$key]) {
                $tempRes['missing'][] = $field;
                $missingFieldsExist = true;
            }

        }
        if ($missingFieldsExist) {

            $tempRes['status'] = 'error';
            $tempRes['message'] = $errorMessage;
            $tempRes['code'] = $errorCode;

        } else {
            $tempRes['status'] = 'success';
        }

        return $tempRes;
    }
}
