<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/libs/simple_html_dom.php';

const COMMENT_LENGTH = 235000;
$arResult['RATING'] = [
    'COUNT' => [
        '1' => [
            'AMOUNT' => 0,
            'PERCENTAGE' => 0
        ],
        '2' => [
            'AMOUNT' => 0,
            'PERCENTAGE' => 0
        ],
        '3' => [
            'AMOUNT' => 0,
            'PERCENTAGE' => 0
        ],
        '4' => [
            'AMOUNT' => 0,
            'PERCENTAGE' => 0
        ],
        '5' => [
            'AMOUNT' => 0,
            'PERCENTAGE' => 0
        ],
    ],
    'AVERAGE' => 0,
    'VOTES' => 0
];

foreach ($arResult["ITEMS"] as $key => &$arItem) {

    $czProps = [];
    //Обработка длины текстовых полей(достоинства, недостатки, комментарий);
    $prosText = $arItem['PROPERTIES']['PROS']['~VALUE']['TEXT'];
    if (strlen($prosText) > COMMENT_LENGTH && $prosText == strip_tags($prosText, ['p', 'b']) ) {
        $czProps['PROS'] = [
            'FIRST_PART' => substr($prosText, 0, COMMENT_LENGTH) . '<a href="#" class="open-text"> Далее</a>',
            'SECOND_PART' => substr($prosText, COMMENT_LENGTH)
        ];
    } else {
        $czProps['PROS'] = [
            'FIRST_PART' => $prosText,
            'SECOND_PART' => ''
        ];
    }
    $consText = $arItem['PROPERTIES']['CONS']['~VALUE']['TEXT'];
    if (strlen($consText) > COMMENT_LENGTH && $consText == strip_tags($consText, ['p', 'b']) ) {

        $czProps['CONS'] = [
            'FIRST_PART' => substr($consText, 0, COMMENT_LENGTH) . '<a href="#" class="open-text"> Далее</a>',
            'SECOND_PART' => substr($consText, COMMENT_LENGTH)
        ];
    } else {
        $czProps['CONS'] = [
            'FIRST_PART' => $consText,
            'SECOND_PART' => ''
        ];
    }
    $html = str_get_html($arItem['PROPERTIES']['COMMENT']['~VALUE']['TEXT']);
    if ($html)
    {
        foreach ($html->find('a') as $link) {
            $link->rel = 'nofollow';
            $link->outertext = '<!--noindex-->' . $link->outertext . '<!--/noindex-->';
        }
    }
    $arItem['PROPERTIES']['COMMENT']['~VALUE']['TEXT'] = $html;

    $commentText = $arItem['PROPERTIES']['COMMENT']['~VALUE']['TEXT'];
    if (strlen($commentText) > COMMENT_LENGTH && $commentText == strip_tags($commentText, ['p', 'b'])) {
        $czProps['COMMENT'] = [
            'FIRST_PART' => substr($commentText,  0, COMMENT_LENGTH) . '<a href="#" class="open-text"> Далее</a>',
            'SECOND_PART' => substr($commentText,  COMMENT_LENGTH)
        ];
    } else {
        $czProps['COMMENT'] = [
            'FIRST_PART' => $commentText,
            'SECOND_PART' => ''
        ];
    }


    //Обработка всего рейтинга
    $arResult['RATING']['COUNT'][$arItem['PROPERTIES']['RATING']['VALUE']]['AMOUNT'] += 1;
    $arResult['RATING']['VOTES'] += 1;
    $arItem['CZ_PROPS'] = $czProps;
    if ( $arItem['PROPERTIES']['DATE']['VALUE'] ) {
        $arItem['CZ_DATE'] = FormatDate('d F Y', strtotime($arItem['PROPERTIES']['DATE']['VALUE']));
    }
}

foreach ($arResult['RATING']['COUNT'] as $key => &$arItem) {
    if ($arItem['AMOUNT'] != 0) {
        $arResult['RATING']['AVERAGE'] += $key * $arItem['AMOUNT'];
        $arItem['PERCENTAGE'] = $arItem['AMOUNT'] / $arResult['RATING']['VOTES'];
    }
}

$arResult['RATING']['AVERAGE'] /= $arResult['RATING']['VOTES'];
