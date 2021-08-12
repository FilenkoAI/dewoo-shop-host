<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";
\Bitrix\Main\Loader::includeModule('iblock');

$arSelect = Array("ID", "NAME", "PROPERTY_LINK", "PROPERTY_PHOTO");
$arFilter = Array("IBLOCK_ID"=>39, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "IBLOCK_SECTION_ID" => 317);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
$arResult = [];
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $arFields['PHOTO'] = CFile::GetPath($arFields['PROPERTY_PHOTO_VALUE']);
    $arResult[] = $arFields;
}

$commonLink = '';
$arSelect = Array("ID", "NAME", 'UF_DOP_MENU_LINK');
$arFilter = Array("IBLOCK_ID"=>39, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "IBLOCK_SECTION_ID" => 317);
$db_list = CIBlockSection::GetList(Array("left_margin" => "asc", 'sort' => 'asc'), $arFilter, true, $arSelect);
if($ob = $db_list->GetNext())
{
    $commonLink = $ob['UF_DOP_MENU_LINK'];
}
?>
<li class="menu-catalog-12-item special" >
    <div class="icon-special-section">
        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/menu/battery.png" alt="">
    </div>
    <div class="wrapp-special-menu">
        <a href="<?=$commonLink?>" class="link-menu-special-category">Аккумуляторная техника</a>
        <span class="battery-text">One battery - One world</span>
        <ul class="menu-special">
            <?foreach ($arResult as $element):?>
            <li>
                <a href="<?=$element['PROPERTY_LINK_VALUE']?>">
                    <span class="wrap-img-special-menu">
                        <img src="<?=$element['PHOTO']?>" alt="">
                    </span>
                    <span><?=$element['NAME']?></span>
                </a>
            </li>
            <?endforeach;?>
        </ul>
    </div>
</li>
