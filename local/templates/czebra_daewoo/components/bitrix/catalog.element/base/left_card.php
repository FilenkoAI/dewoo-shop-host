<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<!--<pre>-->
<!--    --><?//print_r($arResult['CZ_PROPS']['PRICES'])?>
<!--</pre>-->

<div class="left-card">
    <div class="wrapp-rate-reviews">

        <div class="rate">
            Рейтинг:
            <input class="input-rating" name = "input-name" type = "number" style="display: none" value="<?=$arResult['CZ_PROPS']['AVERAGE_RATING']/20?>" disabled="true">
        </div>
        <div class="reviews">
            Отзывов: <a href="javascript::void(0)" onclick="openReviews()"><?=$arResult['CZ_PROPS']['REVIEWS_COUNT']?></a>
        </div>
    </div>
    <div class="wrapp-slider-card">

        <?if($arResult['CZ_PROPS']['IS_NEW'] == 'Y'):?>
        <div class="sticker-card">
            <div class="sticker-novelty">
                <span>Новинка</span>
            </div>
        </div>
        <?endif;?>

        <div class="slider-card">
            <?foreach($arResult['CZ_PROPS']['PHOTO'] as $key => $arPhoto):?>
                <div class="slide">
                    <a href="<?=$arPhoto['SOURCE']?>" data-fancybox="gallery_photos">
                        <img src="<?=$arPhoto['FULL']?>" alt="<?=$altGenerator->getNextName()?>">
                    </a>
                </div>
            <?endforeach?>
        </div>
    </div>
    <div class="wrapp-mobil-video-photo">
        <? if (!empty($arResult['CZ_PROPS']['VIDEOS'])): ?>
        <a href="<?=$arResult['CZ_PROPS']['VIDEOS'][0]['LINK']?>" data-fancybox="gallery" class="mobil-video"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/yt-card.png" alt="<?=$altGenerator->getNextName()?>"> видео</a>
        <? endif ?>
        <a href="javascript:void(0)" class="mobil-photo" onclick='$("[data-fancybox=\"gallery_photos\"]").eq(0).trigger("click");'><img src="<?=SITE_TEMPLATE_PATH?>/front/img/photography.png" alt="<?=$altGenerator->getNextName()?>"> фото</a>
    </div>
    <div class="bottom-slider-card">
        <? if (!empty($arResult['CZ_PROPS']['VIDEOS'])): ?>
        <div class="wrapp-slider-video-card">
            <div class="title-video-card"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/yt-card.png" alt=""> Видео</div>
            <div class="slider-video-card-hidden">
                <div class="slide">
                    <a href="#">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/video-card1.png" alt="<?=$arResult['NAME']?>">
                        <span class="icon-youtube"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/yt-hover-card.png" alt=""></span>
                    </a>
                </div>
                <div class="slide">
                    <a href="#">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/video-card2.png" alt="<?=$arResult['NAME']?>">
                        <span class="icon-youtube"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/yt-hover-card.png" alt=""></span>
                    </a>
                </div>
                <div class="slide">
                    <a href="#">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/video-card3.png" alt="<?=$arResult['NAME']?>">
                        <span class="icon-youtube"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/yt-hover-card.png" alt=""></span>
                    </a>
                </div>
                <div class="slide">
                    <a href="#">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/video-card2.png" alt="<?=$arResult['NAME']?>">
                        <span class="icon-youtube"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/yt-hover-card.png" alt=""></span>
                    </a>
                </div>
                <div class="slide">
                    <a href="#">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/video-card3.png" alt="<?=$arResult['NAME']?>">
                        <span class="icon-youtube"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/yt-hover-card.png" alt=""></span>
                    </a>
                </div>
                <div class="slide">
                    <a href="#">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/video-card1.png" alt="<?=$arResult['NAME']?>">
                        <span class="icon-youtube"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/yt-hover-card.png" alt=""></span>
                    </a>
                </div>
            </div>
            <div class="top-video-dots"></div>
            <div class="slider-video-card">
                <?foreach($arResult['CZ_PROPS']['VIDEOS'] as $arVideo):?>
                <div class="slide">
                    <a href="<?=$arVideo['LINK']?>" data-fancybox="gallery">
                        <img src="<?=$arVideo['PREVIEW']?>" alt="<?=$altGenerator->getNextName()?>">
                        <span class="icon-youtube"><img src="<?=$arVideo['PREVIEW']?>" alt="<?=$altGenerator->getNextName()?>"></span>
                    </a>
                </div>
                <?endforeach;?>
            </div>
        </div>
        <? endif ?>
        <div class="wrapp-slider-nav">
            <div class="title-photo-card"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/photography.png" alt=""> Фото</div>
            <div class="top-dots"></div>
            <div class="slider-nav-card">
                <?foreach($arResult['CZ_PROPS']['PHOTO'] as $arPhoto):?>
                <div class="wrapp-slide">
                    <div class="slide">
                        <span><img src="<?=$arPhoto['MINI']?>" alt="<?=$altGenerator->getNextName()?>"></span>
                    </div>
                </div>
                <?endforeach?>
            </div>
        </div>
    </div>
</div>