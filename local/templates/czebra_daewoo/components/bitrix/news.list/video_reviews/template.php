<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class="list-video">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <div class="item-video">

            <div class="block-video">
                <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>" data-fancybox="video">
                    <img src="<?=$arItem['PREVIEW']?>" alt="">
                    <span class="play-video"></span>
                </a>
            </div>
            <div class="name-video">
                <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>" data-fancybox="video"><?=$arItem['NAME']?></a>
            </div>
            <div class="show-count-video">
                <span><?=$arItem['VIEW_COUNT'];?></span>
            </div>
        </div>
    <?endforeach;?>
</div>
    <?if(count($arResult['ITEMS']) == 0):?>
        <p>Ничего не найдено.</p>
    <?endif;?>
    <?if ($arParams["DISPLAY_BOTTOM_PAGER"]) :?>
        <?=$arResult["NAV_STRING"]?>
    <?endif;?>

