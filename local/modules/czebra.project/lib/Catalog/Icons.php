<?php
namespace Czebra\Project\Catalog;

class Icons
{
    const SELECT = [
        'ID',
        'NAME',
        'PROPERTY_IMG_1',
        'PROPERTY_IMG_2',
        'PROPERTY_IMG_3',
        'PROPERTY_IMG_4',
        'PROPERTY_DESC_1',
        'PROPERTY_DESC_2',
        'PROPERTY_DESC_3',
        'PROPERTY_DESC_4',
        'PROPERTY_PROP_1',
        'PROPERTY_PROP_2',
        'PROPERTY_PROP_3',
        'PROPERTY_PROP_4',
    ];

    const IBLOCK_ID = 37;

    public static function getIconsArray($elementID){
        $rawRes = self::getIcons($elementID);
        $finalArray = [];
        if ($rawRes) {
            if ( $rawRes['PROPERTY_IMG_1_VALUE'] ) {
                $finalArray [] = [
                    'IMG' => self::getImg($rawRes['PROPERTY_IMG_1_VALUE']),
                    'DESC' => $rawRes['PROPERTY_DESC_1_VALUE'],
                    'PROP' => $rawRes['PROPERTY_PROP_1_VALUE'],
                ];
            }
            if ( $rawRes['PROPERTY_IMG_2_VALUE'] ) {
                $finalArray [] = [
                    'IMG' => self::getImg($rawRes['PROPERTY_IMG_2_VALUE']),
                    'DESC' => $rawRes['PROPERTY_DESC_2_VALUE'],
                    'PROP' => $rawRes['PROPERTY_PROP_2_VALUE'],
                ];
            }
            if ( $rawRes['PROPERTY_IMG_3_VALUE'] ) {
                $finalArray [] = [
                    'IMG' => self::getImg($rawRes['PROPERTY_IMG_3_VALUE']),
                    'DESC' => $rawRes['PROPERTY_DESC_3_VALUE'],
                    'PROP' => $rawRes['PROPERTY_PROP_3_VALUE'],
                ];
            }
            if ( $rawRes['PROPERTY_IMG_4_VALUE'] ) {
                $finalArray [] = [
                    'IMG' => self::getImg($rawRes['PROPERTY_IMG_4_VALUE']),
                    'DESC' => $rawRes['PROPERTY_DESC_4_VALUE'],
                    'PROP' => $rawRes['PROPERTY_PROP_4_VALUE'],
                ];
            }
        }
        return $finalArray;
    }

    private static function getIcons($elementID)
    {
        $arFilter = array("IBLOCK_ID" => self::IBLOCK_ID, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "PROPERTY_PRODUCTS.ID" => $elementID);
        \Bitrix\Main\Loader::includeModule("iblock");
        $res = \CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 49), self::SELECT);
        if($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            return $arFields;
        }
        return false;
    }

    private static function getImg($imgID)
    {
        if ($imgID) {
            return \CFile::GetPath($imgID);
        }
        return false;
    }


}

