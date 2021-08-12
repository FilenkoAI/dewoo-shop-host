<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="list-city elastic">
    <div class="column-city">
        <?foreach(array_values($arResult['CITY_IMPORTANCE']) as $key => $arItem):?>
            <a href="http://<?=$arItem['DISPLAY_PROPERTIES']['HOST_NAME']['VALUE']?>" class="searchable" data-name="<?=mb_strtolower($arItem["NAME"], 'UTF-8')?>"><?=$arItem["NAME"]?></a>
        <?endforeach;?>
    </div>
    <div class="column-city">
        <?foreach(array_values($arResult['CITY_NO_IMPORTANCE']) as $key2 => $arItem):?>
            <?if(($key2 % 11 == 0) && $key2 != 0):?>
                </div><div class="column-city">
            <?endif;?>
            <a href="http://<?=$arItem['DISPLAY_PROPERTIES']['HOST_NAME']['VALUE']?>" class="searchable" data-name="<?=mb_strtolower($arItem["NAME"], 'UTF-8')?>"><?=$arItem["NAME"]?></a>
        <?endforeach;?>
        <a href="http://<?=$arResult['OTHER_CITY']['DISPLAY_PROPERTIES']['HOST_NAME']['VALUE']?>" ><?=$arResult['OTHER_CITY']["NAME"]?></a>
    </div>
</div>

<div class="list-city-mobil">
    <div class="column-city">
        <?foreach($arResult['ITEMS'] as $key => $arItem):?>
        <?if(($key + 1) % 19 == 0):?>
            </div><div class="column-city">
        <?endif;?>
            <a href="http://<?=$arItem['DISPLAY_PROPERTIES']['HOST_NAME']['VALUE']?>" class="searchable" data-name="<?=mb_strtolower($arItem["NAME"], 'UTF-8')?>">
                <?if($arItem['DISPLAY_PROPERTIES']['IMPORTANCE']['VALUE'] == 'Да'):?>
                    <b><?=$arItem["NAME"]?></b>
                <?else:?>
                    <?=$arItem["NAME"]?>
                <?endif;?>
            </a>
        <?endforeach;?>
        <a href="http://<?=$arResult['OTHER_CITY']['DISPLAY_PROPERTIES']['HOST_NAME']['VALUE']?>" ><?=$arResult['OTHER_CITY']["NAME"]?></a>
    </div>
</div>


