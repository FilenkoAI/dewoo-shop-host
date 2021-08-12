<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (!empty($arResult)) :?>


<?
$previousLevel = 0;
foreach($arResult as $key => $arItem) :?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) :?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>
	<?if ($arItem["IS_PARENT"] && $arItem['DEPTH_LEVEL'] != 3) :?>
			<li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>>
                <a href="<?=$arItem["LINK"]?>" data-menu-mobile-title-img="<?=$arItem['PARAMS']['ICON_MOBILE']?>">
                    <span class="icon">
                        <?if($arItem['PARAMS']['ICON_MOBILE']):?>
                            <?

                            ?>
                            <img src="<?=$arItem['PARAMS']['ICON_MOBILE']?>" alt="">
                        <?endif?>
                    </span> <?=$arItem["TEXT"]?>
                </a><ul>
	<?else :?>
            <li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>>
                <a href="<?=$arItem["LINK"]?>">
                      <span class="icon">
                        <?if($arItem['PARAMS']['ICON_MOBILE']):?>
                            <?

                            ?>
                            <img src="<?=$arItem['PARAMS']['ICON_MOBILE']?>" alt="">
                        <?endif?>
                    </span> <?=$arItem["TEXT"]?>
                </a>
            </li>
	<?endif?>
	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
<?endforeach?>
<?if ($previousLevel > 1) :?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

<?endif?>
