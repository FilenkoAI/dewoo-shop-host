<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
if ($arResult['TYPE'] == 'result') {
    require realpath(dirname(__FILE__)) . '/result.php';
} elseif ($arParams['TYPE'] == 'form') {
    require realpath(dirname(__FILE__)) . '/form_wrap.php';
} else {
    require realpath(dirname(__FILE__)) . '/btn.php';
}
?>
