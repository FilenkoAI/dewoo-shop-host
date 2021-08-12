<?php
namespace Czebra\Project;
class ModalDate
{
    const IBLOCK_REVIEW_ID = 20;
    const IBLOCK_QUESTION_ID = 32;

    public static function addDate(&$arFields)
    {
        if ($arFields['IBLOCK_ID'] == self::IBLOCK_REVIEW_ID || $arFields['IBLOCK_ID'] == self::IBLOCK_QUESTION_ID ) {
            if(!$arFields['PROPERTY_VALUES']['DATE']){
                $arFields['PROPERTY_VALUES']['DATE'] = date('d.m.Y', time());
            }
        }
    }

}