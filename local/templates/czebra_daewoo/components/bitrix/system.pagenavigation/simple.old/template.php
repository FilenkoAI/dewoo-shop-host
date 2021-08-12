<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<?if($arResult["NavPageCount"] > 1):?>
<div class="wrapp-pagination""><ul>
    <?//Назад
    if($arResult["NavPageNomer"] == 1):?>
        <li class="disabled"><span aria-hidden="true"><i class="icon icon-pagination_prev"></i></span></li>
    <?else:?>
        <li class="prev-pagination"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>#"></a></li>
    <?endif?>
    <?if($arResult["NavPageNomer"] > 4):?>
        <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_1=1">1</a></li>
        <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round(($arResult["nStartPage"] + 1)/2)?>">...</a></li>
    <?endif?>
    <?//Цифры
    while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>

        <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
            <?/*<b><?=$arResult["nStartPage"]?></b>*/?>
            <li><a href="#" class="selected"><?=$arResult["nStartPage"]?> <span class="sr-only">(current)</span></a></li>
        <?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
            <li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a></li>
        <?else:?>
            <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a></li>
        <?endif?>
        <?$arResult["nStartPage"]++?>

    <?endwhile?>
    <?if($arResult["NavPageNomer"] <= $arResult["NavPageCount"] - 4):?>
        <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round(($arResult["nEndPage"] + $arResult['NavPageCount'])/2)?>">...</a></li>
        <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a></li>
    <?endif?>
    <?//Веперд
    if($arResult["NavPageNomer"] == $arResult["NavPageCount"]):?>
    <?else:?>
        <li class="next-pagination"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>#"></a></li>
    <?endif?>
</ul>
</div>
<?endif?>
