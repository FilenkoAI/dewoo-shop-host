<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<?if ($arParams['TOP'] == 'Y'): ?>
<div class="list-features-card">
<?foreach($arResult["ITEMS"] as $arItem):?>
    <?if($arItem['PROPERTIES']['IMG_O_1']['SRC'] && $arItem['PROPERTIES']['DESC_O_1']['VALUE']['TEXT']):?>
        <div class="item-features-card">
            <img src="<?=$arItem['PROPERTIES']['IMG_O_1']['SRC']?>" alt="">
            <span><?=$arItem['PROPERTIES']['DESC_O_1']['VALUE']['TEXT']?></span>
        </div>
    <?endif;?>
    <?if($arItem['PROPERTIES']['IMG_O_2']['SRC'] && $arItem['PROPERTIES']['DESC_O_2']['VALUE']['TEXT']):?>
        <div class="item-features-card">
            <img src="<?=$arItem['PROPERTIES']['IMG_O_2']['SRC']?>" alt="">
            <span><?=$arItem['PROPERTIES']['DESC_O_2']['VALUE']['TEXT']?></span>
        </div>
    <?endif;?>
    <?if($arItem['PROPERTIES']['IMG_O_3']['SRC'] && $arItem['PROPERTIES']['DESC_O_3']['VALUE']['TEXT']):?>
        <div class="item-features-card">
            <img src="<?=$arItem['PROPERTIES']['IMG_O_3']['SRC']?>" alt="">
            <span><?=$arItem['PROPERTIES']['DESC_O_3']['VALUE']['TEXT']?></span>
        </div>
    <?endif;?>
    <?if($arItem['PROPERTIES']['IMG_O_4']['SRC'] && $arItem['PROPERTIES']['DESC_O_4']['VALUE']['TEXT']):?>
        <div class="item-features-card">
            <img src="<?=$arItem['PROPERTIES']['IMG_O_4']['SRC']?>" alt="">
            <span><?=$arItem['PROPERTIES']['DESC_O_4']['VALUE']['TEXT']?></span>
        </div>
    <?endif;?>
