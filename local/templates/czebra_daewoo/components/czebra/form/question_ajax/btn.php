<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);?>

<?
$arParams['TYPE'] = 'form';
$compessParam = \Czebra\Project\AjaxLoading::getCryptComponent($component->GetName(), $templateName, $arParams);
?>
<a href="#" class="btn-site1"  id='btn_form_<?=$arParams["FORM_ID"]?>' data-form='<?=$compessParam?>'>
    <span class="btn-trans">Задать вопрос</span>
    <span class="btn-anim">Задать вопрос</span>
</a>
<script>$(function(){bfsFormInit('<?=$arParams["FORM_ID"]?>');});</script>