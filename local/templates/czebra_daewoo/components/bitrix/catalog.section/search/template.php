<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>

<div class="result-search-list-modal" style="overflow: hidden">
    <? foreach($arResult['ITEMS'] as $arItem): ?>
        <div class="item-search-list-modal">
            <a href="/catalog/product/<?=$arItem['CODE']?>/"><?=$arItem['NAME']?></a>
        </div>
    <? endforeach ?>
</div>
<script>
    $(".result-search-list-modal").mCustomScrollbar({
        axis: "y",
        theme:"dark",
        scrollButtons:{ enable: true }
    });
</script>