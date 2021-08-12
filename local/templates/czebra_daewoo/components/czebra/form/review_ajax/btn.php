<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);?>

<?
$arParams['TYPE'] = 'form';
$compessParam = \Czebra\Project\AjaxLoading::getCryptComponent($component->GetName(), $templateName, $arParams);
?>
<a href='' id='btn_form_<?=$arParams["FORM_ID"]?>' data-form='<?=$compessParam?>'>Текст кнопки</a>

<script>$(function(){bfsFormInit('<?=$arParams["FORM_ID"]?>');});</script>