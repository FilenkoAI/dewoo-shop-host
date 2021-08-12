<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
$this->setFrameMode(true);?>

<div class="wrapp-features-main">
    <div class="container">
        <div class="title-main">Наши преимущества</div>
        <div class="list-features-main">
            <?foreach ($arResult['ITEMS'] as $key => $arItem):?>

            <div class="item-features-main features<?=($key + 1)?>">
                <div class="img-features"><img src="<?=$arItem['IMAGE']?>" alt=""></div>
                <div class="text-features"><?=$arItem['DETAIL_TEXT']?></div>
            </div>
            <?endforeach?>
        </div>
    </div>
</div>
