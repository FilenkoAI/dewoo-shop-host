<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<ul>
<?foreach($arResult as $key => $arItem) :?>
    <?if ($arItem["SELECTED"]):?>
        <li class="icon-menu<?=($key+1)?>"><a href="<?=$arItem["LINK"]?>" class="icon-menu<?=($key+1)?>     selected"><?=$arItem["TEXT"]?></a></li>
    <?else:?>
        <li><a href="<?=$arItem["LINK"]?>" class="icon-menu<?=($key+1)?>"><?=$arItem["TEXT"]?></a></li>
    <?endif?>
    <style>
        .menu-articles ul li .icon-menu<?=($key+1)?>::before{
            background: url('<?=SITE_TEMPLATE_PATH . '/front' . $arItem['PARAMS']['IMG']?>') no-repeat center center!important;
        }
        .menu-articles ul li .selected.icon-menu<?=($key+1)?>::before{
            background: url('<?=SITE_TEMPLATE_PATH . '/front' . $arItem['PARAMS']['IMG_ACTIVE']?>') no-repeat center center!important;
        }
    </style>
<?endforeach;?>
</ul>
<style>
    .menu-articles ul li .icon-menu4 {
        border-right: 1px solid #323232!important;
    }
</style>