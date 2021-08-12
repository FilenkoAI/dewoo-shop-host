<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<ul>
<?foreach($arResult as $key => $arItem) :?>
    <?if ($arItem["SELECTED"]):?>
        <li class="icon-menu<?=($key+1)?>"><a href="<?=$arItem["LINK"]?>" class="icon-menu<?=($key+1)?>     selected"><?=$arItem["TEXT"]?></a></li>
    <?else:?>
        <li><a href="<?=$arItem["LINK"]?>" class="icon-menu<?=($key+1)?>"><?=$arItem["TEXT"]?></a></li>
    <?endif?>
<?endforeach;?>
</ul>
