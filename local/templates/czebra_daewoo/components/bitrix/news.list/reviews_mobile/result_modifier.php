<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
const COMMENT_LENGTH_MOBILE = 150;
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
    $prosText = strip_tags($arItem['PROPERTIES']['PROS']['~VALUE']['TEXT']);
    if (strlen($prosText) > COMMENT_LENGTH_MOBILE) {
        $czProps['PROS'] = [
            'FIRST_PART' => substr($prosText, 0, COMMENT_LENGTH_MOBILE) . '<a href="#" class="open-text"> Далее</a>',
            'SECOND_PART' => substr($prosText, COMMENT_LENGTH_MOBILE)
        ];
    } else {
        $czProps['PROS'] = [
            'FIRST_PART' => $prosText,
            'SECOND_PART' => ''
        ];
    }
    $consText = strip_tags($arItem['PROPERTIES']['CONS']['~VALUE']['TEXT']);
    if (strlen($consText) > COMMENT_LENGTH_MOBILE) {
        $czProps['CONS'] = [
            'FIRST_PART' => substr($consText, 0, COMMENT_LENGTH_MOBILE) . '<a href="#" class="open-text"> Далее</a>',
            'SECOND_PART' => substr($consText, COMMENT_LENGTH_MOBILE)
        ];
    } else {
        $czProps['CONS'] = [
            'FIRST_PART' => $consText,
            'SECOND_PART' => ''
        ];
    }
    $commentText = strip_tags($arItem['PROPERTIES']['COMMENT']['~VALUE']['TEXT']);
    if (strlen($commentText) > COMMENT_LENGTH_MOBILE) {
        $czProps['COMMENT'] = [
            'FIRST_PART' => substr($commentText,  0, COMMENT_LENGTH_MOBILE) . '<a href="#" class="open-text"> Далее</a>',
            'SECOND_PART' => substr($commentText,  COMMENT_LENGTH_MOBILE)
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
        $arResult['RATING']['AVERAGE'] += ($key * $arItem['AMOUNT']);
        $arItem['PERCENTAGE'] = $arItem['AMOUNT'] / $arResult['RATING']['VOTES'];
    }
}
if ($arResult['RATING']['VOTES'] > 0) {
    $arResult['RATING']['AVERAGE'] /= $arResult['RATING']['VOTES'];
}
