<?php
namespace Czebra\Project\DeliveryCalendar;
use Bitrix\Main\Loader;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;


class Calendar
{
    const HL_CALENDAR_BLOCK_ID = 2;
    const HL_DELIVERY_DAYS_ID = 3;
    const ONE_DAY = 86400;
    const CALENDAR_CODE = 'calendar';

    public static function calculateDateFormatted($type = 'pickup')
    {
        $deliveryDate = self::calculateDate($type);
        $currentDateTimestamp = strtotime( date("Y-m-d") );
        $deliveryDateTimestamp = strtotime( $deliveryDate );
        $result = [
            'TRIVIAL' => false,
            'DATE' => '',
        ];

        if ( $currentDateTimestamp == $deliveryDateTimestamp ) {
            $result['TRIVIAL'] = 'Сегодня';
        } else if ( ($currentDateTimestamp + self::ONE_DAY) == $deliveryDateTimestamp ) {
            $result['TRIVIAL'] = 'Завтра';
        } else if ( ($currentDateTimestamp + 2 * self::ONE_DAY) == $deliveryDateTimestamp ) {
            $result['TRIVIAL'] = 'Послезавтра';
        }

        $result['DATE_STANDARD']  = date('d.m.Y', strtotime($deliveryDate));
        $result['DATE_FORMATTED_TEXT']  = FormatDate('d F', strtotime($deliveryDate));
        $result['DATE_FORMATTED_NUMBER']  = FormatDate('d.m', strtotime($deliveryDate));
        return $result;
    }

    public static function calculateDate($type = 'delivery')
    {
        $currentDate = date("Y-m-d");
        $numberOfDays = self::getNumberOfDays($type);
        $exceptions = self::createExceptionArray();

        $deliveryDate = new \DateTime( $currentDate );
        $deliveryTimestamp = $deliveryDate->getTimestamp();

        for ($i = 0; $i < $numberOfDays; $i++) {

            $nextDay = date( 'w', ($deliveryTimestamp + self::ONE_DAY) );
            $nextDayStr = date( "Y-m-d", ($deliveryTimestamp + self::ONE_DAY) );

            if( $nextDay == 0 || $nextDay == 6 ) {
                if ( !in_array( $nextDayStr, $exceptions['MINUS']) ) {
                    $i--;
                }
            } else {
                if ( in_array( $nextDayStr, $exceptions['PLUS']) ) {
                    $i--;
                }
            }
            $deliveryTimestamp = $deliveryTimestamp + self::ONE_DAY;
        }

        $deliveryDate->setTimestamp($deliveryTimestamp);

        return $deliveryDate->format('Y-m-d');
    }
    private static function getCalendar() : array
    {
        $result = [];
        $highLoadBLock = HL\HighloadBlockTable::getById( self::HL_CALENDAR_BLOCK_ID )->fetch();
        $entity = HL\HighloadBlockTable::compileEntity($highLoadBLock);
        $entityDataClass = $entity->getDataClass();

        $rsData = $entityDataClass::getList(array(
            "select" => ["*"],
            "order" => ["ID" => "ASC"],
            "filter" => ["UF_CODE" => self::CALENDAR_CODE]

        ));

        if($arData = $rsData->Fetch()){
            $result = $arData;
        }
        return $result;
    }
    private static function createExceptionArray() : array
    {
        $dates = self::getCalendar();
        $res['PLUS'] = $dates['UF_PLUS_DATE'];
        $res['MINUS'] = $dates['UF_MINUS_DATE'];

        foreach ($res as &$group) {
            foreach($group as &$item){
                $item = $item->toString();
                $item = date('Y-m-d', strtotime($item));
            }
        }

        return $res;
    }
    private static function getNumberOfDays($type) : int
    {
        $result = [];
        $highLoadBLock = HL\HighloadBlockTable::getById( self::HL_DELIVERY_DAYS_ID )->fetch();
        $entity = HL\HighloadBlockTable::compileEntity($highLoadBLock);
        $entityDataClass = $entity->getDataClass();

        $rsData = $entityDataClass::getList(array(
            "select" => ["*"],
            "order" => ["ID" => "ASC"],
            "filter" => ["UF_CODE" => $type]
        ));

        if($arData = $rsData->Fetch()){
            $result = $arData['UF_DELIVERY_DAYS'];
        }

        return $result;
    }

}

