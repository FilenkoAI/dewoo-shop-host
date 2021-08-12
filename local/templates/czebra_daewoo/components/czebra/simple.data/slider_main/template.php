<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
$this->setFrameMode(true); ?>

<div class="wrapp-slider-main">
    <div class="container-arrows container"></div>
    <div class="slider-main">
        <? foreach($arResult["ITEMS"] as $key => $arItem): ?>

            <div class="slide">

                            <? if($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']): ?>
                                <a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>">
                            <? endif; ?>
                <div class="img-slide"><img src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" alt=""></div>
                <div class="container content-block">
                    <div class="wrapp-slide">
                        <? /*div class="img-slide"><img src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" alt=""></div*/ ?>

                        <div class="text-slide">
                            <?/*
                            <div class="title-slide"><?=$arItem['NAME']?></div>
                            */?>
                            <div class="descr-slide"><?=$arItem['DISPLAY_PROPERTIES']['TEXT']['VALUE']?></div>
                            <div class="link-slide">
                                <? if($arItem['DISPLAY_PROPERTIES']['BTN_TEXT']['VALUE']): ?>
                                    <a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>"
                                       target="_blank"><?=$arItem['DISPLAY_PROPERTIES']['BTN_TEXT']['VALUE']?></a>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-slide"></div>

                            <? if($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']): ?>
                                </a>
                            <? endif; ?>
            </div>

        <? endforeach ?>
    </div>
</div>


