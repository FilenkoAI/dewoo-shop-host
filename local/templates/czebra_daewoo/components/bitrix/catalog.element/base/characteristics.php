<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<?
    $columnLength = ceil(count($arResult['CZ_CHARACTERISTICS']) / 2);
?>
<?$this->SetViewTarget('characteristics');?>
<div class="wrapp-characteristics">
    <div class="block-characteristics">
        <div class="title-characteristics">Характеристики</div>
        <div class="wrapp-table-characteristics">
            <?/*div class="table-characteristics">
                <?$count = 1?>
                <?foreach($arResult['CZ_CHARACTERISTICS'] as  $arItem):?>

                    <div class="item-characteristics">
                        <div class="name-characteristics"><?=$arItem['NAME']?></div>
                        <div class="value-characteristics"><?=$arItem['VALUE']?></div>
                    </div>
                <?if($count == $columnLength):?>
                    </div>
                    <div class="table-characteristics">
                <?endif?>
                    <?$count++;?>
                <?endforeach?>
            </div*/?>
            <?foreach($arResult['CZ_CHARACTERISTICS'] as  $arItem):?>
                <div class="item-characteristics">
                    <div class="name-characteristics"><?=$arItem['NAME']?></div>
                    <div class="value-characteristics"><?=$arItem['VALUE']?></div>
                </div>
            <?endforeach?>
        </div>
    </div>
    <?
    $arSelect = Array("ID", "PROPERTY_EQUIPMENT");
    $arFilter = Array("IBLOCK_ID" => 33, "ACTIVE"=>"Y", "PROPERTY_PRODUCT" => $arResult['ID']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $arResult['EQUIPMENT'][] = $arFields['PROPERTY_EQUIPMENT_VALUE'];
    }
    ?>
    <? if( count($arResult['EQUIPMENT']) > 0 ): ?>
    <div class="block-complectation">
        <div class="title-complectation">Комплектация</div>
        <div class="list-complectation">
            <ul>
                <? foreach($arResult['EQUIPMENT'] as $arEquip): ?>
                <li><?=$arEquip?></li>
                <? endforeach ?>
            </ul>
        </div>
    </div>
    <? endif ?>
</div>
<?$this->EndViewTarget();?>
<?$this->SetViewTarget('characteristics_mobile');?>
<div class="list-characteristic-mobil">
    <?foreach($arResult['CZ_CHARACTERISTICS'] as  $arItem):?>
        <div class="item-characteristic-mobil">
            <div class="name-characteristic"><?=$arItem['NAME']?></div>
            <div class="value-characteristic"><?=$arItem['VALUE']?></div>
        </div>
    <?endforeach;?>
</div>
<?$this->EndViewTarget();?>
