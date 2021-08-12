<?php
namespace Czebra\Project;

class Raiting
{
    const IBLOCK_ID = 20;
    public static function getRating($elementId)
    {
        \Bitrix\Main\Loader::IncludeModule('iblock');
        $arFilter = array(
            "IBLOCK_ID" => self::IBLOCK_ID,
            "PROPERTY_PRODUCT" => $elementId,
        );
        $arSelect = array(
            "PROPERTY_RATING",
            "ID"
        );
        $res = \CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, $arSelect);
        $rating = [];
        while ($ar_fields = $res->GetNext()) {
            $rating [] = $ar_fields;
        }
        $rating = self::trimRating($rating);
        $rating = self::getAverageRating($rating);
        return $rating;
    }
    private static function trimRating($rating){
        $tempRating = [];
        foreach($rating as $arRating){
            $tempRating [] = [
                'RATING' => $arRating['PROPERTY_RATING_VALUE']
            ];
        }
        return $tempRating;
    }
    private static function getAverageRating($rating){
        if($rating){
            $averageRating = 0;
            $count = count($rating);
            foreach($rating as $arRating){
                $averageRating += $arRating['RATING'];
            }
            $averageRating /= $count;
            return [
                'COUNT' => $count,
                'AVERAGE_RATING' => $averageRating / 5 * 100
            ];
        } else {
            return [
                'COUNT' => 0,
                'AVERAGE_RATING' => 0,
            ];
        }
    }
}