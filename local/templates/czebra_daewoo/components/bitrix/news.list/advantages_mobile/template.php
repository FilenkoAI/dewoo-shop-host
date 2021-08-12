<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>

<? if($arResult["ITEMS"][0]['PROPERTIES']['IMG_1']['SRC'] && $arResult["ITEMS"][0]['PROPERTIES']['NAME_1']['VALUE']): ?>
<div class="slider-features-mobil-card-hidden">
    <? endif; ?>
    <? foreach($arResult["ITEMS"] as $arItem): ?>
        <? if($arItem['PROPERTIES']['IMG_1']['SRC'] && $arItem['PROPERTIES']['NAME_1']['VALUE']): ?>
            <div class="slide-mobil">
                <div class="features-item-mobil">
                    <a href="javascript:void(0)">
                        <div class="img-features-item-mobil"><img
                                    src="<?=$arItem['PROPERTIES']['IMG_1_PREVIEW']['SRC']?>"
                                    alt=""></div>
                        <div class="text-features-item-mobil">
                            <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_1']['VALUE']?></div>
                            <div class="descr-features-item-mobil">
                                <?=$arItem['PROPERTIES']['DESC_1']['VALUE']['TEXT']?>
                            </div>
                        </div>
                    </a>
                </div>
                <? if($arItem['PROPERTIES']['IMG_2']['SRC'] && $arItem['PROPERTIES']['NAME_2']['VALUE']): ?>
                    <div class="features-item-mobil">
                        <a href="javascript:void(0)">
                            <div class="img-features-item-mobil"><img
                                        src="<?=$arItem['PROPERTIES']['IMG_2_PREVIEW']['SRC']?>"
                                        alt=""></div>
                            <div class="text-features-item-mobil">
                                <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_2']['VALUE']?></div>
                                <div class="descr-features-item-mobil">
                                    <?=$arItem['PROPERTIES']['DESC_2']['VALUE']['TEXT']?>
                                </div>
                            </div>
                        </a>
                    </div>
                <? endif; ?>
            </div>
        <? endif; ?>

        <? if($arItem['PROPERTIES']['IMG_3']['SRC'] && $arItem['PROPERTIES']['NAME_3']['VALUE']): ?>
            <div class="slide-mobil">
                <div class="features-item-mobil">
                    <a href="javascript:void(0)">
                        <div class="img-features-item-mobil"><img
                                    src="<?=$arItem['PROPERTIES']['IMG_3_PREVIEW']['SRC']?>"
                                    alt=""></div>
                        <div class="text-features-item-mobil">
                            <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_3']['VALUE']?></div>
                            <div class="descr-features-item-mobil">
                                <?=$arItem['PROPERTIES']['DESC_3']['VALUE']['TEXT']?>
                            </div>
                        </div>
                    </a>
                </div>
                <? if($arItem['PROPERTIES']['IMG_4']['SRC'] && $arItem['PROPERTIES']['NAME_4']['VALUE']): ?>
                    <div class="features-item-mobil">
                        <a href="javascript:void(0)">
                            <div class="img-features-item-mobil"><img
                                        src="<?=$arItem['PROPERTIES']['IMG_4_PREVIEW']['SRC']?>"
                                        alt=""></div>
                            <div class="text-features-item-mobil">
                                <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_4']['VALUE']?></div>
                                <div class="descr-features-item-mobil">
                                    <?=$arItem['PROPERTIES']['DESC_4']['VALUE']['TEXT']?>
                                </div>
                            </div>
                        </a>
                    </div>
                <? endif; ?>
            </div>

        <? endif; ?>

        <? if($arItem['PROPERTIES']['IMG_5']['SRC'] && $arItem['PROPERTIES']['NAME_5']['VALUE']): ?>
            <? if($arItem['PROPERTIES']['IMG_5']['SRC'] && $arItem['PROPERTIES']['NAME_5']['VALUE']): ?>
                <div class="slide-mobil">
                    <div class="features-item-mobil">
                        <a href="javascript:void(0)">
                            <div class="img-features-item-mobil"><img
                                        src="<?=$arItem['PROPERTIES']['IMG_5_PREVIEW']['SRC']?>"
                                        alt=""></div>
                            <div class="text-features-item-mobil">
                                <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_5']['VALUE']?></div>
                                <div class="descr-features-item-mobil">
                                    <?=$arItem['PROPERTIES']['DESC_5']['VALUE']['TEXT']?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <? if($arItem['PROPERTIES']['IMG_6']['SRC'] && $arItem['PROPERTIES']['NAME_6']['VALUE']): ?>
                        <div class="features-item-mobil">
                            <a href="javascript:void(0)">
                                <div class="img-features-item-mobil"><img
                                            src="<?=$arItem['PROPERTIES']['IMG_6_PREVIEW']['SRC']?>"
                                            alt=""></div>
                                <div class="text-features-item-mobil">
                                    <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_6']['VALUE']?></div>
                                    <div class="descr-features-item-mobil">
                                        <?=$arItem['PROPERTIES']['DESC_6']['VALUE']['TEXT']?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <? endif; ?>
                </div>
            <? endif; ?>
        <? endif; ?>
    <? endforeach; ?>
    <? if($arResult["ITEMS"][0]['PROPERTIES']['IMG_1']['SRC'] && $arResult["ITEMS"][0]['PROPERTIES']['NAME_1']['VALUE']): ?>
