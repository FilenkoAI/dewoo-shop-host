<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>

<? global $USER; ?>
<? //if($USER->GetId() == 1):?>
<!--<pre>-->
<!--    --><? //print_r($arResult)?>
<!--</pre>-->
<? //endif?>
<form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<? echo $arResult["FORM_ACTION"] ?>" method="get"
      id="filter_smart">
    <div class="top-block-filter-mobil">
        <span class="title-filter-mobil">Фильтры</span>
    </div>
    <a href="#" class="close-mobil-filter" onclick="$('.wrapp-catalog-filter').slideUp();"></a>
    <? foreach ($arResult["HIDDEN"] as $arItem): ?>
        <input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>" id="<? echo $arItem["CONTROL_ID"] ?>"
               value="<? echo $arItem["HTML_VALUE"] ?>"/>
    <? endforeach; ?>

    <div class="list-filter">
            <? foreach ($arResult['ITEMS'] as $key => $arItem)://prices

                $key = $arItem['ENCODED_ID'];
                if (isset($arItem['PRICE'])):
                    if ($arItem['VALUES']['MAX']['VALUE'] - $arItem['VALUES']['MIN']['VALUE'] <= 0)
                        continue;

                    if (floatval($arItem['VALUES']['MIN']['HTML_VALUE']) == 0) {
                        $arItem['VALUES']['MIN']['HTML_VALUE'] = $arItem['VALUES']['MIN']['VALUE'];
                    }
                    if (floatval($arItem['VALUES']['MAX']['HTML_VALUE']) == 0) {
                        $arItem['VALUES']['MAX']['HTML_VALUE'] = $arItem['VALUES']['MAX']['VALUE'];
                    }
                    ?>
                    <?
                        $name = randString(15);
                    ?>

                    <div class="wrapp-filter <?= $name ?>">
                        <div class='name-filter'>Цена</div>
                        <div class="block-value-filter">
                            <div class="wrapp-input-value">
                                <div class="block-min input-value">
                                    <span>от</span>
                                    <input type="text" class="min-price-filter min-value"
                                           data-value="<?= $arItem['VALUES']['MIN']['VALUE'] ?>"
                                           name="<?= $arItem['VALUES']['MIN']['CONTROL_NAME'] ?>"
                                           id="<?= $arItem['VALUES']['MIN']['CONTROL_ID'] ?>"
                                           value="<?= $arItem['VALUES']['MIN']['HTML_VALUE'] ?>" size="6"
                                           onkeyup="smartFilter.keyup(this)"/>
                                </div>

                                <div class="block-max input-value">
                                    <span>до</span>
                                    <input type="text" class="max-price-filter max-value"
                                           data-value="<?= $arItem['VALUES']['MAX']['VALUE'] ?>"
                                           name="<?= $arItem['VALUES']['MAX']['CONTROL_NAME'] ?>"
                                           id="<?= $arItem['VALUES']['MAX']['CONTROL_ID'] ?>"
                                           value="<?= $arItem['VALUES']['MAX']['HTML_VALUE'] ?>" size='5'
                                           onkeyup='smartFilter.keyup(this)'/>
                                </div>
                            </div>
                            <div class="range-value"></div>
                            <div class="values-range-form">
                                <div class="min-values-form"></div>
                                <div class="current-values-form"></div>
                                <div class="max-values-form"></div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(".<?=$name?> .range-value").slider({
                            animate: 'slow',
                            range: true,
                            min: <?=$arItem['VALUES']['MIN']['VALUE']?>,
                            max: <?=$arItem['VALUES']['MAX']['VALUE']?>,
                            values: [<?=$arItem['VALUES']['MIN']['HTML_VALUE']?>, <?=$arItem['VALUES']['MAX']['HTML_VALUE']?>],
                            slide: function (event, ui) {
                                $(".<?=$name?> .min-value").val(ui.values[0]);
                                $(".<?=$name?> .max-value").val(ui.values[1]);

                            }
                        });

                        $(".<?=$name?> .min-value").val($(".<?=$name?> .range-value").slider("values", 0));
                        $(".<?=$name?> .max-value").val($(".<?=$name?> .range-value").slider("values", 1));
                        $(".<?=$name?> .range-value").slider({
                            change: function (event, ui) {
                                smartFilter.keyup(document.querySelectorAll('.<?=$name?> .min-price-filter')[0]);
                                smartFilter.keyup(document.querySelectorAll('.<?=$name?> .max-price-filter')[0]);
                            }
                        });
                    </script>
                <? endif ?>
            <? endforeach; ?>

        <? //слайдеры?>
        <? foreach ($arResult["SLIDERS"] as $key => $arItem): ?>
            <?
            $lastElementIndex = count($arItem['VALUES']) - 1;
            $min = $arItem['VALUES'][0]['VALUE'];
            $minHtml = $arItem['VALUES'][0]['HTML_VALUE'];
            $max = $arItem['VALUES'][$lastElementIndex]['VALUE'];
            $maxHtml = $arItem['VALUES'][$lastElementIndex]['HTML_VALUE'];
            $name = $arItem["VALUES"][$lastElementIndex]["CONTROL_NAME"] . '_filter';
            ?>

            <div class="wrapp-filter <?= $name ?>">
                <div class="name-filter"><?= $arItem['NAME'] ?></div>
                <div class="block-value-filter">
                    <div class="wrapp-input-value">
                        <div class="block-min input-value">
                            <span>от</span>
                            <input type="text" class="min-price-filter min-value"
                                   data-value="<?= $min ?>"
                                   name="<?= $arItem["VALUES"][0]["CONTROL_NAME"] ?>"
                                   id="<?= $arItem["VALUES"][0]["CONTROL_ID"] ?>"
                                   value="<?= $minHtml ?>" size="6"
                                   onkeyup="smartFilter.keyup(this)"/>
                        </div>

                        <div class="block-max input-value">
                            <span>до</span>
                            <input type="text" class="max-price-filter max-value"
                                   data-value="<?= $max ?>"
                                   name="<?= $arItem["VALUES"][$lastElementIndex]["CONTROL_NAME"] ?>"
                                   id="<?= $arItem["VALUES"][$lastElementIndex]["CONTROL_ID"] ?>"
                                   value="<?= $maxHtml ?>" size="6"
                                   onkeyup="smartFilter.keyup(this)"/>
                        </div>
                    </div>
                    <div class="range-value"></div>
                    <div class="values-range-form">
                        <div class="min-values-form"></div>
                        <div class="current-values-form"></div>
                        <div class="max-values-form"></div>
                    </div>
                </div>
            </div>
            <script>
                $(".<?=$name?> .range-value").slider({
                    animate: "slow",
                    range: true,
                    min: <?=$min?>,
                    max: <?=$max?>,
                    values: [<?=$minHtml?>, <?=$maxHtml?>],
                    slide: function (event, ui) {
                        $(".<?=$name?> .min-value").val(ui.values[0]);
                        $(".<?=$name?> .max-value").val(ui.values[1]);

                    }
                });

                $(".<?=$name?> .min-value").val($(".<?=$name?> .range-value").slider("values", 0));
                $(".<?=$name?> .max-value").val($(".<?=$name?> .range-value").slider("values", 1));
                $(".<?=$name?> .range-value").slider({
                    change: function (event, ui) {
                        smartFilter.keyup(document.querySelectorAll('.<?=$name?> .min-price-filter')[0]);
                        smartFilter.keyup(document.querySelectorAll('.<?=$name?> .max-price-filter')[0]);
                    }
                });
            </script>
        <? endforeach ?>
        <? //--слайдеры?>
        <? foreach ($arResult["ITEMS"] as $key => $arItem)//sliders
        {

            if ($arItem['ID'] == 1) {
                continue;
            }//endif;
        }
        //not prices
        foreach ($arResult["ITEMS"] as $key => $arItem) {
            if (
                empty($arItem["VALUES"])
                || isset($arItem["PRICE"])
            )
                continue;

            //            if(
            //                $arItem["DISPLAY_TYPE"] == "A"
            //                && (
            //                    $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
            //                )
            //            )
            //                continue;

            $arCur = current($arItem["VALUES"]);
            switch ($arItem["DISPLAY_TYPE"]) {
            case "A"://NUMBERS_WITH_SLIDER
                ?>

                <?
                if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
                    continue;
                ?>

                <div class="wrapp-filter <?= $arItem['FILTER_NAME'] ?>">
                    <div class="name-filter"><?= $arItem['NAME'] ?></div>
                    <div class="block-value-filter">
                        <div class="wrapp-input-value">
                            <div class="block-min input-value">
                                <span>от</span>
                                <input type="text" class="min-price-filter min-value"
                                       name="<?= $arItem["VALUES"]['MIN']["CONTROL_NAME"] ?>"
                                       id="<?= $arItem["VALUES"]['MIN']["CONTROL_ID"] ?>"
                                       value="<?= $arItem['VALUES']['MIN']['HTML_VALUE'] ?>" size="6"
                                       placeholder="<?= round($arItem['VALUES']['MIN']['VALUE'], 1) ?>"
                                       onkeyup="smartFilter.keyup(this)"/>
                            </div>

                            <div class="block-max input-value">
                                <span>до</span>
                                <input type="text" class="max-price-filter max-value"
                                    <?/*data-value="<?=$arItem['VALUES']['MAX']['VALUE']?>" */
                                    ?>
                                       name="<?= $arItem["VALUES"]['MAX']["CONTROL_NAME"] ?>"
                                       id="<?= $arItem["VALUES"]['MAX']["CONTROL_ID"] ?>"
                                       value="<?= $arItem['VALUES']['MAX']['HTML_VALUE'] ?>" size="6"
                                       placeholder="<?= round($arItem['VALUES']['MAX']['VALUE'], 1) ?>"
                                       onkeyup="smartFilter.keyup(this)"/>
                            </div>
                        </div>
                        <div class="range-value"></div>
                        <div class="values-range-form">
                            <div class="min-values-form"></div>
                            <div class="current-values-form"></div>
                            <div class="max-values-form"></div>
                        </div>
                    </div>
                </div>
                <script>
                    $(".<?=$arItem['FILTER_NAME']?> .range-value").slider({
                        animate: "slow",
                        range: true,
                        min: <?=$arItem['VALUES']['MIN']['VALUE']?>,
                        max: <?=$arItem['VALUES']['MAX']['VALUE']?>,
                        values: [<?=intval($arItem['VALUES']['MIN']['HTML_VALUE']) ? $arItem['VALUES']['MIN']['HTML_VALUE'] : $arItem['VALUES']['MIN']['VALUE']?>, <?=intval($arItem['VALUES']['MAX']['HTML_VALUE']) ? $arItem['VALUES']['MAX']['HTML_VALUE'] : $arItem['VALUES']['MAX']['VALUE']?>],
                        slide: function (event, ui) {
                            $(".<?=$arItem['FILTER_NAME']?> .min-value").val(ui.values[0]);
                            $(".<?=$arItem['FILTER_NAME']?> .max-value").val(ui.values[1]);

                        }
                    });

                    $(".<?=$arItem['FILTER_NAME']?> .range-value").slider({
                        change: function (event, ui) {
                            smartFilter.keyup(document.querySelectorAll('.<?=$arItem['FILTER_NAME']?> .min-price-filter')[0]);
                            smartFilter.keyup(document.querySelectorAll('.<?=$arItem['FILTER_NAME']?> .max-price-filter')[0]);
                        }
                    });
                </script>

            <?
            break;
            case "B"://NUMBERS

                break;
            case "G"://CHECKBOXES_WITH_PICTURES

                break;
            case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS

                break;
            case "P"://DROPDOWN
            $checkedItemExist = false;
            ?>
                <div class="wrapp-filter">
                    <div class="name-filter name-dropdown-filter open"><?= $arItem["NAME"] ?></div>
                    <div class="block-value-filter dropdown-filter">
                        <?
                        foreach ($arItem["VALUES"] as $val => $ar):?>
                            <div class="wrapp-checkbox">
                                <input type="checkbox" class="filter-checkbox"
                                       value="<? echo $ar["HTML_VALUE"] ?>"
                                       name="<? echo $ar["CONTROL_NAME"] ?>"
                                       id="<? echo $ar["CONTROL_ID"] ?>" <? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                       onclick="smartFilter.click(this)"
                                />
                                <label for="<? echo $ar["CONTROL_ID"] ?>"><?= $ar["VALUE"] ?></label>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            <?
            break;
            case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS

                break;
            case "K"://RADIO_BUTTON
            ?>
                <div class="wrapp-filter">
                    <div class="name-filter"><?= $arItem["NAME"] ?></div>
                    <div class="block-value-filter">
                        <?
                        foreach ($arItem["VALUES"] as $val => $ar):?>

                            <div class="wrapp-radio">
                                <input type="radio" class="filter-checkbox"
                                       type="radio"
                                       value="<? echo $ar["HTML_VALUE_ALT"] ?>"
                                       name="<? echo $ar["CONTROL_NAME_ALT"] ?>"
                                       id="<? echo $ar["CONTROL_ID"] ?>"
                                    <? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                       onclick="smartFilter.click(this)"
                                />
                                <label for="<? echo $ar["CONTROL_ID"] ?>"><?= $ar["VALUE"] ?></label>
                            </div>
                        <? endforeach; ?>

                    </div>
                </div>
            <?
            break;
            case "U"://CALENDAR

                break;
            default://CHECKBOXES

            //if (count($arItem["VALUES"]) == 1) {
            ?>
                <div class="wrapp-filter">
                    <div class="name-filter"><?= $arItem["NAME"] ?></div>
                    <div class="block-value-filter">
                        <?
                        foreach ($arItem["VALUES"] as $val => $ar):?>
                            <div class="wrapp-checkbox">
                                <input type="checkbox" class="filter-checkbox"
                                       value="<? echo $ar["HTML_VALUE"] ?>"
                                       name="<? echo $ar["CONTROL_NAME"] ?>"
                                       id="<? echo $ar["CONTROL_ID"] ?>" <? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                       onclick="smartFilter.click(this)"
                                />
                                <label for="<? echo $ar["CONTROL_ID"] ?>"><?= $ar["VALUE"] ?></label>
                            </div>
                        <? endforeach; ?>

                    </div>
                </div>

            <?
                //}

            }

        }
        ?>
    </div>
    <div class="btn-catalog-filter">
       <span class="apply-filter">
            <button class="btn-site1" id="set_filter">
                <span class="btn-trans">Применить</span>
                <span class="btn-anim">Применить</span>
            </button>
       </span>
        <button class="clear-filter" id="del_filter">Очистить</button>
    </div>
    <div style="display:none">
        <div id="modef">
            <span id="modef_num"><?= intval($arResult["ELEMENT_COUNT"]) ?></span>
            <a href="<? echo $arResult["FILTER_URL"] ?>" target="">Показать</a>
        </div>
    </div>
</form>


<script type="text/javascript">
    var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>
