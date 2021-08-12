<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
global $USER;
?>
<div class="block-accord">
    <div class="wrapp-reviews-mobil">
        <div class="left-block-reviews-mobil">
            <div class="list-rating-mob">
                <div class="item-rating-mob">
                    <div class="bg-rating rating5"></div>
                    <div class="progress-bar-rating  red-progress">
                        <span style="width: <?=$arResult['RATING']['COUNT']['5']['PERCENTAGE'] * 100?>%"></span>
                    </div>

                    <div class="count-ratin"><?=$arResult['RATING']['COUNT']['5']['AMOUNT']?></div>
                </div>
                <div class="item-rating-mob">
                    <div class="bg-rating rating4"></div>
                    <div class="progress-bar-rating  red-progress">
                        <span style="width: <?=$arResult['RATING']['COUNT']['4']['PERCENTAGE'] * 100?>%"></span>
                    </div>
                    <div class="count-ratin"><?=$arResult['RATING']['COUNT']['4']['AMOUNT']?></div>
                </div>
                <div class="item-rating-mob">
                    <div class="bg-rating rating3"></div>
                    <div class="progress-bar-rating  red-progress">
                        <span style="width: <?=$arResult['RATING']['COUNT']['3']['PERCENTAGE'] * 100?>%"></span>
                    </div>
                    <div class="count-ratin"><?=$arResult['RATING']['COUNT']['3']['AMOUNT']?></div>
                </div>
                <div class="item-rating-mob">
                    <div class="bg-rating rating2"></div>
                    <div class="progress-bar-rating  red-progress">
                        <span style="width: <?=$arResult['RATING']['COUNT']['2']['PERCENTAGE'] * 100?>%"></span>
                    </div>
                    <div class="count-ratin"><?=$arResult['RATING']['COUNT']['2']['AMOUNT']?></div>
                </div>
                <div class="item-rating-mob">
                    <div class="bg-rating rating1"></div>
                    <div class="progress-bar-rating  red-progress">
                        <span style="width: <?=$arResult['RATING']['COUNT']['1']['PERCENTAGE'] * 100?>%"></span>
                    </div>
                    <div class="count-ratin"><?=$arResult['RATING']['COUNT']['1']['AMOUNT']?></div>
                </div>
            </div>
        </div>
        <div class="right-block-reviews-mobil">
            <div class="rate-mob">Рейтинг:
                    <span style="overflow: hidden">
                        <div class="rate">
                        <input class="input-rating" name = "input-name" type = "number" style="display: none" value="<?=$arResult['RATING']['AVERAGE']?>" disabled="true">
                        </div>
                    </span>
            </div>
            <div class="count-reviews-mob">Отзывов: <a href="javascript:void(0)"><?=$arResult['RATING']['VOTES']?></a></div>
            <div class="add-reviews-mob">
                <a href="javascript:void(0)" class="btn-site1" onclick="$('#btn_form_FORM_REVIEWS').click()">
                    <span class="btn-trans">Оставить отзыв</span>
                    <span class="btn-anim">Оставить отзыв</span>
                </a>
            </div>
        </div>
        <div class="wrapp-slider-reviews-mobil">
            <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
                <div class="slide-reviews">
                <div class="item-review">
                    <div class="name-reviewer"><?=$arItem['PROPERTIES']['AUTHOR']['VALUE']?></div>
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
                            <div class="yes-reviews"><a href="#" data-action="like"><span><?=$arItem['PROPERTIES']['LIKES']['VALUE']?></span></a></div>
                            <div class="no-reviews"><a href="#" data-action="dislike"><span><?=$arItem['PROPERTIES']['DISLIKES']['VALUE']?></span></a></div>
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
            </div>

                <?/*
                <div class="item-review">
                    <div class="name-reviewer"><?=$arItem['PROPERTIES']['AUTHOR']['VALUE']?></div>
                    <?=$arItem['ACTIVE_FROM']?>
                    <div class="date-city"><?=$arItem['CZ_DATE']?></div>
                    <div class="rating">
                        <div class="bg-rating"><span><span class="bg-color"
                                                           style="width: <?=$arItem['PROPERTIES']['RATING']['VALUE'] / 5 * 100?>%"></span></span>
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
                */?>
            <? endforeach; ?>
        </div>
    </div>
</div>


