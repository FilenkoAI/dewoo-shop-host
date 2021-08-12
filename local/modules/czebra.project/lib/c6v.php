<?php
namespace Czebra\Project;
use \Bitrix\Highloadblock as HL;
use \Bitrix\Main\Entity;

class C6v
{
    const API_KEY = '5dc647f98259d020bb0d2ce7df4cefe4784641db';
    const CITY_IBLOCK_ID = 27;
    const CITY_HIGHLOADBLOCK = 4;
    const DELIVERY_LOGO_HIGHLOADBLOCK = 5;

    public static function get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $i = curl_exec($ch);
        curl_close($ch);
        return $i;
    }

    public function getCities() {
        $cities = self::get('http://api.c6v.ru/?key='.self::API_KEY.'&q=getCities');
        return json_decode($cities,true);
    }
    private static function getDataFromHlblock($hbID)
    {
        \Bitrix\Main\Loader::includeModule('highloadblock');

        $hlblock = HL\HighloadBlockTable::getById($hbID)->fetch();

        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entityDataClass = $entity->getDataClass();

        $rsData = $entityDataClass::getList(array(
            'select' => array('*')
        ));
        return $rsData;
    }
    public static function getCitiesHlblock($hbID = self::CITY_HIGHLOADBLOCK)
    {
        $rsData = self::getDataFromHlblock($hbID);
        $arCityHlblock = [];
        while($el = $rsData->fetch()){
            $arCityHlblock[] = [
                'ID' => $el['ID'],
                'NAME' => $el['UF_NAME']
            ];
        }
        return $arCityHlblock;
    }

    //!!!Повесить агент, чтобы проверял актуальность городов раз в месяц!!!
    public function setCities() {
        \Bitrix\Main\Loader::includeModule('highloadblock');

        $hlblock = HL\HighloadBlockTable::getById(self::CITY_HIGHLOADBLOCK)->fetch();

        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entityDataClass = $entity->getDataClass();


        $arCityHlblock = self::getCitiesHlblock();

//        print_r($arCityHlblock);

        $arCityC6v = self::getCities();

//        print_r($arCityC6v);
        $arCityC6vName = array_column($arCityC6v, 'name');

        //Удаляем из хайлоадблока города, которых нет в c6v
        foreach ($arCityHlblock  as $key => $city) {
            if(!in_array($city['NAME'], $arCityC6vName)){
                $entityDataClass::Delete($city['ID']);
                unset($arCityHlblock[$key]);
            }
        }
        $arCityHlblockName = array_column($arCityHlblock, 'NAME');

        //Добавляем города, которых нет в хайлоадблоке
        foreach ($arCityC6v  as $city) {
            if(!in_array($city['name'], $arCityHlblockName)){
                $data = array(
                    'UF_NAME' => $city['name']
                );
                $result = $entityDataClass::add($data);
                print_r($result);
            }
        }
    }

    public function getPrice($startCity, $endCity, $weight, $width, $height, $length) {
        return self::get('http://api.c6v.ru/?key='.self::API_KEY.
            '&q=getPrice&startCity='.$startCity.
            '&endCity='.$endCity.
            '&weight='.$weight.
            '&width='.$width.
            '&height='.$height.
            '&length='.$length);
    }

    public static function getDepartureCities()
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $iblock = \Bitrix\Iblock\Iblock::wakeUp(self::CITY_IBLOCK_ID);
        $arDepartureCities = $iblock->getEntityDataClass()::getList(
            [
                'filter' => [
                    'ACTIVE' => 'Y'
                ],
                'order' => [
                    'SORT', 'NAME'
                ],
                'select' => [
                    'ID', 'NAME'
                ]
            ]
        )->fetchAll();

        return $arDepartureCities;
    }
    public static function getDeliveriesLogos($hbID = self::DELIVERY_LOGO_HIGHLOADBLOCK){
        $rsData = self::getDataFromHlblock($hbID);
        $arLogosHlblock = [];
        while($el = $rsData->fetch()){
            $arLogosHlblock[$el['UF_NAME']] = \CFile::GetPath($el['UF_LOGO']);
        }
        return $arLogosHlblock;
    }

    public static function setDeliveriesLogos($deliveries)
    {
        $logos = self::getDeliveriesLogos();

        foreach($deliveries as &$delivery){
            foreach($logos as $name => $logo){
                if(strpos(mb_strtolower($delivery['name']), mb_strtolower($name)) !== false){
                    $delivery['logo'] = $logo;
                }
            }
            if (!$delivery['logo']){
                $delivery['logo'] = $logos['default'];
            }
        }
        return $deliveries;
    }
}