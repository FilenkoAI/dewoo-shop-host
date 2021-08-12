<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Официальный интернет-магазин DAEWOO Shop");
$APPLICATION->SetTitle("Официальный интернет-магазин DAEWOO Shop");
global $USER;
if (!$USER->IsAdmin()) LocalRedirect('/');

?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>