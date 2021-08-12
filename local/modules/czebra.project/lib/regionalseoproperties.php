<?php
namespace Czebra\Project;
// Обрабатывает уже готовые title и description
class RegionalSEOProperties
{
    public static function setRegionalCatalogTitle()
    {
        global $cityInfo, $APPLICATION;
        $title = $APPLICATION->GetPageProperty('title');
        if($cityInfo['NAME_PREPOSITIONAL']){
            $title = str_replace('Москве', $cityInfo['NAME_PREPOSITIONAL'], $title);
            $APPLICATION->SetPageProperty('title', $title);
        }
    }
    public static function setRegionalCatalogDescription()
    {
        global $cityInfo, $APPLICATION;
        $description = $APPLICATION->GetPageProperty('description');
        if($cityInfo['NAME_PREPOSITIONAL']){
            $description = str_replace('Москве', $cityInfo['NAME_DATIVE'], $description);
            $phone = $cityInfo['PHONE'];
            $description = explode('Тел.:', $description)[0];
            $description = $description . 'Тел.: ' . $phone . '.';
            $APPLICATION->SetPageProperty('description', $description);
        }
    }

}