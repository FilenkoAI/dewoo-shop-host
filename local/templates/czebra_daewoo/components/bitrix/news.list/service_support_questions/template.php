<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="list-questions">
<?foreach($arResult["ITEMS"] as $arItem):?>
    <div class="item-question">
        <div class="author-question"><?=$arItem["PROPERTIES"]["QUESTION_AUTHOR"]["VALUE"]?></div>
        <div class="date-city"><?=$arItem["PROPERTIES"]["DATE"]["VALUE"]?></div>
        <div class="text-question"><?=$arItem["PROPERTIES"]["QUESTION"]["VALUE"]['TEXT']?></div>
        <div class="answer-question">
            <span>DAEWOO</span>
            <p><?=$arItem["PROPERTIES"]["ANSWER"]["VALUE"]["TEXT"]?></p>
        </div>
    </div>
<?endforeach;?>
</div>
<?if ($arParams["DISPLAY_BOTTOM_PAGER"]) :?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

