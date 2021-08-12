<?php
namespace Czebra\Project;
class YoutubeVideo
{
    const IBLOCK_VIDEO_ID = 14;

    public static function addPreview(&$arFields)
    {
        if ($arFields['IBLOCK_ID'] == self::IBLOCK_VIDEO_ID ) {

            $link = $arFields['PROPERTY_VALUES'][103]['n0']['VALUE'];

            if ($link && !$arFields['DETAIL_PICTURE']) {
                $code = '';
                if (!strpos($link,'?v=')){
                    $temArr = explode('/', $link);
                } else {
                    $temArr = explode('?v=', $link);
                }
                $code = end($temArr);
                $url = 'https://img.youtube.com/vi/' . $code . '/hqdefault.jpg';
                $el = new \CIBlockElement;
                global $USER;
                $arLoadProductArray = Array(
                    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                    "DETAIL_PICTURE" => \CFile::MakeFileArray($url)
                );
                $PRODUCT_ID = $arFields['ID'];  // изменяем элемент с кодом (ID) 2
                $result = $el->Update($PRODUCT_ID, $arLoadProductArray);
            }
        }
    }

}