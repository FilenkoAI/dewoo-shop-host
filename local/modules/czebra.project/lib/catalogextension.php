<?php
namespace Czebra\Project;
class CatalogExtension
{
    const IBLOCK_ID = 29;
    public static function changeName(&$arFields)
    {
        if ($arFields['IBLOCK_ID'] == self::IBLOCK_ID) {

            $arFields['NAME'] = 'Расширение товара ID=' . $arFields['PROPERTY_VALUES']['510']['n0']['VALUE'];


        }
    }


}