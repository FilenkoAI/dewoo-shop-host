<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Избранное");
?>
<?

global $USER;
//if (!$USER->IsAuthorized()) {
//	LocalRedirect("/login/?backurl=" . urlencode($APPLICATION->GetCurPageParam()));
//}

use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;

//$GLOBALS['APPLICATION']->RestartBuffer();
$application = Application::getInstance();
$context = $application->getContext();
global $APPLICATION, $USER;
if ($_REQUEST['id']) {
    if (!$USER->IsAuthorized()) {
        $arElements = unserialize($APPLICATION->get_cookie('favorites'));
        if (!in_array($_REQUEST['id'], $arElements)) {
            $arElements[] = $_REQUEST['id'];
            $result = 1; // Датчик. Добавляем
        } else {
            $key = array_search($_REQUEST['id'], $arElements); // Находим элемент, который нужно удалить из избранного
            unset($arElements[$key]);
            $result = 2; // Датчик. Удаляем
        }
        $cookie = new Cookie("favorites", serialize($arElements), time() + 60 * 60 * 24 * 60);
        $cookie->setDomain($context->getServer()->getHttpHost());
        $cookie->setHttpOnly(false);
        $context->getResponse()->addCookie($cookie);
        $context->getResponse()->flush("");
    } else {
        $idUser = $USER->GetID();
        $rsUser = CUser::GetByID($idUser);
        $arUser = $rsUser->Fetch();
        $arElements = $arUser['UF_FAVORITES']; // Достаём избранное пользователя
        if (!in_array($_REQUEST['id'], $arElements)) // Если еще нету этой позиции в избранном
        {
            $arElements[] = $_REQUEST['id'];
            $result = 1;
        } else {
            $key = array_search($_REQUEST['id'], $arElements); // Находим элемент, который нужно удалить из избранного
            unset($arElements[$key]);
            $result = 2;
        }
        $USER->Update($idUser, array("UF_FAVORITES" => $arElements)); // Добавляем элемент в избранное
    }
}

GLOBAL $USER;
if(!$USER->IsAuthorized()) // Для неавторизованного
{
    global $APPLICATION;
	$favorites = unserialize(\Bitrix\Main\Application::getInstance()->getContext()->getRequest()->getCookie("favorites"));
}
else {
     $idUser = $USER->GetID();
     $rsUser = CUser::GetByID($idUser);
     $arUser = $rsUser->Fetch();
     $favorites = $arUser['UF_FAVORITES'];
    
}

//$GLOBALS['arrFilter']=Array("ID" => $favorites);
GLOBAL $arrFilter;
if($favorites){
    $arrFilter = [
        "ID" => $favorites
    ];
} else {
    $arrFilter = [
        "ID" => false
    ];
}

?>
<?
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
if($request['section_type'] === 'block' ){
    $template = 'base_block';
} else {
    $template = 'base_list';
}
$sort = $request['sort'];
?>
<script>
    let sortSelect = document.querySelector('.sorting .select');
    let countToShowSelect = document.querySelector('.show-count-items .select');
    if(sortSelect){
        sortSelect.change = function () {
            let currentUrl = new URL(window.location);
            let sort = this.options[this.selectedIndex].value;
            currentUrl.searchParams.delete('sort');
            currentUrl.searchParams.append('sort', sort);
            window.location.href = currentUrl;
        }
    }
    if(countToShowSelect){
        countToShowSelect.change = function (){
            let currentUrl = new URL(window.location);
            let sort = this.options[this.selectedIndex].value;
            currentUrl.searchParams.delete('count_to_show');
            currentUrl.searchParams.append('count_to_show', sort);
            window.location.href = currentUrl;
        }
    }

