<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$title = $arResult['CZ_TITLE'];
$description = $arResult['CZ_DESCRIPTION'];
$image = $arResult['SHARE_IMAGE'];
\Czebra\Project\Share::getOpenGraph($title, $description, $image);
$APPLICATION->SetPageProperty('title', $title);
$APPLICATION->SetPageProperty('description', $description);


$APPLICATION->SetPageProperty('not_show_breadcrumbs', 'Y');
