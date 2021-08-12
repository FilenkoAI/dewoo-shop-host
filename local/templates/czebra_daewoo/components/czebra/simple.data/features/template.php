<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
$this->setFrameMode(true);?>


<div class="wrapp-info-icon">
    <div class="container">
        <div class="list-info-icon">
            <?foreach ($arResult['ITEMS'] as $key => $arItem):?>
            <div class="item-info-icon <?=$arItem['DISPLAY_PROPERTIES']['CLASS']['VALUE']?>">
                <a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>">
                    <div class="img-info-icon"><span></span></div>
                    <div class="text-info-icon"><?=$arItem['NAME']?></div>
                </a>
            </div>
            <?endforeach?>
        </div>
    </div>
</div>