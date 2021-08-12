<?php
namespace Czebra\Project;

use \Bitrix\Main\Context;
use \Bitrix\Sale;

class DeliveryCompanies
{
    public static function getDeliveryCompanies(){
        if(\Bitrix\Main\Loader::includeModule('iblock')){
            $elements = \Bitrix\Iblock\Elements\ElementDeliverycompaniesTable::getList([
                'select' => ['ID', 'NAME', 'LOGO' => 'LOGO' ],
                'filter' => ['=ACTIVE' => 'Y'],
            ])->fetchAll();
            foreach($elements as &$element){
                $element['LOGO'] = \CFile::GetPath($element['LOGOIBLOCK_GENERIC_VALUE']);
            }
            return $elements;
        }
    }
}
