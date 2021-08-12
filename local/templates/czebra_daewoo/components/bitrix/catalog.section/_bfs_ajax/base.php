<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="wrapp-catalog"><div class="container"><div class="row">
    <div class="wrapp-ajax"><?require(realpath(dirname(__FILE__)).'/ajax.php')?></div>
    <?if($arParams["HIDE_NAV_STRING"] != "Y"):?>
        <div class="nav-block"><?=$arResult["NAV_STRING"];?></div>
        <div class="more-item" style="display: block;">
            <a href="" class="button-more-product">показать еще</a>
        </div>
    <?endif?>
</div>
</div>
</div>

<?if($arParams["HIDE_NAV_STRING"] != "Y"):
    GLOBAL ${$arParams["FILTER_NAME"]};
?>
    <input type="hidden" id="ajaxParams" value="<?=\Czebra\BFS\AjaxLoading::getCryptComponent($component->GetName(), $templateName, $arParams)?>" />
    <input type="hidden" id="ajaxFilter" value="<?=\Czebra\BFS\AjaxLoading::getCryptArray(${$arParams["FILTER_NAME"]});?>" />
    <input type="hidden" id="ajaxCallback" value="afterInstertAjax()" />
    <input type="hidden" id="ajaxContener" value=".wrapp-catalog .container .row .wrapp-ajax" />
<?endif?>

