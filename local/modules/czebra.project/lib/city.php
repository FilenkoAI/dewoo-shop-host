<?php
namespace Czebra\Project;
use \Bitrix\Sale;
class City
{
    const IBLOCK_ID = 27;

    public static function get()
    {
        global $cityInfo, $USER;

        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $host = $request->getHttpHost();

        $iblock = self::getIblockObject();

        $rsElements = $iblock->getEntityDataClass()::getList([
            'filter' => [
                'HOST_NAME.VALUE' => $host,
            ],
            'select' => ['ID', 'NAME', 'HOST_NAME', 'COORDINATES', 'LOCATION', 'PHONE', 'SHOP', 'MO', 'NAME_PREPOSITIONAL']
        ]);

        \Bitrix\Main\Loader::includeModule('iblock');

        if ($city = $rsElements->fetchObject()) {
            \Bitrix\Main\Loader::includeModule('sale');
            $locationCode = $city->getLocation() ? $city->getLocation()->getValue() : '';
            $res = \Bitrix\Sale\Location\LocationTable::getList(array(
                'filter' => array('=NAME.LANGUAGE_ID' => LANGUAGE_ID, 'CODE' => $locationCode),
                'select' => array('NAME_RU' => 'NAME.NAME', 'ID', 'CODE')
            ))->fetch();
            $locationId = $res['ID'];

            $cityInfo = [
                'NAME' => $city->getName(),
                'NAME_PREPOSITIONAL' => $city->getNamePrepositional() ? $city->getNamePrepositional()->getValue() : $city->getName(),
                'URL' => $city->getHostName()->getValue(),
                'COORDINATES' => $city->getCoordinates()->getValue(),
                'LOCATION' => $locationCode,
                'PHONE' => $city->getPhone() ? $city->getPhone()->getValue() : false,
                'SHOP' => $city->getShop() ? self::getShopName($city->getShop()->getValue()) : false,
                'MO' => $city->getMo() ?  "Y" : 'N',
                'LOCATION_ID' => $locationId,
                'DEFAULT_SHOP_ID' => $city->getShop() ? $city->getShop()->getValue() : false
            ];
//            if($city->getShop()){
//                self::changeShopIfIsNotValid($city->getName(), $city->getShop()->getValue());
//            }
        }

        $regionShop = $_COOKIE['REGION_SHOP'];
        if ($regionShop == '') {
            $cityInfo['QUESTION_CITY'] = 'Y';
        }

    }

    public static function saveSelection($val)
    {

        setcookie('REGION_SHOP', $val, time() + 60*60*24*60*3, '/', '.daewoo-shop.com');

    }

    public static function getList()
    {
        $result = [];

        $iblock = self::getIblockObject();
        $rsElements = $iblock->getEntityDataClass()::getList([
            'order' => ['NAME'],
            'select' => ['ID', 'NAME', 'HOST_NAME'],
        ]);
        while ($item = $rsElements->fetchObject()) {
            $result[] = [
                'NAME' => $item->getName(),
                'URL' => $item->getHostName()->getValue(),
            ];
        }

        return $result;
    }
    public static function getShopName($elementId){
        \Bitrix\Main\Loader::includeModule('iblock');
        $element = \Bitrix\Iblock\Elements\ElementShopsTable::getByPrimary($elementId, array(
            'select' => array('ID', 'NAME', 'DESCRIPTION')
        ))->fetchObject();
        $shop = [
            'ID' => $elementId,
            'NAME' => $element->getName(),
            'NAME_SHORT' => mb_strimwidth($element->getName(), 0, 10, "..."),
            'ADDRESS' => strip_tags(unserialize($element->getDescription()->getValue())['TEXT'])
        ];
        return $shop;
    }

    private static function getIblockObject()
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        $iblock = \Bitrix\Iblock\Iblock::wakeUp(self::IBLOCK_ID);
        return $iblock;
    }

    public static function changeShopIfIsNotValid($selectedCityName, $defaultShopId)
    {
        $arrShopFilter = [
            'IBLOCK_ID' => 28,
            'ACTIVE' => "Y",
            'PROPERTY_CITY.NAME' => $selectedCityName
        ];
        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "IBLOCK_ID");
        $res = \CIBlockElement::GetList(Array(), $arrShopFilter, false, Array("nPageSize"=>50), $arSelect);
        $shopIds = [];
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $shopIds[] = $arFields['ID'];
        }
        if(!in_array(\Czebra\Project\SelectedShop::getId(), $shopIds)){
            \Czebra\Project\SelectedShop::setShop($defaultShopId);
        }

    }
}