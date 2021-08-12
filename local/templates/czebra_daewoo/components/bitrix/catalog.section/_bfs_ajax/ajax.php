<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult['ITEMS'] as $arItem):?>
    <?=$arItem['NAME']?>
    <?=$arItem['DETAIL_PAGE_URL']?>
    <?=$arItem['PREVIEW_PICTURE']['SRC']?>
    <?=$arItem['PROPERTIES']['']['VALUE']?>
<?endforeach;?>
<?if($arResult["NAV_RESULT"]->nEndPage > 1 && $arResult["NAV_RESULT"]->NavPageNomer < $arResult["NAV_RESULT"]->nEndPage):?>
    <a data-ajax-id="<?=$bxajaxid?>" href="javascript:void(0)" data-show-more="<?=$arResult["NAV_RESULT"]->NavNum?>" data-next-page="<?=($arResult["NAV_RESULT"]->NavPageNomer + 1)?>" data-max-page="<?=$arResult["NAV_RESULT"]->nEndPage?>">Показать еще</a>
<?endif?>

<?if ($arParams['AJAX'] == 'Y') :?>
    <div id="wrap-pager-ajax" style="display: none;"><?=$arResult["NAV_STRING"];?></div>
<?endif?>