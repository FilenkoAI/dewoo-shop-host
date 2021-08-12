<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<?foreach($arResult['ITEMS'] as $arItem):?>
    <div class="slide-compare" data-slide-del="id_<?=$arItem['ID']?>">
        <div class="img-item-comare">
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" alt=""></a>
        </div>
        <div class="add-to-favorites">
            <a href="#" onclick="addToFavs(event, <?=$arItem['ID']?>)" data-id="<?=$arItem['ID']?>"></a>
        </div>
        <div class="delete-compare">
            <a onclick="CatalogCompareObj.delete('<?=CUtil::JSEscape($arItem['~DELETE_URL'])?>', <?=$arItem['ID']?>);" href="javascript:void(0)"></a>
        </div>
        <div class="name-item-compare-mobil">
            <a href="#"><?=$arItem['NAME']?></a>
        </div>
        <div class="btn-compare">
            <a href="javascript:void(0);" class="btn-site1" data-czaction="addtocart" data-czbuy="<?=$arItem['ID']?>">
                <span class="btn-trans">Купить</span>
                <span class="btn-anim">Купить</span>
            </a>
        </div>
        <div class="list-characteristics">
            <?if($arItem['CZ_PROPS']['PRICES']['OLD_IS_GREATER'] === 'Y'):?>
                <div class="value-characteristics price-value color-price" data-compare="line1" style="height: 54px;">
                    <?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?>
                    <div class="old-price"><?=$arItem['CZ_PROPS']['PRICES']['OLD_PRICE']['DISPLAY_VALUE']?></div>
                </div>
            <?else:?>
            <div class="value-characteristics price-value" data-compare="line1"><?=$arItem['CZ_PROPS']['PRICES']['PRICE']['DISPLAY_VALUE']?></div>
            <?endif;?>
            <div class="value-characteristics bonus-value" data-compare="line2">180</div>
            <?$count = 3;?>
            <?foreach($arResult['SHOW_PROPERTIES'] as $code => $arProperty):?>
                <?
                $showRow = true;
                if ($arResult['DIFFERENT'])
                {
                    $arCompare = array();
                    foreach($arResult["ITEMS"] as $arElement)
                    {
                        $arPropertyValue = $arElement["DISPLAY_PROPERTIES"][$code]["VALUE"];
                        if (is_array($arPropertyValue))
                        {
                            sort($arPropertyValue);
                            $arPropertyValue = implode(" / ", $arPropertyValue);
                        }
                        $arCompare[] = $arPropertyValue;
                    }
                    unset($arElement);
                    $showRow = (count(array_unique($arCompare)) > 1);
                }
                ?>
                <?if($showRow):?>
                    <div class="value-characteristics" data-compare="line<?=$count?>"><?=$arItem['DISPLAY_PROPERTIES'][$code]['VALUE']?></div>
                    <?$count++;?>
                <?endif;?>
            <?endforeach;?>
        </div>
    </div>
<?endforeach;?>
<script>
    markAddedFavs();
    var czAdd = new CzebraProduct();
    czAdd.activate();
</script>
