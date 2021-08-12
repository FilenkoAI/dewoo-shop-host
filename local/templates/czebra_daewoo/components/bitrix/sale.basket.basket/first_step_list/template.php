<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?if(count($arResult['GRID']['ROWS'])):?>
<div class="table-items-cart">
    <div class="head-table-cart">
        <div class="photo-item-cart">Фото</div>
        <div class="name-item-cart">Название товара</div>
        <div class="price-item-cart">Цена</div>
        <div class="count-item-cart">Кол-во</div>
        <div class="sum-price-item-cart">Стоимость</div>
        <div class="delete-item-cart"></div>
    </div>

    <div class="body-table-cart">
<?
foreach($arResult['GRID']['ROWS'] as $item):
?>
    <div class="item-table-cart">
        <div class="photo-item-cart">
            <a href="<?=$item['DETAIL_PAGE_URL']?>"><img src="<?=$item['CZ_PROPS']['PREVIEW']?>" alt=""></a>
        </div>
        <div class="name-item-cart">
            <a href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a>
        </div>
        <div class="price-item-cart">
            <div class="price"><?=$item["PRICE_FORMATED_RUB"] ?></div>
        </div>
        <div class="count-item-cart">
            <input type="number" data-id="<?=$item['ID']?>" value='<?=$item['QUANTITY']?>'>
        </div>
        <div class="sum-price-item-cart sum-price-item-<?=$item['ID']?>" ><?=$item["SUM_FULL_PRICE_FORMATED_RUB"]?></div>
        <div class="delete-item-cart"><a href="#"  data-id="<?=$item['ID']?>"></a></div>
    </div>
<?endforeach;?>
    </div>
        <div class="total-price-cart">
            <p>Итого: <span><?=$arResult["allSum_FORMATED"]?></span></p>
        </div>

    </div>
<?else:?>
    <p>Ваша корзина пуста. Начните делать <a href="/catalog/">покупки прямо сейчас</a>.</p>
<?endif?>
<script>
    fastBuy();
</script>