<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
global $USER;
?>
<div class="wrapp-list-reviews">
    <div class="list-reviews">
        <div class="title-reviews">Отзывы <span class="count-reviews"><?=count($arResult["ITEMS"])?></span></div>
        <?$count = 0?>
        <?$blocks = 0?>
        <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
            <? if ($count == 0):?>
                <?$blocks++;?>
            <div class="review-block" data-number="<?=$blocks?>" style="<?if($blocks != 1):?>display: none<?endif?>">
            <? endif ?>
                <div class="item-review">
                    <div class="name-reviewer"><?=$arItem['PROPERTIES']['AUTHOR']['VALUE']?></div>
                    <?=$arItem['ACTIVE_FROM']?>
                    <div class="date-city"><?=$arItem['CZ_DATE']?></div>
                    <div class="rating">

                        <div class="rate">
                            <input class="input-rating" name = "input-name" type = "number" style="display: none" value="<?=$arItem['PROPERTIES']['RATING']['VALUE']?>" disabled="true">
                        </div>
                        <div class="useful-reviews"
                            <? if($USER->IsAuthorized()): ?>
                                data-review="<?=$arItem['ID']?>"
                            <? endif; ?>
                        >
                            <div class="yes-reviews"><a href="#"
                                                        data-action="like"><span><?=$arItem['PROPERTIES']['LIKES']['VALUE']?></span></a>
                            </div>
                            <div class="no-reviews"><a href="#"
                                                       data-action="dislike"><span><?=$arItem['PROPERTIES']['DISLIKES']['VALUE']?></span></a>
                            </div>
                        </div>
                    </div>
                    <? if($arItem['CZ_PROPS']['PROS']['FIRST_PART']): ?>
                        <div class="advantages"><span>Достоинства: </span><?=$arItem['CZ_PROPS']['PROS']['FIRST_PART']?><input
                                    type="hidden" value="<?=$arItem['CZ_PROPS']['PROS']['SECOND_PART']?>"></div>
                    <? endif ?>
                    <? if($arItem['CZ_PROPS']['CONS']['FIRST_PART']): ?>
                        <div class="disadvantages"><span>Недостатки:</span> <?=$arItem['CZ_PROPS']['CONS']['FIRST_PART']?><input
                                    type="hidden" value="<?=$arItem['CZ_PROPS']['CONS']['SECOND_PART']?>"></div>
                    <? endif ?>
                    <? if($arItem['CZ_PROPS']['COMMENT']['FIRST_PART']): ?>
                        <div class="commentary"><span>Комментарий:</span> <?=$arItem['CZ_PROPS']['COMMENT']['FIRST_PART']?>
                            <input type="hidden" value="<?=$arItem['CZ_PROPS']['COMMENT']['SECOND_PART']?>"></div>
                    <? endif ?>
                </div>

            <?$count++;?>
            <? if ($count == 5 || $key == ( count( $arResult['ITEMS'] ) - 1 ) ):?>
                <?$count = 0;?>
                </div>
            <? endif ?>
        <? endforeach; ?>
    </div>
    <? if ($blocks > 1): ?>
    <div class="more-item">
        <a href="javascript::void()" data-current="1" data-max="<?=$blocks?>" class="reviews-show-next">Показать еще</a>
    </div>
    <? endif ?>
</div>
<script>
    $('.reviews-show-next').on('click', function (){
        $(this).data('current', ($(this).data('current') + 1));
        if ($(this).data('current') >= $(this).data('max')){
            $(this).css('display', 'none');
        }
        $('.list-reviews [data-number="' + $(this).data('current') + '"]').css('display', 'block');
    })
</script>
<div class="right-block-reviews">
    <div class="add-reviews">
        <span>
            <a href="#" onclick="$('#btn_form_FORM_REVIEWS').click()">
                <span class="btn-trans">Оставить отзыв</span>
                <span class="btn-anim">Оставить отзыв</span>
            </a>
        </span>
    </div>
    <div class="sum-rate-reviewer">
        <div class="caption">Отзывы пользователей</div>
        <div class="list-rating">
            <? for($i = 5; $i >= 1; $i--): ?>
                <div class="item-ratin">
                    <div class="bg-rating rating<?=$i?>"></div>
                    <div class="progress-bar-rating  <? if($i == 5): ?>red-progress<? else: ?>black-progress<? endif; ?>">
                        <span style="width: <?=$arResult['RATING']['COUNT'][$i]['PERCENTAGE'] * 100?>%"></span></div>
                    <div class="count-ratin"><?=$arResult['RATING']['COUNT'][$i]['AMOUNT']?></div>
                </div>
            <? endfor ?>
        </div>
        <div class="total-reviews">
            Всего отзывов: <span><?=count($arResult["ITEMS"])?></span>
        </div>
    </div>
</div>
<script>
    $('.item-review').each(function (index){
        let img = $(this).find('img');
        let src = img.attr('src');
        // img.css('width', '100px');
        $('<br>').insertBefore(img);
        // img.wrap('<a href="' + src + '" class="fancy_rev_' + index + '"></a>');
        // $('.fancy_rev_' +  index).fancybox();
    })
</script>

