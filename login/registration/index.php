<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
LocalRedirect("/auth/");
?>
<div class="title title-addresses-magazine">
    <div class="container">
        <h1><?=$APPLICATION->ShowTitle()?></h1>
    </div>
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"main2",
	Array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array("PERSONAL_PHONE"),
		"SET_TITLE" => "N",
		"SHOW_FIELDS" => array("NAME","LAST_NAME"),
		"SUCCESS_PAGE" => "/personal_section/",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>