</div>
<? endif ?>

<? if($arResult["ITEMS"][0]['PROPERTIES']['IMG_1']['SRC'] && $arResult["ITEMS"][0]['PROPERTIES']['NAME_1']['VALUE']): ?>
    <div class="top-dots-features-mobil"></div>
<div class="slider-features-mobil-card">
    <? endif; ?>
    <? foreach($arResult["ITEMS"] as $arItem): ?>
        <? if($arItem['PROPERTIES']['IMG_1']['SRC'] && $arItem['PROPERTIES']['NAME_1']['VALUE']): ?>
            <div class="slide-mobil">
                <div class="features-item-mobil">
                    <a href="javascript:void(0)">
                        <div class="img-features-item-mobil"><img
                                    src="<?=$arItem['PROPERTIES']['IMG_1_PREVIEW']['SRC']?>"
                                    alt=""></div>
                        <div class="text-features-item-mobil">
                            <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_1']['VALUE']?></div>
                            <div class="descr-features-item-mobil">
                                <?=$arItem['PROPERTIES']['DESC_1']['VALUE']['TEXT']?>
                            </div>
                        </div>
                    </a>
                </div>
                <? if($arItem['PROPERTIES']['IMG_2']['SRC'] && $arItem['PROPERTIES']['NAME_2']['VALUE']): ?>
                    <div class="features-item-mobil">
                        <a href="javascript:void(0)">
                            <div class="img-features-item-mobil"><img
                                        src="<?=$arItem['PROPERTIES']['IMG_2_PREVIEW']['SRC']?>"
                                        alt=""></div>
                            <div class="text-features-item-mobil">
                                <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_2']['VALUE']?></div>
                                <div class="descr-features-item-mobil">
                                    <?=$arItem['PROPERTIES']['DESC_2']['VALUE']['TEXT']?>
                                </div>
                            </div>
                        </a>
                    </div>
                <? endif; ?>
            </div>
        <? endif; ?>

        <? if($arItem['PROPERTIES']['IMG_3']['SRC'] && $arItem['PROPERTIES']['NAME_3']['VALUE']): ?>
            <div class="slide-mobil">
                <div class="features-item-mobil">
                    <a href="javascript:void(0)">
                        <div class="img-features-item-mobil"><img
                                    src="<?=$arItem['PROPERTIES']['IMG_3_PREVIEW']['SRC']?>"
                                    alt=""></div>
                        <div class="text-features-item-mobil">
                            <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_3']['VALUE']?></div>
                            <div class="descr-features-item-mobil">
                                <?=$arItem['PROPERTIES']['DESC_3']['VALUE']['TEXT']?>
                            </div>
                        </div>
                    </a>
                </div>
                <? if($arItem['PROPERTIES']['IMG_4']['SRC'] && $arItem['PROPERTIES']['NAME_4']['VALUE']): ?>
                    <div class="features-item-mobil">
                        <a href="javascript:void(0)">
                            <div class="img-features-item-mobil"><img
                                        src="<?=$arItem['PROPERTIES']['IMG_4_PREVIEW']['SRC']?>"
                                        alt=""></div>
                            <div class="text-features-item-mobil">
                                <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_4']['VALUE']?></div>
                                <div class="descr-features-item-mobil">
                                    <?=$arItem['PROPERTIES']['DESC_4']['VALUE']['TEXT']?>
                                </div>
                            </div>
                        </a>
                    </div>
                <? endif; ?>
            </div>

        <? endif; ?>

        <? if($arItem['PROPERTIES']['IMG_5']['SRC'] && $arItem['PROPERTIES']['NAME_5']['VALUE']): ?>
            <? if($arItem['PROPERTIES']['IMG_5']['SRC'] && $arItem['PROPERTIES']['NAME_5']['VALUE']): ?>
                <div class="slide-mobil">
                    <div class="features-item-mobil">
                        <a href="javascript:void(0)">
                            <div class="img-features-item-mobil"><img
                                        src="<?=$arItem['PROPERTIES']['IMG_5_PREVIEW']['SRC']?>"
                                        alt=""></div>
                            <div class="text-features-item-mobil">
                                <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_5']['VALUE']?></div>
                                <div class="descr-features-item-mobil">
                                    <?=$arItem['PROPERTIES']['DESC_5']['VALUE']['TEXT']?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <? if($arItem['PROPERTIES']['IMG_6']['SRC'] && $arItem['PROPERTIES']['NAME_6']['VALUE']): ?>
                        <div class="features-item-mobil">
                            <a href="javascript:void(0)">
                                <div class="img-features-item-mobil"><img
                                            src="<?=$arItem['PROPERTIES']['IMG_6_PREVIEW']['SRC']?>"
                                            alt=""></div>
                                <div class="text-features-item-mobil">
                                    <div class="name-features-item-mobil"><?=$arItem['PROPERTIES']['NAME_6']['VALUE']?></div>
                                    <div class="descr-features-item-mobil">
                                        <?=$arItem['PROPERTIES']['DESC_6']['VALUE']['TEXT']?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <? endif; ?>
                </div>
            <? endif; ?>
        <? endif; ?>
    <? endforeach; ?>
    <? if($arResult["ITEMS"][0]['PROPERTIES']['IMG_1']['SRC'] && $arResult["ITEMS"][0]['PROPERTIES']['NAME_1']['VALUE']): ?>
</div>
<? endif ?>





