<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization;
use \Bitrix\Main\Page\Asset; 

Localization\Loc::loadMessages(__FILE__);

GLOBAL $APPLICATION;
GLOBAL $cityInfo;
$curPage = $APPLICATION->GetCurPage(true);
$curDir = $APPLICATION->GetCurDir(true);

?>
<!doctype html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?
    $APPLICATION->ShowHead();
    \CJSCore::Init(['bx', 'jquery3']);
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/bfs/css/czebra.valideted.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/bfs/css/czebra.valideted.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/bootstrap.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/jquery.fancybox.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/jquery.formstyler.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/jquery.mCustomScrollbar.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/jquery-ui.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/slick.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/slinky.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/datepicker.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/style.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/cz_style.css");

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery-3.4.1.min.js");

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/bfs/js/czebra.valideted.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/bfs/js/jquery.maskedinput.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/shop.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/bootstrap.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.bootstrap-touchspin.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/slick.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.fancybox.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.formstyler.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.mCustomScrollbar.concat.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/slinky.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery-ui.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/datepicker.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/init.js");

    ?>
    <title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<div class="page">
    <header class="header">
        <div class="static-header">
            <div class="container">
                <div class="left-header">
                    <div class="left-header-mob">
                        <div class="icon-mob-menu">
                            <a href="#"></a>
                        </div>
                        <div class="user-mob">
                            <a href="#"></a>
                        </div>
                        <div class="phone-mob-header">
                            <a href="#"></a>
                        </div>
                    </div>
                    <div class="top-header">
                        <div class="pin"><a href="#"><?=$cityInfo['NAME']?></a></div>
                        <div class="store-address">Ваш магазин: <a href="#">«Щукинская»</a></div>
                        <div class="phone-header">
                            <a href="+74951512920">+7 (495) 151-29-20</a>
                        </div>
                    </div>
                    <div class="bottom-header">
                        <div class="menu">
                        <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"main", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "dop",
		"DELAY" => "N",
		"MAX_LEVEL" => "3",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "359999",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "main"
	),
	false
);?>
                        </div>
                    </div>
                </div>
                <div class="logo">
                    <a href="/">
                        <span class="img-logo hidden-mobil"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/logo.png" alt=""><span>Официальный интернет-магазин</span></span>
                        <span class="hidden-dt"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/logo-mob.png" alt=""></span>
                    </a>
                </div>
                <div class="right-header">
                    <div class="right-header-mob">
                        <div class="search-mobil">
                            <a href="#"></a>
                        </div>
                        <div class="cart-mobil">
                            <a href="/personal_section/cart/order_start/"></a>
                        </div>
                    </div>
                    <div class="top-header">
                        <div class="phone-service">
                            <a href="tel:+88005554293">8 (800) 555-42-93</a>
                        </div>
                        <div class="lk">
                            <a href="/login/">Личный кабинет</a>
                        </div>
                    </div>
                    <div class="bottom-header">
                        <div class="support"><a href="#">Сервис и поддержка</a></div>
                        <div class="search"><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/search.svg" alt=""></a></div>
                        <div class="compare">
                            <a href="/catalog/compare/"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/compare.svg" alt=""></a>
                        </div>
                        <div class="favorites">
                            <a href="/favorites/"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/star.svg" alt=""></a>
                        </div>
                        <div class="cart">
                            <a href="/personal_section/cart/order_start/"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/cart.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-header">
            <div class="container">
                <div class="left-header">
                    <div class="bottom-header">
                        <div class="menu">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "main",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "dop",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "3",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "MENU_CACHE_TIME" => "359999",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "top",
                                    "USE_EXT" => "Y",
                                    "COMPONENT_TEMPLATE" => "_bfs"
                                ),
                                false
                            );?>
                        </div>
                    </div>
                </div>
                <div class="logo">
                    <a href="/">
                        <span class="img-logo hidden-mobil"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/logo.png" alt=""><span>Официальный интернет-магазин</span></span>
                        <span class="hidden-dt"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/logo-mob.png" alt=""></span>
                    </a>
                </div>
                <div class="right-header">
                    <div class="bottom-header">
                        <div class="phone-service">
                            <a href="tel:+88005554293">8 (800) 555-42-93</a>
                        </div>
                        <div class="lk">
                            <a href="#"></a>
                        </div>
                        <div class="search"><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/search.svg" alt=""></a></div>
                        <div class="compare">
                            <a href="/catalog/compare/  ">
                                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/compare.svg" alt="">
                            </a>
                        </div>
                        <div class="favorites">
                            <a href="/favorites/">
                                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/star.svg" alt="">
                                <div class="count-items"><span>3</span></div>
                            </a>
                        </div>
                        <div class="cart">
                            <a href="/personal_section/cart/order_start/">
                                <img src="<?=SITE_TEMPLATE_PATH?>/front/img/cart.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <?if ($curPage != SITE_DIR."index.php"):?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "main",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        );?>
        <?endif;?>
    <script>
        renewHeaderFavs();
        renewHeaderCompares();
        renewHeaderCart();
    </script>
