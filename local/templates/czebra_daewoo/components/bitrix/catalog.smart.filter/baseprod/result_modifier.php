<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
function cmp($a, $b)
{
    return $a["VALUE"] > $b["VALUE"];
}
$propsToScroll = [
    'MOSHCHNOST_L_S_',
    'SHIRINA_SREZA_MM',
    'OBEM_TRAVOSBORNIKA_L',
    'SHIRINA_OBRABOTKI_POCHVY_MM',
    'MOSHCHNOST_V',
    'RABOCHEE_DAVLENIE_BAR',
    'RASKHOD_VODY_L_CH',
    'VES_KG_GENERATOR',
    'MAKSIMALNAYA_PROIZVODITELNOST_L_CHAS_',
    'VYSOTA_PODACHI_VODY_M',
    'GLUBINA_POGRUZHENIYA_M',
    'SHIRINA_UBORKI_SNEGA_MM',
    'DLINA_SHINY_SM',
    'PROIZVODITELNOST_L_MIN',
    'VREMYA_NAKACHIVANIYA_KOLESA_RAZMEROM_R15_195_60_DO',
];
foreach($arResult['ITEMS'] as &$arItem) {
    if ( $arItem['DISPLAY_TYPE'] == 'A' ){
        $arItem['FILTER_NAME'] =  'filter_'.$arItem['ID'];
    }
}