</script>
<div class="wrapp-result-search lk-favorites">
    <div class="wrapp-catalog">
        <div class="wrapp-controls-catalog ">
            <div class="container">
                <div class="controls-catalog">
                    <div class="left-controls-catalog">
                        <div class="sorting">
                            <span>Сортировать по :</span>
                            <select class="select">
                                <option value="catalog_PRICE_1" <?=($sort === 'catalog_PRICE_1' ? 'selected' : '')?>>Цене</option>
                                <option value="NAME" <?=($sort === 'NAME' ? 'selected' : '')?>>Названию</option>
                                <option value="shows" <?=($sort === 'shows' ? 'selected' : '')?>>Популярности</option>
                            </select>
                        </div>
                    </div>
                    <div class="right-controls-catalog">
                        <div class="type-display">
                            <a href="?section_type=block" class="type-block-items <?=($request['section_type'] === 'block' ? 'selected' : '')?>"></a>
                            <a href="?section_type=list" class="type-list-items <?=($request['section_type'] === 'block' ? '' : 'selected')?>"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapp-block-catalog-items">
            <div class="container">
    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section",
        "$template",
        Array(
            "FILTER_NAME" => "arrFilter",
            "ADD_SECTIONS_CHAIN" => "N",
            'IBLOCK_TYPE' => '1c_catalog',
            'IBLOCK_ID' => "24",
            "PAGE_ELEMENT_COUNT" => "12",
            'PRICE_CODE' => array("Розничная цена (Для сайта)", "Старая розничная цена (Для сайта)"),
            "ACTION_VARIABLE" => "action",
            "ADD_PROPERTIES_TO_BASKET" => "Y",
            "ADD_TO_BASKET_ACTION" => "ADD",
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "BACKGROUND_IMAGE" => "-",
            "BASKET_URL" => "/personal/basket.php",
            "BROWSER_TITLE" => "-",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COMPATIBLE_MODE" => "Y",
            "CONVERT_CURRENCY" => "N",
            "CUSTOM_FILTER" => "",
            "DETAIL_URL" => '/catalog/item/#ELEMENT_CODE#/',
            "DISABLE_INIT_JS_IN_COMPONENT" => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_COMPARE" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "ELEMENT_SORT_FIELD" => "$sort",
            "ELEMENT_SORT_FIELD2" => "id",
            "ELEMENT_SORT_ORDER" => "asc",
            "ELEMENT_SORT_ORDER2" => "desc",
            "ENLARGE_PRODUCT" => "STRICT",
            "HIDE_NOT_AVAILABLE" => "N",
            "HIDE_NOT_AVAILABLE_OFFERS" => "N",
            "IBLOCK_TYPE" => "1c_catalog",
            "INCLUDE_SUBSECTIONS" => "Y",
            "LAZY_LOAD" => "N",
            "LINE_ELEMENT_COUNT" => "3",
            "LOAD_ON_SCROLL" => "N",
            "MESSAGE_404" => "",
            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
            "MESS_BTN_BUY" => "Купить",
            "MESS_BTN_DETAIL" => "Подробнее",
            "MESS_BTN_SUBSCRIBE" => "Подписаться",
            "MESS_NOT_AVAILABLE" => "Нет в наличии",
            "META_DESCRIPTION" => "-",
            "META_KEYWORDS" => "-",
            "OFFERS_FIELD_CODE" => array("",""),
            "OFFERS_LIMIT" => "5",
            "OFFERS_SORT_FIELD" => "sort",
            "OFFERS_SORT_FIELD2" => "id",
            "OFFERS_SORT_ORDER" => "asc",
            "OFFERS_SORT_ORDER2" => "desc",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Товары",
            "PARTIAL_PRODUCT_PROPERTIES" => "N",
            "PRICE_VAT_INCLUDE" => "Y",
            "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
            "PRODUCT_ID_VARIABLE" => "id",
            "PRODUCT_PROPS_VARIABLE" => "prop",
            "PRODUCT_QUANTITY_VARIABLE" => "quantity",
            "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
            "PRODUCT_SUBSCRIPTION" => "Y",
            "RCM_TYPE" => "personal",
            "SECTION_CODE" => "",
            "SECTION_CODE_PATH" => "",
            //"SECTION_ID" => "",
            "SECTION_ID_VARIABLE" => "SECTION_ID",
            "SECTION_URL" => "",
            "SECTION_USER_FIELDS" => array("",""),
            "SEF_MODE" => "N",
            "SEF_RULE" => "",
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SHOW_ALL_WO_SECTION" => "N",
            "SHOW_CLOSE_POPUP" => "N",
            "SHOW_DISCOUNT_PERCENT" => "N",
            "SHOW_FROM_SECTION" => "N",
            "SHOW_MAX_QUANTITY" => "N",
            "SHOW_OLD_PRICE" => "N",
            "SHOW_PRICE_COUNT" => "1",
            "SHOW_SLIDER" => "Y",
            "TEMPLATE_THEME" => "blue",
            "USE_ENHANCED_ECOMMERCE" => "N",
            "USE_MAIN_ELEMENT_SECTION" => "N",
            "USE_PRICE_COUNT" => "N",
            "USE_PRODUCT_QUANTITY" => "N"
        )
    );?>

            </div>
        </div>
    </div>
</div>
<?/*
<script>
	$(function(){
		$("#btnAddWishListBasket").click(function(){
			var ids = JSON.parse($(this).attr("data-ids-elem"));

			for (var i in ids) {
				$.ajax({
					url: "/local/ajax/basket/",
					async: false,
					data: {
						action: 'add',
						id: ids[i]
					},
					cache: false,
					success: function (data) {

					}
				});
			}

			window.location.href = "/personal_section/cart/";

			return false;
		});
	});
</script>
*/?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
