<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

use Bitrix\Main\Application;
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();

//Получаем срок и стоимость доставки, вставляем картинки

$jsonCalculateInfo = \Czebra\Project\C6v::getPrice($request['startCity'], $request['endCity'], $request['length'], $request['width'], $request['weight'], $request['height']);
$arCalculateInfo = json_decode($jsonCalculateInfo, true);
$arCalculateInfo = \Czebra\Project\C6v::setDeliveriesLogos($arCalculateInfo);


$result = '';
if($arCalculateInfo){
    if($arCalculateInfo['err']){
        $result = '<p>К сожалению, доставка в данный населенный пункт не осуществяется</p>';
    } else {
        foreach ($arCalculateInfo as $info) {
            $result .= '<div class="item-company"> <input type="radio" id="company' . $info['server'] . '" name="delivery-company">'
                . '<label for="company1"><div class="wrapp-name-company">'
                . '<div class="img-company"><img src="' . $info['logo'] . '" alt=""></div>'
                . '<div class="name-company">' . $info['name'] . ' ' . $info['description']  . '</div>'
                .  '</div><div class="price-delivery-company">' . CurrencyFormat($info['price'], 'RUB') . '</div>'
                . '<div class="time-delivery-company">' . $info['days'] . ' дн.</div></label></div>';
        }
    }
}

echo $result;


