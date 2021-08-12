<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>
<?foreach($arResult['ITEMS'] as $arItem):?>
    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
    </a>

    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem['NAME']?></a>

    <?=str_replace("руб.","р.",$arItem["ITEM_PRICES"][$arItem["ITEM_PRICE_SELECTED"]]["PRINT_PRICE"])?>

    <input data-czquantity="<?=$arItem["ID"]?>" type='text' value='1' />
    <a href="" data-czaction="addtocart" data-cz-id="<?=$arItem["ID"]?>">В корзину</a>
    <a href="" data-compare-action="add" data-compare-id="<?=$arItem["ID"]?>" class="arrow-slide"></a>

    <?/*
        Памятка по добавлению в корзину товара:
        - параметры data-czaction="addtocart" data-cz-id="<?=$arItem["ID"]?>" для кнопки, которая добавляем в корзмну обязательны
        - для добавления с кол-вом параметр data-czquantity="<?=$arItem["ID"]?>" обязателен, а также параметры компонента
            "PRODUCT_QUANTITY_VARIABLE" => "quantity",
            "USE_PRODUCT_QUANTITY" => "Y",
    */?>
<?endforeach?>