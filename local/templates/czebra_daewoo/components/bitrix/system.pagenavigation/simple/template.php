<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
?>
<div class="wrapp-pagination"><ul>
    <?

    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
    ?>
    <?
    if($arResult["bDescPageNumbering"] === true):
        $bFirst = true;
        if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
            if($arResult["bSavePage"]):
                ?>

            <?
            else:
                if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
                    ?>
                <?
                else:
                    ?>
                <?
                endif;
            endif;

            if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
                $bFirst = false;
                if($arResult["bSavePage"]):
                    ?>
                    <li><a class="modern-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">1</a></li>
                <?
                else:
                    ?>
                    <li><a class="modern-page-first" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a></li>
                <?
                endif;
                if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
                    ?>
                    <li><a class="modern-page-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=intVal($arResult["nStartPage"] + ($arResult["NavPageCount"] - $arResult["nStartPage"]) / 2)?>">...</a></li>
                <?
                endif;
            endif;
        endif;
        do
        {
            $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

            if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                ?>
                <a href="" class="selected"><?=$NavRecordGroupPrint?></a>
            <?
            elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
                ?>
                <li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "modern-page-first" : "")?>"><?=$NavRecordGroupPrint?></a></li>
            <?
            else:
                ?>
                <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
                ?> class="<?=($bFirst ? "modern-page-first" : "")?>"><?=$NavRecordGroupPrint?></a></li>
            <?
            endif;

            $arResult["nStartPage"]--;
            $bFirst = false;
        } while($arResult["nStartPage"] >= $arResult["nEndPage"]);

        if ($arResult["NavPageNomer"] > 1):
            if ($arResult["nEndPage"] > 1):
                if ($arResult["nEndPage"] > 2):
                    ?>
                    <li><a class="modern-page-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] / 2)?>">...</a></li>
                <?
                endif;
                ?>
                <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a></li>
            <?
            endif;

        endif;

    else:
        $bFirst = true;

        if ($arResult["NavPageNomer"] > 1):
            if($arResult["bSavePage"]):
                ?>
            <?
            else:
                if ($arResult["NavPageNomer"] > 2):
                    ?>
                <?
                else:
                    ?>
                <?
                endif;

            endif;

            if ($arResult["nStartPage"] > 1):
                $bFirst = false;
                if($arResult["bSavePage"]):
                    ?>
                    <li><a class="modern-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a></li>
                <?
                else:
                    ?>
                    <li><a class="modern-page-first" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a></li>
                <?
                endif;
                if ($arResult["nStartPage"] > 2):
                    ?>
                    <li><a class="modern-page-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">...</a></li>
                <?
                endif;
            endif;
        endif;

        do
        {
            if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                ?>
                <li><a href="" class="selected"><?=$arResult["nStartPage"]?></a></li>
            <?
            elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                ?>
                <li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "modern-page-first" : "")?>"><?=$arResult["nStartPage"]?></a></li>
            <?
            else:
                ?>
                <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
                ?> class="<?=($bFirst ? "modern-page-first" : "")?>"><?=$arResult["nStartPage"]?></a></li>
            <?
            endif;
            $arResult["nStartPage"]++;
            $bFirst = false;
        } while($arResult["nStartPage"] <= $arResult["nEndPage"]);

        if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
            if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
                if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
                    ?>
                    <li><a class="modern-page-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>">...</a></li>
                <?
                endif;
                ?>
                <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a></li>
            <?
            endif;
            ?>
        <?
        endif;
    endif;

    if ($arResult["bShowAll"]):
        if ($arResult["NavShowAll"]):
            ?>
            <li><a class="modern-page-pagen" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("nav_paged")?></a></li>
        <?
        else:
            ?>
            <li><a class="modern-page-all" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("nav_all")?></a></li>
        <?
        endif;
    endif
    ?>
    </ul>
</div>