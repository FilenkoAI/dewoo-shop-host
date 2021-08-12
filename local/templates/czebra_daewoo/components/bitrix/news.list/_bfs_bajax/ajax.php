<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach ($arResult["ITEMS"] as $arItem) :?>
    <?=$arItem["NAME"]?>
    <?=$arItem["DETAIL_PAGE_URL"]?>
    <?=$arItem["DISPLAY_ACTIVE_FROM"]?>
    <?=$arItem["PREVIEW_TEXT"];?>

    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
            

    <?foreach ($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty) :?>
        <?=$arProperty["NAME"]?>:<?=$arProperty["DISPLAY_VALUE"];?>
    <?endforeach;?>    

    <?foreach ($arItem["FIELDS"] as $code => $value) :?>
        <?=GetMessage("IBLOCK_FIELD_".$code)?>:<?=$value;?>
    <?endforeach;?>
<?endforeach?>
<?//=$arResult["NAV_STRING"];?>
<?if($arResult["NAV_RESULT"]->nEndPage > 1 && $arResult["NAV_RESULT"]->NavPageNomer < $arResult["NAV_RESULT"]->nEndPage):?>
    <a data-ajax-id="<?=$bxajaxid?>" href="javascript:void(0)" data-show-more="<?=$arResult["NAV_RESULT"]->NavNum?>" data-next-page="<?=($arResult["NAV_RESULT"]->NavPageNomer + 1)?>" data-max-page="<?=$arResult["NAV_RESULT"]->nEndPage?>">Показать еще</a>
<?endif?>
