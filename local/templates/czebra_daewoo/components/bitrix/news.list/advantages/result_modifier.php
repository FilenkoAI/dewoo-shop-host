<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
const MAX_LENGTH = 80;


foreach ($arResult["ITEMS"] as $key => &$arItem) {
    $img = CFile::GetPath($arItem["PREVIEW_PICTURE"]);
    $img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("height"=>460, "width"=>345), BX_RESIZE_IMAGE_EXACT);
    $arItem["PREVIEW_PICTURE"]["SRC"] = $img["src"];
    if ($arItem['PROPERTIES']['IMG_1']['VALUE']) {
        $arItem['PROPERTIES']['IMG_1']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_1']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_1_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_1']['VALUE'], array("height"=>161, "width"=>221), BX_RESIZE_IMAGE_EXACT)['src'];

        if (strlen($arItem['PROPERTIES']['DESC_1']['VALUE']['TEXT']) > MAX_LENGTH){
            $words = strip_tags($arItem['PROPERTIES']['DESC_1']['VALUE']['TEXT']);
            $words = explode(' ', $words);
            $lettersCounter = 0;
            foreach ($words as $word){
                if($lettersCounter < MAX_LENGTH){
                    $arItem['PROPERTIES']['DESC_1_COMPRESSED'] .= $word . ' ';
                    $lettersCounter += strlen($word);
                } else {
                    break;
                }
            }
            if(strlen($arItem['PROPERTIES']['DESC_1_COMPRESSED']) < strlen(strip_tags($arItem['PROPERTIES']['DESC_1']['VALUE']['TEXT']))){
                $arItem['PROPERTIES']['DESC_1_COMPRESSED'] .= '...<br><span class="red">Подробнее...</span>';
            }

        } else {
            $arItem['PROPERTIES']['DESC_1_COMPRESSED'] =  $arItem['PROPERTIES']['DESC_1']['VALUE']['TEXT'];
        }
    }
    if ($arItem['PROPERTIES']['IMG_2']['VALUE']) {
        $arItem['PROPERTIES']['IMG_2']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_2']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_2_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_2']['VALUE'], array("height"=>161, "width"=>221), BX_RESIZE_IMAGE_EXACT)['src'];

        if (strlen($arItem['PROPERTIES']['DESC_2']['VALUE']['TEXT']) > MAX_LENGTH){
            $words = strip_tags($arItem['PROPERTIES']['DESC_2']['VALUE']['TEXT']);
            $words = explode(' ', $words);
            $lettersCounter = 0;
            foreach ($words as $word){
                if($lettersCounter < MAX_LENGTH){
                    $arItem['PROPERTIES']['DESC_2_COMPRESSED'] .= $word . ' ';
                    $lettersCounter += strlen($word);
                } else {
                    break;
                }
            }
            if(strlen($arItem['PROPERTIES']['DESC_2_COMPRESSED']) < strlen(strip_tags($arItem['PROPERTIES']['DESC_2']['VALUE']['TEXT']))){
                $arItem['PROPERTIES']['DESC_2_COMPRESSED'] .= '...<br><span class="red">Подробнее...</span>';
            }

        } else {
            $arItem['PROPERTIES']['DESC_2_COMPRESSED'] =  $arItem['PROPERTIES']['DESC_2']['VALUE']['TEXT'];
        }
    }
    if ($arItem['PROPERTIES']['IMG_3']['VALUE']) {
        $arItem['PROPERTIES']['IMG_3']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_3']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_3_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_3']['VALUE'], array("height"=>161, "width"=>221), BX_RESIZE_IMAGE_EXACT)['src'];

        if (strlen($arItem['PROPERTIES']['DESC_3']['VALUE']['TEXT']) > MAX_LENGTH){
            $words = strip_tags($arItem['PROPERTIES']['DESC_3']['VALUE']['TEXT']);
            $words = explode(' ', $words);
            $lettersCounter = 0;
            foreach ($words as $word){
                if($lettersCounter < MAX_LENGTH){
                    $arItem['PROPERTIES']['DESC_3_COMPRESSED'] .= $word . ' ';
                    $lettersCounter += strlen($word);
                } else {
                    break;
                }
            }
            if(strlen($arItem['PROPERTIES']['DESC_3_COMPRESSED']) < strlen(strip_tags($arItem['PROPERTIES']['DESC_3']['VALUE']['TEXT']))){
                $arItem['PROPERTIES']['DESC_3_COMPRESSED'] .= '...<br><span class="red">Подробнее...</span>';
            }

        } else {
            $arItem['PROPERTIES']['DESC_3_COMPRESSED'] =  $arItem['PROPERTIES']['DESC_3']['VALUE']['TEXT'];
        }

    }
    if ($arItem['PROPERTIES']['IMG_4']['VALUE']) {
        $arItem['PROPERTIES']['IMG_4']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_4']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_4_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_4']['VALUE'], array("height"=>161, "width"=>221), BX_RESIZE_IMAGE_EXACT)['src'];

        if (strlen($arItem['PROPERTIES']['DESC_4']['VALUE']['TEXT']) > MAX_LENGTH){
            $words = strip_tags($arItem['PROPERTIES']['DESC_4']['VALUE']['TEXT']);
            $words = explode(' ', $words);
            $lettersCounter = 0;
            foreach ($words as $word){
                if($lettersCounter < MAX_LENGTH){
                    $arItem['PROPERTIES']['DESC_4_COMPRESSED'] .= $word . ' ';
                    $lettersCounter += strlen($word);
                } else {
                    break;
                }
            }
            if(strlen($arItem['PROPERTIES']['DESC_4_COMPRESSED']) < strlen(strip_tags($arItem['PROPERTIES']['DESC_4']['VALUE']['TEXT']))){
                $arItem['PROPERTIES']['DESC_4_COMPRESSED'] .= '...<br><span class="red">Подробнее...</span>';
            }

        } else {
            $arItem['PROPERTIES']['DESC_4_COMPRESSED'] =  $arItem['PROPERTIES']['DESC_4']['VALUE']['TEXT'];
        }
    }
    if ($arItem['PROPERTIES']['IMG_5']['VALUE']) {
        $arItem['PROPERTIES']['IMG_5']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_5']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_5_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_5']['VALUE'], array("height"=>161, "width"=>221), BX_RESIZE_IMAGE_EXACT)['src'];

        if (strlen($arItem['PROPERTIES']['DESC_5']['VALUE']['TEXT']) > MAX_LENGTH){
            $words = strip_tags($arItem['PROPERTIES']['DESC_5']['VALUE']['TEXT']);
            $words = explode(' ', $words);
            $lettersCounter = 0;
            foreach ($words as $word){
                if($lettersCounter < MAX_LENGTH){
                    $arItem['PROPERTIES']['DESC_5_COMPRESSED'] .= $word . ' ';
                    $lettersCounter += strlen($word);
                } else {
                    break;
                }
            }
            if(strlen($arItem['PROPERTIES']['DESC_5_COMPRESSED']) < strlen(strip_tags($arItem['PROPERTIES']['DESC_5']['VALUE']['TEXT']))){
                $arItem['PROPERTIES']['DESC_5_COMPRESSED'] .= '...<br><span class="red">Подробнее...</span>';
            }

        } else {
            $arItem['PROPERTIES']['DESC_5_COMPRESSED'] =  $arItem['PROPERTIES']['DESC_5']['VALUE']['TEXT'];
        }
    }
    if ($arItem['PROPERTIES']['IMG_6']['VALUE']) {
        $arItem['PROPERTIES']['IMG_6']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_6']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
        $arItem['PROPERTIES']['IMG_6_PREVIEW']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_6']['VALUE'], array("height"=>161, "width"=>221), BX_RESIZE_IMAGE_EXACT)['src'];

        if (strlen($arItem['PROPERTIES']['DESC_6']['VALUE']['TEXT']) > MAX_LENGTH){
            $words = strip_tags($arItem['PROPERTIES']['DESC_6']['VALUE']['TEXT']);
            $words = explode(' ', $words);
            $lettersCounter = 0;
            foreach ($words as $word){
                if($lettersCounter < MAX_LENGTH){
                    $arItem['PROPERTIES']['DESC_6_COMPRESSED'] .= $word . ' ';
                    $lettersCounter += strlen($word);
                } else {
                    break;
                }
            }
            if(strlen($arItem['PROPERTIES']['DESC_6_COMPRESSED']) < strlen(strip_tags($arItem['PROPERTIES']['DESC_6']['VALUE']['TEXT']))){
                $arItem['PROPERTIES']['DESC_6_COMPRESSED'] .= '...<br><span class="red">Подробнее...</span>';
            }

        } else {
            $arItem['PROPERTIES']['DESC_6_COMPRESSED'] =  $arItem['PROPERTIES']['DESC_6']['VALUE']['TEXT'];
        }
    }

    if ($arItem['PROPERTIES']['IMG_O_1']['VALUE']) {
        $arItem['PROPERTIES']['IMG_O_1']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_O_1']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
    }
    if ($arItem['PROPERTIES']['IMG_O_2']['VALUE']) {
        $arItem['PROPERTIES']['IMG_O_2']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_O_2']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
    }
    if ($arItem['PROPERTIES']['IMG_O_3']['VALUE']) {
        $arItem['PROPERTIES']['IMG_O_3']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_O_3']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
    }
    if ($arItem['PROPERTIES']['IMG_O_4']['VALUE']) {
        $arItem['PROPERTIES']['IMG_O_4']['SRC'] = CFile::ResizeImageGet($arItem['PROPERTIES']['IMG_O_4']['VALUE'], array("height"=>676, "width"=>912), BX_RESIZE_IMAGE_EXACT)['src'];
    }
}
