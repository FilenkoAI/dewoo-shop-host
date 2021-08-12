<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?/*foreach($arResult as $arItem) :?>
    <?if ($arItem["SELECTED"]):?>
        <li><a href="<?=$arItem["LINK"]?>" style="margin-left: 4px"><span><span class="icon"></span><?=$arItem["TEXT"]?></span></a></li>
    <?else:?>
        <li><a href="<?=$arItem["LINK"]?>" style="margin-left: 4px"><span><span class="icon"></span><?=$arItem["TEXT"]?></span></a></li>
    <?endif?>
<?endforeach;*/?>
<?foreach($arResult as $arItem) :?>
    <?if ($arItem["SELECTED"]):?>
        <li class="addit">
            <a href="<?=$arItem["LINK"]?>" style="margin-left: 4px">
                <span class="wrapp-span">
                    <span class="icon icon-small"><img src="<?=$arItem["PARAMS"]["IMG"]?>" alt=" <?=$arItem["TEXT"]?>"></span>
                    <?=$arItem["TEXT"]?>
                </span>
            </a>
        </li>
    <?else:?>
        <li class="addit">
            <a href="<?=$arItem["LINK"]?>" style="margin-left: 4px">
                <span class="wrapp-span">
                    <span class="icon icon-small"><img src="<?=$arItem["PARAMS"]["IMG"]?>" alt=" <?=$arItem["TEXT"]?>"></span>
                    <?=$arItem["TEXT"]?>
                </span>
            </a>
        </li>
    <?endif?>
<?endforeach;?>
