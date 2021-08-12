<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(false);?>

<div id="form_wrap_<?=$arParams["FORM_ID"]?>" class="modal-window modal fade"><div class="modal-dialog"><div class="modal-content">
    <div class="modal-body">
        <div class="title-modal">Тайтл формы</div>
        <div id="form_wrap_ch_<?=$arParams["FORM_ID"]?>">
            <?require realpath(dirname(__FILE__)) . '/form.php';?>
        </div>
    </div>
    <a href="" class="close-modal"></a>
</div></div></div>