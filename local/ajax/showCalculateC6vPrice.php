<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

use Bitrix\Main\Application;
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();

//Получаем срок и стоимость доставки

$jsonCalculateInfo = \Czebra\Project\C6v::getPrice($request['startCity'], $request['endCity'], $request['length'], $request['width'], $request['weight'], $request['height']);
$arCalculateInfo = json_decode($jsonCalculateInfo, true);

$html = '';
if($arCalculateInfo){
    if($arCalculateInfo['err']){
        $html .= '<p>'.$arCalculateInfo['err'].'</p>';
    } else {
        $html .= '<div class="result-title">Результат расчета:</div>';
        foreach ($arCalculateInfo as $info) {
            $price = CurrencyFormat($info['price'], 'RUB');
            $html .= '<div class="wrapp-calculate-item">';
            $desc = ($info['description'] !== null) ? ' ('.$info['description'].')' : '';
            $html .= '<p class="title-delivery">'.$info['name'].$desc.'</p>';
            $html .= '<p>Срок (дней): '.$info['days'].'</p>';
            $html .= '<p>Стоимость: '.$price.'</p>';
            $html .= '</div>';
        }
        $html .= '<p class="warning-message"><sup>*</sup>Информация о доставке является ориентировочной </p>';
    }

}

echo $html;