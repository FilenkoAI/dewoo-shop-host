<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
$this->setFrameMode(true); ?>

<div class="wrapp-slider-banner-mobil">
    <div class="container">
        <div class="slider-banner-mobil">
            <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                <div class="slide">
                    <? if ($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']): ?>
                        <a href="<?= $arItem['DISPLAY_PROPERTIES']['LINK']['VALUE'] ?>">
                    <? endif; ?>
                        <img src="<?= $arItem['IMAGE']['src'] ?>" alt="">
                    <? if ($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']): ?>
                        </a>
                    <? endif; ?>
                </div>
            <? endforeach ?>
        </div>
    </div>
</div>
