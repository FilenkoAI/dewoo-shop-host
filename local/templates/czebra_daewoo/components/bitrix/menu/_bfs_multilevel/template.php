<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (!empty($arResult)) :?>
<ul>
<?
$previousLevel = 0;
foreach($arResult as $arItem) :?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) :?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>
	<?if ($arItem["IS_PARENT"]) :?>
		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><ul class="menu-item">
		<?else :?>
			<li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><ul class="menu-item">
		<?endif?>
	<?else :?>
		<?if ($arItem["PERMISSION"] > "D") :?>
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?else :?>
				<li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>
		<?else :?>
			<?if ($arItem["DEPTH_LEVEL"] == 1) :?>
				<li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>><a href=""><?=$arItem["TEXT"]?></a></li>
			<?else :?>
				<li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>><a href=""><?=$arItem["TEXT"]?></a></li>
			<?endif?>
		<?endif?>
	<?endif?>
	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
<?endforeach?>
<?if ($previousLevel > 1) :?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>
</ul>
<?endif?>