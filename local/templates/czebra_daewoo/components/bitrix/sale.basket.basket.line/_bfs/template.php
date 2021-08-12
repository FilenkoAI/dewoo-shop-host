<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$frame = $this->createFrame()->begin('<a href="#" class="basket is-relative"><div class="is-basket-number"></div></a>');//Тут изменяем

$cartId = "bx_basket".$this->randString();
require(realpath(dirname(__FILE__)).'/ajax_template.php');
?>
<script>
    var <?=$cartId?> = new BitrixSmallCart;
    <?=$cartId?>.siteId       = '<?=SITE_ID?>';
    <?=$cartId?>.cartId       = '<?=$cartId?>';
    <?=$cartId?>.ajaxPath     = '<?=$componentPath?>/ajax.php';
    <?=$cartId?>.templateName = '<?=$templateName?>';
    <?=$cartId?>.arParams     =  <?=CUtil::PhpToJSObject ($arParams)?>;
    <?=$cartId?>.activate();
</script>