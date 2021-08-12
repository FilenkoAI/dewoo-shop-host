<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
$isAjax = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$isAjax = (
    (isset($_POST['ajax_action']) && $_POST['ajax_action'] == 'Y')
    || (isset($_POST['compare_result_reload']) && $_POST['compare_result_reload'] == 'Y')
);
}
?>


<!--        <div class="menu-compare">-->
<!--            <ul>-->
<!--                <li class="selected"><a href="#">Газонокосилки <span>6</span></a></li>-->
<!--                <li><a href="#">Мотокосы <span>3</span></a></li>-->
<!--                <li><a href="#">Дрели <span>2</span></a></li>-->
<!--            </ul>-->
<!--        </div>-->
<div class="wrapp-list-compare" id="bx_catalog_compare_block">
    <?if($isAjax):?>
        <?$APPLICATION->RestartBuffer();?>
    <?endif;?>
    <div class="slider-compare-hidden">
        <div class="slide-compare">
            <div class="img-item-comare">
                <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/front/img/lk/compare1.png" alt=""></a>
            </div>
            <div class="add-to-favorites">
                <a href="#"></a>
            </div>
            <div class="delete-compare">
                <a href="#"></a>
            </div>
            <div class="name-item-compare-mobil">
                <a href="#">Газонокосилка бензиновая DLM 48SP</a>
            </div>
            <div class="btn-compare">
                <a href="#" class="btn-site1">
                    <span class="btn-trans">Купить</span>
                    <span class="btn-anim">Купить</span>
                </a>
            </div>
            <div class="list-characteristics">
                <div class="value-characteristics price-value" data-compare="line1">18 000 <span class="icon-rubl">₽</span></div>
                <div class="value-characteristics bonus-value" data-compare="line2">180</div>
                <div class="value-characteristics" data-compare="line3">4.5 л.с.</div>
                <div class="value-characteristics" data-compare="line4">DAEWOO</div>
                <div class="value-characteristics" data-compare="line5">V-series 145</div>
                <div class="value-characteristics" data-compare="line6">145 см³</div>
                <div class="value-characteristics" data-compare="line7">1 вперед</div>
                <div class="value-characteristics" data-compare="line8">480 мм</div>
                <div class="value-characteristics" data-compare="line9">25-75 мм</div>
                <div class="value-characteristics" data-compare="line10">46 см</div>
                <div class="value-characteristics" data-compare="line11">65 л</div>
                <div class="value-characteristics" data-compare="line12">центральная, 10 положений</div>
                <div class="value-characteristics" data-compare="line13">самоходная</div>
                <div class="value-characteristics" data-compare="line14">нет</div>
                <div class="value-characteristics" data-compare="line15">0,8 л</div>
                <div class="value-characteristics" data-compare="line16">сталь</div>
                <div class="value-characteristics" data-compare="line17">180/205 мм</div>
                <div class="value-characteristics" data-compare="line18">29.3 кг</div>
                <div class="value-characteristics" data-compare="line19">0,4 л</div>
            </div>
        </div>i
        <div class="slide-compare">
            <div class="img-item-comare">
                <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/front/img/lk/compare2.png" alt=""></a>
            </div>
            <div class="add-to-favorites">
                <a href="#" ></a>
            </div>
            <div class="delete-compare">
                <a href="#"></a>
            </div>
            <div class="name-item-compare-mobil">
                <a href="#">Газонокосилка бензиновая DLM 48SP</a>
            </div>
            <div class="btn-compare">
                <a href="#" class="btn-site1">
                    <span class="btn-trans">Купить</span>
                    <span class="btn-anim">Купить</span>
                </a>
            </div>
            <div class="list-characteristics">
                <div class="value-characteristics price-value" data-compare="line1">
                    18 000 <span class="icon-rubl">₽</span>
                    <div class="old-price">23 000 <span class="icon-rubl">₽</span></div>
                </div>
                <div class="value-characteristics bonus-value" data-compare="line2">180</div>
                <div class="value-characteristics" data-compare="line3">4.5 л.с.</div>
                <div class="value-characteristics" data-compare="line4">DAEWOO</div>
                <div class="value-characteristics" data-compare="line5">V-series 145</div>
                <div class="value-characteristics" data-compare="line6">145 см³</div>
                <div class="value-characteristics" data-compare="line7">1 вперед</div>
                <div class="value-characteristics" data-compare="line8">480 мм</div>
                <div class="value-characteristics" data-compare="line9">25-75 мм</div>
                <div class="value-characteristics" data-compare="line10">46 см</div>
                <div class="value-characteristics" data-compare="line11">65 л</div>
                <div class="value-characteristics" data-compare="line12">центральная, 10 положений</div>
                <div class="value-characteristics" data-compare="line13">самоходная</div>
                <div class="value-characteristics" data-compare="line14">нет</div>
                <div class="value-characteristics" data-compare="line15">0,8 л</div>
                <div class="value-characteristics" data-compare="line16">сталь</div>
                <div class="value-characteristics" data-compare="line17">180/205 мм</div>
                <div class="value-characteristics" data-compare="line18">29.3 кг</div>
                <div class="value-characteristics" data-compare="line19">0,5 л</div>
            </div>
        </div>
        <div class="slide-compare">
            <div class="img-item-comare">
                <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/front/img/lk/compare2.png" alt=""></a>
            </div>
            <div class="add-to-favorites">
                <a href="#" ></a>
            </div>
            <div class="delete-compare">
                <a href="#"></a>
            </div>
            <div class="name-item-compare-mobil">
                <a href="#">Газонокосилка бензиновая DLM 48SP</a>
            </div>
            <div class="btn-compare">
                <a href="#" class="btn-site1">
                    <span class="btn-trans">Купить</span>
                    <span class="btn-anim">Купить</span>
                </a>
            </div>
            <div class="list-characteristics">
                <div class="value-characteristics price-value" data-compare="line1">18 000 <span class="icon-rubl">₽</span></div>
                <div class="value-characteristics bonus-value" data-compare="line2">180</div>
                <div class="value-characteristics" data-compare="line3">4.5 л.с.</div>
                <div class="value-characteristics" data-compare="line4">DAEWOO</div>
                <div class="value-characteristics" data-compare="line5">V-series 145</div>
                <div class="value-characteristics" data-compare="line6">145 см³</div>
                <div class="value-characteristics" data-compare="line7">1 вперед</div>
                <div class="value-characteristics" data-compare="line8">480 мм</div>
                <div class="value-characteristics" data-compare="line9">25-75 мм</div>
                <div class="value-characteristics" data-compare="line10">46 см</div>
                <div class="value-characteristics" data-compare="line11">65 л</div>
                <div class="value-characteristics" data-compare="line12">центральная, 10 положений</div>
                <div class="value-characteristics" data-compare="line13">самоходная</div>
                <div class="value-characteristics" data-compare="line14">нет</div>
                <div class="value-characteristics" data-compare="line15">0,8 л</div>
                <div class="value-characteristics" data-compare="line16">сталь</div>
                <div class="value-characteristics" data-compare="line17">180/205 мм</div>
                <div class="value-characteristics" data-compare="line18">29.3 кг</div>
                <div class="value-characteristics" data-compare="line19">0,5 л</div>
            </div>
        </div>
        <div class="slide-compare">
            <div class="img-item-comare">
                <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/front/img/lk/compare2.png" alt=""></a>
            </div>
            <div class="add-to-favorites">
                <a href="#" ></a>
            </div>
            <div class="delete-compare">
                <a href="#"></a>
            </div>
            <div class="name-item-compare-mobil">
                <a href="#">Газонокосилка бензиновая DLM 48SP</a>
            </div>
            <div class="btn-compare">
                <a href="#" class="btn-site1">
                    <span class="btn-trans">Купить</span>
                    <span class="btn-anim">Купить</span>
                </a>
            </div>
            <div class="list-characteristics">
                <div class="value-characteristics price-value" data-compare="line1">18 000 <span class="icon-rubl">₽</span></div>
                <div class="value-characteristics bonus-value" data-compare="line2">180</div>
                <div class="value-characteristics" data-compare="line3">4.5 л.с.</div>
                <div class="value-characteristics" data-compare="line4">DAEWOO</div>
                <div class="value-characteristics" data-compare="line5">V-series 145</div>
                <div class="value-characteristics" data-compare="line6">145 см³</div>
                <div class="value-characteristics" data-compare="line7">1 вперед</div>
                <div class="value-characteristics" data-compare="line8">480 мм</div>
                <div class="value-characteristics" data-compare="line9">25-75 мм</div>
                <div class="value-characteristics" data-compare="line10">46 см</div>
                <div class="value-characteristics" data-compare="line11">65 л</div>
                <div class="value-characteristics" data-compare="line12">центральная, 10 положений</div>
                <div class="value-characteristics" data-compare="line13">самоходная</div>
                <div class="value-characteristics" data-compare="line14">нет</div>
                <div class="value-characteristics" data-compare="line15">0,8 л</div>
                <div class="value-characteristics" data-compare="line16">сталь</div>
                <div class="value-characteristics" data-compare="line17">180/205 мм</div>
                <div class="value-characteristics" data-compare="line18">29.3 кг</div>
                <div class="value-characteristics" data-compare="line19">0,5 л</div>
            </div>
        </div>
        <div class="slide-compare">
            <div class="img-item-comare">
                <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/front/img/lk/compare2.png" alt=""></a>
            </div>
            <div class="add-to-favorites">
                <a href="#" ></a>
            </div>
            <div class="delete-compare">
                <a href="#"></a>
            </div>
            <div class="name-item-compare-mobil">
                <a href="#">Газонокосилка бензиновая DLM 48SP</a>
            </div>
            <div class="btn-compare">
                <a href="#" class="btn-site1">
                    <span class="btn-trans">Купить</span>
                    <span class="btn-anim">Купить</span>
                </a>
            </div>
            <div class="list-characteristics">
                <div class="value-characteristics price-value" data-compare="line1">18 000 <span class="icon-rubl">₽</span></div>
                <div class="value-characteristics bonus-value" data-compare="line2">180</div>
                <div class="value-characteristics" data-compare="line3">4.5 л.с.</div>
                <div class="value-characteristics" data-compare="line4">DAEWOO</div>
                <div class="value-characteristics" data-compare="line5">V-series 145</div>
                <div class="value-characteristics" data-compare="line6">145 см³</div>
                <div class="value-characteristics" data-compare="line7">1 вперед</div>
                <div class="value-characteristics" data-compare="line8">480 мм</div>
                <div class="value-characteristics" data-compare="line9">25-75 мм</div>
                <div class="value-characteristics" data-compare="line10">46 см</div>
                <div class="value-characteristics" data-compare="line11">65 л</div>
                <div class="value-characteristics" data-compare="line12">центральная, 10 положений</div>
                <div class="value-characteristics" data-compare="line13">самоходная</div>
                <div class="value-characteristics" data-compare="line14">нет</div>
                <div class="value-characteristics" data-compare="line15">0,8 л</div>
                <div class="value-characteristics" data-compare="line16">сталь</div>
                <div class="value-characteristics" data-compare="line17">180/205 мм</div>
                <div class="value-characteristics" data-compare="line18">29.3 кг</div>
                <div class="value-characteristics" data-compare="line19">0,5 л</div>
            </div>
        </div>
    </div>
    <div class="top-dots-compare">

    </div>

    <div class="block-characteristics-compare">
        <div class="filter-characteristics-compare">
            <div class="wrapp-checkbox">
                <?/*<input type="checkbox" id="check1">
                <label for="check1">Показать отличные параметры</label>*/?>
                <a href="<?=$arResult["DIFFERENT"] ? $arResult['COMPARE_URL_TEMPLATE'].'DIFFERENT=N' : $arResult['COMPARE_URL_TEMPLATE'].'DIFFERENT=Y';?>"
                   <?if($arResult["DIFFERENT"]):?>class="checked"<?endif;?>
                   rel="nofollow">Показать отличные параметры</a>
            </div>
            <div class="wrapp-checkbox">
                <?/*<input type="checkbox" id="check2">
                <label for="check2">Показать все параметры</label>*/?>
                <a href="<?=$arResult['COMPARE_URL_TEMPLATE'].'DIFFERENT=N';?>"
                   <?if(!$arResult["DIFFERENT"]):?>class="checked"<?endif;?>
                   rel="nofollow">Показать все параметры</a>
            </div>
        </div>
        <div class="wrapp-name-characteristics">
            <div class="name-characteristics name-price" data-compare="line1">Цена</div>
            <div class="name-characteristics name-bonus" data-compare="line2">Начисляемые бонусы</div>
            <?$count = 3;?>
            <?foreach($arResult["SHOW_PROPERTIES"] as $code => $arProperty):?>
                <?
                $showRow = true;
                if ($arResult['DIFFERENT'])
                {
                    $arCompare = array();
                    foreach($arResult["ITEMS"] as $arElement)
                    {
                        $arPropertyValue = $arElement["DISPLAY_PROPERTIES"][$code]["VALUE"];
                        if (is_array($arPropertyValue))
                        {
                            sort($arPropertyValue);
                            $arPropertyValue = implode(" / ", $arPropertyValue);
                        }
                        $arCompare[] = $arPropertyValue;
                    }
                    unset($arElement);
                    $showRow = (count(array_unique($arCompare)) > 1);
                }
                ?>
                <?if($showRow):?>
                    <div class="name-characteristics" data-compare="line<?=$count?>"><?=$arProperty['NAME']?></div>
                    <?$count++;?>
                <?endif;?>
            <?endforeach;?>
        </div>
    </div>
    <div class="slider-compare">
        <?require(realpath(dirname(__FILE__)).'/slides.php')?>
    </div>
    <?
    if ($isAjax)
    {
        die();
    }
    ?>
</div>
<script type="text/javascript">
    var CatalogCompareObj = new BX.Iblock.Catalog.CompareClass("bx_catalog_compare_block", '<?=CUtil::JSEscape($arResult['~COMPARE_URL_TEMPLATE']); ?>');
    sliderCompare();
    alignStringsCompare();
</script>

