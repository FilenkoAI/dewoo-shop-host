<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
$this->setFrameMode(true);?>
<div class="wrapp-slider-video-main">
    <div class="slider-video-main">
        <?foreach ($arResult['ITEMS'] as $arItem):?>
        <div class="slide">
            <div class="wrapp-video-slide">
                <a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" data-fancybox="video">
                    <div class="block-video">
                        <img src="<?=$arItem['PREVIEW']?>" alt="">
                        <div class="play-video-slide"></div>
                    </div>
                    <div class="name-video"><?=$arItem['NAME']?></div>
                </a>
            </div>
        </div>
        <?endforeach?>
    </div>
</div>


<?
$videoBlocksCount = ceil(count($arResult['ITEMS'])/2);
?>
<div class="wrapp-slider-video-main wrapp-slider-video-main--mobile">
    <div class="slider-video-main">

        <?for($i = 0; $i < $videoBlocksCount; $i++):?>
            <div class="slide">

                <?for($j = 0; $j < 2; $j++):?>
                    <?
                    if (!current($arResult['ITEMS']))
                        break;
                    $arItem = current($arResult['ITEMS']);
                    ?>
                    <div class="wrapp-video-slide">
                        <a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" data-fancybox="video">
                            <div class="block-video">
                                <img src="<?=$arItem['PREVIEW']?>" alt="">
                                <div class="play-video-slide"></div>
                            </div>
                            <div class="name-video"><?=$arItem['NAME']?></div>
                        </a>
                    </div>
                    <?next($arResult['ITEMS'])?>
                <?endfor;?>


            </div>
        <?endfor;?>


    </div>
</div>