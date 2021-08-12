<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;
$aMenuLinksExt = [];
const IBLOCK_ID = 24;
const MAX_DEPTH = 3;

if(CModule::IncludeModule("iblock")){
    $tempLinks = [];
    $arFilter = Array('IBLOCK_ID'=>IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y');
    $db_list = CIBlockSection::GetList(Array("left_margin" => "asc", 'sort' => 'asc'), $arFilter, true, ['UF_IMAGE_HOVER', 'UF_IMAGE_NO_HOVER', 'UF_ICON_MOBILE']);
    while($ar_result = $db_list->GetNext())
    {
        $tempLink = [
            'DEPTH_LEVEL' => $ar_result['DEPTH_LEVEL'],
            'NAME' => $ar_result['NAME'],
            'URL' => $ar_result['SECTION_PAGE_URL'],
            'IMAGE_HOVER' => CFile::GetPath($ar_result['UF_IMAGE_HOVER']),
            'IMAGE_NO_HOVER' => CFile::GetPath($ar_result['UF_IMAGE_NO_HOVER']),
            'ICON_MOBILE' => CFile::GetPath($ar_result['UF_ICON_MOBILE'])
        ];
        $tempLinks[] = $tempLink;
    }


    $counter = 1;
    foreach($tempLinks as $key => $item){
        if($item['DEPTH_LEVEL'] > MAX_DEPTH) continue;
        $tempMenuItem = [
            0 => $item['NAME'],
            1 => $item['URL'],
            2 => [
                0 => $item['URL']
            ],
            3 => [
                'FROM_IBLOCK' => 1,
                'DEPTH_LEVEL' => $item['DEPTH_LEVEL'],
                'IS_PARENT' => 0,
                'IMAGE_HOVER' => $item['IMAGE_HOVER'],
                'IMAGE_NO_HOVER' => $item['IMAGE_NO_HOVER'],
                'ICON_MOBILE' => $item['ICON_MOBILE'],
                'VERTICAL_LINE' => ($counter % 4 != 0 ? 'vertical-line' : '')
            ]
        ];
        if($tempLinks[$key + 1] != 0 && $item['DEPTH_LEVEL'] < $tempLinks[$key + 1]['DEPTH_LEVEL']){
            $tempMenuItem[3]['IS_PARENT'] = 1;
        }
        $aMenuLinksExt[] = $tempMenuItem;
    }
}

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);

