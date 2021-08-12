<?php
namespace Czebra\Project;

class Region
{
    public static function isRegional()
    {
        global $cityInfo;
        if  ($cityInfo['NAME'] === 'Москва'){
            $result = 'N';
        } else {
            $result = 'Y';
        }
        return $result;
    }
}
