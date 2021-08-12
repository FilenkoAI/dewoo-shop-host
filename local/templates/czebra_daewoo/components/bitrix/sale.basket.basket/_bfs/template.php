<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<div class="modal-body">
<?if(count($arResult['GRID']['ROWS']) > 0):?>
    <div class="title-quick-order">Быстрый заказ в “1 клик”</div>
    <p>Не хотите заполнять всю информацию? Оформление заказа займет у Вас не более 30 секунд!</p>
    <div class="table-quick-order">
        <div class="table-items-cart">
            <div class="head-table-cart">
                <div class="photo-item-cart">Фото</div>
                <div class="name-item-cart">Название товара</div>
                <div class="price-item-cart">Цена</div>
                <div class="bonus-item-cart">Бонусы</div>
                <div class="count-item-cart">Кол-во</div>
                <div class="sum-price-item-cart">Стоимость</div>
                <div class="delete-item-cart"></div>
            </div>

            <div class="body-table-cart">
<?
//print_r($arResult);
foreach($arResult['GRID']['ROWS'] as $item):
?>
    <div class="item-table-cart">
        <div class="photo-item-cart">
            <a href="<?=$item['DETAIL_PAGE_URL']?>"><img src="<?=$item['PREVIEW_PICTURE_SRC']?>" alt=""></a>
        </div>
        <div class="name-item-cart">
            <a href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a>
        </div>
        <div class="price-item-cart">
            <div class="price"><?=$item["PRICE_FORMATED_RUB"] ?></div>
        </div>
        <div class="bonus-item-cart">+1000</div>
        <div class="count-item-cart">
            <input type="text" value='1'>
        </div>
        <div class="sum-price-item-cart"><?=$item["SUM_FULL_PRICE_FORMATED_RUB"]?></div>
        <div class="delete-item-cart"><a href="#" data-id="<?=$item['PRODUCT_ID']?>"></a></div>
    </div>
<!--    <pre>-->
<!--        --><?//=print_r($item)?>
<!--    </pre>-->
<?endforeach;?>
    </div>
        </div>
        <div class="total-price-cart">
            <p>Итого: <span><?=$arResult["allSum_FORMATED"]?></span></p>
        </div>
    </div>
    <div class="form-user-quick-order">
        <form action="<?=$arParams["PATH_TO_ORDER"]?>">
            <div class="list-field">
                <div class="wrapp-field">
                    <label for="">Имя и Фамилия</label>
                    <input type="text">
                </div>
                <div class="wrapp-field">
                    <label for="">Телефон</label>
                    <input type="text">
                </div>
            </div>
            <button class="btn-site1">
                <span class="btn-trans">Оформить заказ</span>
                <span class="btn-anim">Оформить заказ</span>
            </button>
            <p class="text-ptivacy">Продолжая, Вы принимаете положения <a href="#">Политики конфиденциальности</a>, <a href="#">Пользовательского соглашения</a> и <a href="#">Публичной оферты</a>.</p>
        </form>
    </div>
<?else:?>
    <p>Ваша корзина пуста. Начните делать <a href="/catalog/">покупки прямо сейчас</a>.</p>
<?endif?>
    <a href="#" class="close-modal"></a>
</div>
<script>
</script>