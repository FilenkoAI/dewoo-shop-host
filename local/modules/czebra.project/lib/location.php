<?php
namespace Czebra\Project;

use \Bitrix\Sale;

class Location
{
    public function getZipCode($code)
    {
        \Bitrix\Main\Loader::includeModule('sale');

        $res = \Bitrix\Sale\Location\LocationTable::getList(array(
            'filter' => array(
                'CODE' => array('newly-created-location-code', $code),
                'EXTERNAL.SERVICE.CODE' => 'ZIP',
            ),
            'select' => array(
                'EXTERNAL.*',
            ),
        ));
        while ($item = $res->fetch()) {
            $zip = $item['SALE_LOCATION_LOCATION_EXTERNAL_XML_ID'];
        }

        return $zip;
    }
}