<?endforeach;?>
</div>
<?else:?>
<?if ( $arResult["ITEMS"][0]['PROPERTIES']['IMG_1']['SRC'] && $arResult["ITEMS"][0]['PROPERTIES']['NAME_1']['VALUE'] ): ?>
<div class="features-item-card">
    <div class="title-features">Преимущества</div>
    <div class="slider-features-item-card">
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
    <?if($arItem['PROPERTIES']['IMG_1']['SRC'] && $arItem['PROPERTIES']['NAME_1']['VALUE']):?>
    <div class="wrapp-slide">
        <div class="slide">
            <div class="features-item">
                <a href="#hidden-content-fancy1" class="fancy-features-card" data-fancybox="group1">

                    <div class="top-features-item">
                        <div class="empty-left"></div>
                        <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_1']['VALUE']?></div>
                    </div>
                    <div class="bottom-features-item">
                        <div class="img-features-item">
                            <img src="<?=$arItem['PROPERTIES']['IMG_1_PREVIEW']['SRC']?>" alt="">
                        </div>
                        <div class="descr-features-item"><?=$arItem['PROPERTIES']['DESC_1_COMPRESSED']?></div>
                    </div>

                    <div id="hidden-content-fancy1" class="hidden-content-fancy"
                         style="display: none;">
                        <div class="img-features-item">
                            <img src="<?=$arItem['PROPERTIES']['IMG_1']['SRC']?>" alt="">
                        </div>
                        <div class="text-features-item">
                            <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_1']['VALUE']?></div>
                            <div class="descr-features-item">
                                <?=$arItem['PROPERTIES']['DESC_1']['VALUE']['TEXT']?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?if($arItem['PROPERTIES']['IMG_2']['SRC'] && $arItem['PROPERTIES']['NAME_2']['VALUE']):?>
            <div class="features-item">
                <a href="#hidden-content-fancy2" class="fancy-features-card" data-fancybox="group1">
                    <div class="top-features-item">
                        <div class="empty-left"></div>
                        <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_2']['VALUE']?></div>
                    </div>
                    <div class="bottom-features-item">
                        <div class="img-features-item">
                            <img src="<?=$arItem['PROPERTIES']['IMG_2_PREVIEW']['SRC']?>" alt="">
                        </div>
                        <div class="descr-features-item"><?=$arItem['PROPERTIES']['DESC_2_COMPRESSED']?></div>
                    </div>
                    <div id="hidden-content-fancy2" class="hidden-content-fancy"
                         style="display: none;">
                        <div class="img-features-item">
                            <img src="<?=$arItem['PROPERTIES']['IMG_2']['SRC']?>" alt="">
                        </div>
                        <div class="text-features-item">
                            <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_2']['VALUE']?></div>
                            <div class="descr-features-item">
                                <?=$arItem['PROPERTIES']['DESC_2']['VALUE']['TEXT']?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?endif;?>
        </div>
    </div>
    <?endif;?>


    <?if($arItem['PROPERTIES']['IMG_3']['SRC'] && $arItem['PROPERTIES']['NAME_3']['VALUE']):?>
        <div class="wrapp-slide">
            <div class="slide">
                <div class="features-item">
                    <a href="#hidden-content-fancy3" class="fancy-features-card" data-fancybox="group1">
                        <div class="top-features-item">
                            <div class="empty-left"></div>
                            <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_3']['VALUE']?></div>
                        </div>
                        <div class="bottom-features-item">
                            <div class="img-features-item">
                                <img src="<?=$arItem['PROPERTIES']['IMG_3_PREVIEW']['SRC']?>" alt="">
                            </div>
                            <div class="descr-features-item"><?=$arItem['PROPERTIES']['DESC_3_COMPRESSED']?></div>
                        </div>
                        <div id="hidden-content-fancy3" class="hidden-content-fancy"
                             style="display: none;">
                            <div class="img-features-item">
                                <img src="<?=$arItem['PROPERTIES']['IMG_3']['SRC']?>" alt="">
                            </div>
                            <div class="text-features-item">
                                <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_3']['VALUE']?></div>
                                <div class="descr-features-item">
                                    <?=$arItem['PROPERTIES']['DESC_3']['VALUE']['TEXT']?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?if($arItem['PROPERTIES']['IMG_4']['SRC'] && $arItem['PROPERTIES']['NAME_4']['VALUE']):?>
                    <div class="features-item">
                        <a href="#hidden-content-fancy4" class="fancy-features-card" data-fancybox="group1">
                            <div class="top-features-item">
                                <div class="empty-left"></div>
                                <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_4']['VALUE']?></div>
                            </div>
                            <div class="bottom-features-item">
                                <div class="img-features-item">
                                    <img src="<?=$arItem['PROPERTIES']['IMG_4_PREVIEW']['SRC']?>" alt="">
                                </div>
                                <div class="descr-features-item"><?=$arItem['PROPERTIES']['DESC_4_COMPRESSED']?></div>
                            </div>
                            <div id="hidden-content-fancy4" class="hidden-content-fancy"
                                 style="display: none;">
                                <div class="img-features-item">
                                    <img src="<?=$arItem['PROPERTIES']['IMG_4']['SRC']?>" alt="">
                                </div>
                                <div class="text-features-item">
                                    <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_4']['VALUE']?></div>
                                    <div class="descr-features-item">
                                        <?=$arItem['PROPERTIES']['DESC_4']['VALUE']['TEXT']?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?endif;?>
            </div>
        </div>
    <?endif;?>

    <?if($arItem['PROPERTIES']['IMG_5']['SRC'] && $arItem['PROPERTIES']['NAME_5']['VALUE']):?>
        <div class="wrapp-slide">
            <div class="slide">
                <div class="features-item">
                    <a href="#hidden-content-fancy5" class="fancy-features-card" data-fancybox="group1">
                        <div class="top-features-item">
                            <div class="empty-left"></div>
                            <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_5']['VALUE']?></div>
                        </div>
                        <div class="bottom-features-item">
                            <div class="img-features-item">
                                <img src="<?=$arItem['PROPERTIES']['IMG_5_PREVIEW']['SRC']?>" alt="">
                            </div>
                            <div class="descr-features-item"><?=$arItem['PROPERTIES']['DESC_5_COMPRESSED']?></div>
                        </div>
                        <div id="hidden-content-fancy5" class="hidden-content-fancy"
                             style="display: none;">
                            <div class="img-features-item">
                                <img src="<?=$arItem['PROPERTIES']['IMG_5']['SRC']?>" alt="">
                            </div>
                            <div class="text-features-item">
                                <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_5']['VALUE']?></div>
                                <div class="descr-features-item">
                                    <?=$arItem['PROPERTIES']['DESC_5']['VALUE']['TEXT']?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?if($arItem['PROPERTIES']['IMG_6']['SRC'] && $arItem['PROPERTIES']['NAME_6']['VALUE']):?>
                    <div class="features-item">
                        <a href="#hidden-content-fancy6" class="fancy-features-card" data-fancybox="group1">
                            <div class="top-features-item">
                                <div class="empty-left"></div>
                                <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_6']['VALUE']?></div>
                            </div>
                            <div class="bottom-features-item">
                                <div class="img-features-item">
                                    <img src="<?=$arItem['PROPERTIES']['IMG_6_PREVIEW']['SRC']?>" alt="">
                                </div>
                                <div class="descr-features-item"><?=$arItem['PROPERTIES']['DESC_6_COMPRESSED']?></div>
                            </div>
                            <div id="hidden-content-fancy6" class="hidden-content-fancy"
                                 style="display: none;">
                                <div class="img-features-item">
                                    <img src="<?=$arItem['PROPERTIES']['IMG_6']['SRC']?>" alt="">
                                </div>
                                <div class="text-features-item">
                                    <div class="name-features-item"><?=$arItem['PROPERTIES']['NAME_6']['VALUE']?></div>
                                    <div class="descr-features-item">
                                        <?=$arItem['PROPERTIES']['DESC_6']['VALUE']['TEXT']?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?endif;?>
            </div>
        </div>
    <?endif;?>
<?endforeach;?>
<?if ( $arResult["ITEMS"][0]['PROPERTIES']['IMG_1']['SRC'] && $arResult["ITEMS"][0]['PROPERTIES']['NAME_1']['VALUE'] ): ?>
    </div>
</div>
<?endif?>
<?endif;?>





