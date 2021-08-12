<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Восстановление пароля");
global $USER;
if ($USER->IsAuthorized()){
    LocalRedirect('/personal_section/');
}
?>
<div class="title title-addresses-magazine">
    <div class="container">
        <h1><?=$APPLICATION->ShowTitle()?></h1>
    </div>
</div>
    <div class="wrapp-lk">
        <div class="container">
            <div class="block-lk">
                <div class="wrapp-personal-date">
                    <div class="info-user-lk">
                        <? $APPLICATION->IncludeComponent('czebra:czebra.forgot', 'main', [

                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>