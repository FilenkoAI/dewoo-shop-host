<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="form-search">
    <div class="container">
<form action="" method="get">
<div>
	<input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" placeholder="Например, газонокосилка бензиновая..."/>
	<input type="submit" value="" />
	<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
</div>

</form>
    </div>
</div>