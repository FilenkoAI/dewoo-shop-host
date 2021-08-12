<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$api_key = 'AIzaSyDUWXh-DzxOGnfU-akWhTbOwwya3z1_pig';
foreach ($arResult["ITEMS"] as $key => &$arItem) {
    $arItem['PREVIEW'] = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]["ID"], array("height"=>231, "width"=>408), BX_RESIZE_IMAGE_EXACT)['src'];

    //Получаем количество просмотров
    $api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id=' . getYouTubeVideoID($arItem['PROPERTIES']['LINK']['VALUE']) . '&key=' . $api_key;
    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = json_decode(curl_exec($curl));
    $arResult["ITEMS"][$key]['VIEW_COUNT'] = number_format($data->items[0]->statistics->viewCount, 0, '', ' ');
}

function getYouTubeVideoID($url) {
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    if (isset($params['v']) && strlen($params['v']) > 0) {
        return $params['v'];
    } else {
        return "";
    }
}