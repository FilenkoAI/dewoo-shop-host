<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>

<?=$arResult["NAME"]?>
<?//require(realpath(dirname(__FILE__)).'/photo.php')?>

<?=str_replace(" руб.","р.",$arResult["ITEM_PRICES"][$arResult["ITEM_PRICE_SELECTED"]]["PRINT_PRICE"])?>

<a href="" class="add-to-cart cart-icon" data-cz="addtocart" data-cz-buy="<?=$arResult["ID"]?>">В корзину</a>            
<a href="" data-compare-action="add" data-compare-id="<?=$arResult["ID"]?>"></a>