<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

$altGenerator = new \Czebra\Project\NonUniqueAlt($arResult['NAME'], 0, 1);
global $USER;
?>

<script src="https://yastatic.net/share2/share.js"></script>

<script>
    $.ajax({
        url: '/local/ajax/views.php',
        data: {product_id: <?=$arResult["ID"]?>},
    });
</script>

<input type="hidden" value="<?=round($arResult['PRODUCT']['WEIGHT']/1000)?>" id="product_weight">
<div class="title-card">
    <h1><?=$arResult['NAME']?>
        <?/*div class="wrap-card-share">
            <div class="ya-share2" data-curtain data-shape="round" data-limit="0" data-more-button-type="short" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
        </div*/?>
        <?/*<a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/title-icon-card.svg" alt=""></a>*/?>
        <?/*div class="icon-mobil-block">
            <a href="#" class="add-compare add-to-compare" onclick="addToCompare(event, <?=$arResult['ID']?>, '<?=$arResult["DETAIL_PAGE_URL"]?>')" data-id="<?=$arResult['ID']?>"></a>
            <a href="#" class="add-favorites add-to-favorites" onclick="addToFavs(event, <?=$arResult['ID']?>, '<?=$arResult["DETAIL_PAGE_URL"]?>')" data-id="<?=$arResult['ID']?>"></a*/?>
            <?/*<a href="#" class="share"></a>*/?>
            <?/*div class="mobile-wrap-card-share">
                <div class="ya-share2" data-curtain data-shape="round" data-limit="0" data-more-button-type="short" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
            </div>
        </div*/?>
    </h1>
    <div class="wrap-card-share">
        <div class="ya-share2" data-curtain data-shape="round" data-limit="0" data-more-button-type="short" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
    </div>
    <?/*<a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/title-icon-card.svg" alt=""></a>*/?>
    <div class="icon-mobil-block">
        <a href="#" class="add-compare add-to-compare" onclick="addToCompare(event, <?=$arResult['ID']?>, '<?=$arResult["DETAIL_PAGE_URL"]?>')" data-id="<?=$arResult['ID']?>"></a>
        <a href="#" class="add-favorites add-to-favorites" onclick="addToFavs(event, <?=$arResult['ID']?>, '<?=$arResult["DETAIL_PAGE_URL"]?>')" data-id="<?=$arResult['ID']?>"></a>
        <?/*<a href="#" class="share"></a>*/?>
        <div class="mobile-wrap-card-share">
            <div class="ya-share2" data-curtain data-shape="round" data-limit="0" data-more-button-type="short" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
        </div>
    </div>
</div>
<div class="block-card-info">
<?require(realpath(dirname(__FILE__)).'/left_card.php')?>
<?require(realpath(dirname(__FILE__)).'/right_card_mobil.php')?>
<?require(realpath(dirname(__FILE__)).'/right_card.php')?>
<?require(realpath(dirname(__FILE__)).'/characteristics.php')?>

<?//require(realpath(dirname(__FILE__)).'/accord_mobile.php')?>

<? str_replace("руб.", "<span class='rubl'>i</span>", $arItem["ITEM_PRICES"][$arItem["ITEM_PRICE_SELECTED"]]["PRINT_PRICE"]) ?>

