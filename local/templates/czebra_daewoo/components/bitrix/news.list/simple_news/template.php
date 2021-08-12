<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="wrapp-list-news">
    <?foreach($arResult["ITEMS"] as $arItem):?>
    <div class="wrapp-item-news">
        <div class="item-news">
            <div class="img-news">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt=""></a>
            </div>
            <div class="info-news">
                <div class="name-news">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                </div>
                <div class="date-news"><?=$arItem['PROPERTIES']['DATE']['VALUE']?></div>
            </div>
        </div>
    </div>
    <?endforeach;?>
    <?if(count($arResult['ITEMS']) == 0):?>
        <p>Ничего не найдено.</p>
    <?endif;?>
</div>
<?if ($arParams["DISPLAY_BOTTOM_PAGER"]) :?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

