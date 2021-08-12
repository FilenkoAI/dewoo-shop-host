<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!$arResult['VARIABLES']['ELEMENT_CODE']){
    $sectionId = $arResult['VARIABLES']['SECTION_ID'];
    if ($sectionId){

        $arFilter = ['ID' =>$sectionId, 'IBLOCK_ID' => '24'];
        $arSelect = ['UF_*'];
        $rsSect = \CIBlockSection::GetList([], $arFilter, false, $arSelect);
        if ($arSect = $rsSect->GetNext())
        {
            $sectionTitle = $arSect['NAME'];
            if($arSect['UF_NAME_IN_H1']){

                $rsSections = CIBlockSection::GetByID($arSect['ID']);
                $arSection = $rsSections->Fetch();
                $id_main = $arSection['IBLOCK_SECTION_ID'];

                $arFilter = ['ID' =>$id_main, 'IBLOCK_ID' => '24'];
                $rsSectMain = \CIBlockSection::GetList([], $arFilter, false, []);

                if ($arSectMain = $rsSectMain->GetNext())
                {
                    $h1 = $arSectMain['NAME'] . ' ' . mb_strtolower($sectionTitle);
                }

            } else {
                $h1 = $sectionTitle;
            }
            $h1 .= ' DAEWOO';
        }
    } else {
        $h1 = 'Каталог DAEWOO';
    }

    $APPLICATION->SetPageProperty('h1', $h1);

}

