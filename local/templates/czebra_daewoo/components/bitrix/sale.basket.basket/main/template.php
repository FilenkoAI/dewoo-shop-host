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
                <?/*
                <div class="bonus-item-cart">Бонусы</div>
                */?>
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
        <?/*
        <div class="bonus-item-cart">+1000</div>
        */?>
        <div class="count-item-cart">
            <input type="number" data-id="<?=$item['ID']?>" value='<?=$item['QUANTITY']?>'>
        </div>
        <div class="sum-price-item-cart sum-price-item-<?=$item['ID']?>" ><?=$item["SUM_FULL_PRICE_FORMATED_RUB"]?></div>
        <div class="delete-item-cart"><a href="#"  data-id="<?=$item['ID']?>"></a></div>
    </div>

<?endforeach;?>
    </div>
        </div>
        <div class="total-price-cart">
            <p>Итого: <span><?=$arResult["allSum_FORMATED"]?></span></p>
        </div>
    </div>
    <div class="form-user-quick-order">
        <form id="fastbuy_main">
            <div class="list-field">
                <div class="wrapp-field">
                    <label for="">Имя или фамилия</label>
                    <input type="text" name="NAME" data-cz-validated-type="data" data-cz-validated-group="fastbuy">
                </div>
                <div class="wrapp-field">
                    <label for="">Телефон</label>
                    <input type="text" name="PHONE" data-cz-validated-group="fastbuy" data-cz-validated-type="data" placeholder="+7 (___) ___-__-__" data-phone="yes_fastbuy" pattern="\+[0-9]\s?[\(][0-9]{3}[\)]\s?[0-9]{3}[-][0-9]{2}[-][0-9]{2}">
                </div>
            </div>
            <button class="btn-site1" id="fastbuy_button">
                <span class="btn-trans">Оформить заказ</span>
                <span class="btn-anim">Оформить заказ</span>
            </button>
            <p class="text-ptivacy">Продолжая, Вы принимаете положения <a href="/confidentiality/" target="_blank">Политики конфиденциальности</a>, <a href="/terms_of_use/" target="_blank">Пользовательского соглашения</a> и <a href="/public_offer/" target="_blank">Публичной оферты</a>.</p>
        </form>
    </div>
<?else:?>
    <p>Ваша корзина пуста. Начните делать <a href="/catalog/">покупки прямо сейчас</a>.</p>
<?endif?>
    <a href="#" class="close-modal"></a>
</div>
<script>
    fastBuy();
    $("[data-phone='yes_fastbuy']").inputmask("+7 (999) 999-99-99");
    $('#fastbuy_main').submit(function (){
        if (cz_validated.run('fastbuy')) {
            let data = {};
            $(this).find('input, textearea, select').each(function() {
                data[this.name] = $(this).val();
            });
            $.ajax({
                url: '/local/ajax/fastbuy/process.php',
                data: data,
                type: "POST",
                success: function (data){
                    data = JSON.parse(data);
                    if (data.status == 'success'){
                        $('.quick-order-form .table-quick-order,.quick-order-form .form-user-quick-order, .quick-order-form p').remove();
                        // $('.quick-order-form .modal-body').append("<p style='margin-top: 20px; text-align: center'>Спасибо за заказ! Наш менеджер свяжется с Вами в ближайшее врермя.</p>")
                        $('.quick-order-form .modal-body').append(`
                        <p style='margin-top: 20px; text-align: center'>Спасибо, Ваш заказ принят!</p>
                        <p>Наши менеджеры свяжутся с вами в ближайшее время.</p>
                        <p>Номер заказа: ${data.id}</p>
                        <p>Всю информацию о заказе, оплате и доставке вы сможете посмотреть в личном кабинете.</p>
                        <p><a href="javascript:void(0)" onclick="$('.quick-order-form').modal('hide')">Продолжить покупки.</a></p>
                        <p>Присоединитесь к нам в социальных сетях:</p>
                        <div class="list-social">
                            <a href="https://www.youtube.com/channel/UCNoSo5_n22ZU91I-h_KW4Vg" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/yt-footer.svg" alt=""></a>
                            <a href="https://vk.com/daewoopowerproducts" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/vk-footer.svg" alt=""></a>
                            <a href="https://www.instagram.com/daewoo_power_products/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/insta-footer.svg" alt=""></a>
                            <a href="https://www.facebook.com/daewoopowerproductsrussia/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/fb-footer.svg" alt=""></a>
                            <a href="https://ok.ru/group/52738602827857/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/odn.svg" alt=""></a>
                        </div>

                        `);
                        ym(31362968,'reachGoal','oformit-1-klik');
                        gtag('event', 'oformit-1-klik', {'event_category': 'Forma'});
                    }
                }
            })
        }
        return false;
    })
</script>