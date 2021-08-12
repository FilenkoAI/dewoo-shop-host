<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?
//$bxajaxid = $arParams["AJAX_ID"];
$bxajaxid = $component->__parent->arParams["AJAX_ID"];
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
?>
<?if (!$request->isAjaxRequest()):?>
    <div id="wrap_news_<?=$bxajaxid?>">
        <?require($_SERVER["DOCUMENT_ROOT"].$templateFolder."/ajax.php")?>
    </div>
<?else:?>
    <?require($_SERVER["DOCUMENT_ROOT"].$templateFolder."/ajax.php")?>
<?endif?>