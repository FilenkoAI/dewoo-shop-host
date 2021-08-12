<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization;
use \Bitrix\Main\Page\Asset;

Localization\Loc::loadMessages(__FILE__);

global $APPLICATION;
global $cityInfo;

$curPage = $APPLICATION->GetCurPage(true);
$curDir = $APPLICATION->GetCurDir(true);
?>
<!doctype html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?
	$APPLICATION->ShowHead();
	\CJSCore::Init(['bx', 'jquery3']);

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/bfs/css/czebra.valideted.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/bfs/css/czebra.valideted.min.css");

	if ($USER->GetId() == '508'){
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/bootstrap.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/bootstrap-select.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/jquery.fancybox.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/jquery.formstyler.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/jquery.mCustomScrollbar.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/jquery-ui.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/slick.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/slinky.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/datepicker.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/bootstrap-select.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/chosen.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/vendor/star-rating.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/cz_style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/temp_style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css_new/temp_style2.css");
    } else {
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/bootstrap.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/bootstrap-select.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/jquery.fancybox.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/jquery.formstyler.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/jquery.mCustomScrollbar.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/jquery-ui.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/slick.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/slinky.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/datepicker.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/bootstrap-select.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/chosen.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/vendor/star-rating.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/cz_style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/temp_style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/front/css/temp_style2.css");
    }

	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery-3.4.1.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/bfs/js/czebra.valideted.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/bfs/js/jquery.maskedinput.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.mask.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.inputmask.bundle.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/shop.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/bootstrap.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.bootstrap-touchspin.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/bootstrap-select.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/slick.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.fancybox.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.formstyler.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery.mCustomScrollbar.concat.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/slinky.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/jquery-ui.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/datepicker.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/slinky.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/bootstrap-select.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/chosen.jquery.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/vendor/star-rating.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/init.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/front/js/init2.js");
	?>
	<? // Отключение советника Яндекс ?>

    <script data-skip-moving="true">
        (function (d) {
            console.log('advisor')
            var xhr = new XMLHttpRequest(),
                s = d.createElement("script"),
                f = d.head.firstChild;
            s.type = "text/javascript";
            s.async = true;
            s.setAttribute("id", "23d567b65b2cc8b855b1933cb2a3c227");
            f.parentNode.insertBefore(s, f);
            xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    d.getElementById("23d567b65b2cc8b855b1933cb2a3c227").innerHTML = this.responseText;
                }
            };
            xhr.open("GET", "https://sovetnik-off.ru/block/23d567b65b2cc8b855b1933cb2a3c227", false);
            xhr.send();
        })(document);
    </script>

	<? // /Отключение советника Яндекс ?>

	<? // Коллтрекинг?>
	<? if (explode('.', $_SERVER['HTTP_HOST'])[0] === 'www'): ?>
        <script type="text/javascript">
            var __cs = __cs || [];
            __cs.push(["setCsAccount", "btqxhELyzfg2s1u9rI5Mtg72Kmm4mmGy"]);
        </script>
        <script type="text/javascript" async src="https://app.uiscom.ru/static/cs.min.js"></script>
	<? endif; ?>
	<? // /Коллтрекинг?>

    <link rel="canonical"
          href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $APPLICATION->GetCurDir() ?>">
    <title><? $APPLICATION->ShowTitle() ?></title>
	<? $APPLICATION->ShowProperty("czebra_open_graph"); ?>
	<? //код верификации яндекса?>
	<? if ($cityInfo['YANDEX_VERIFICATION_CODE']): ?>
        <meta name="yandex-verification" content="<?= $cityInfo['YANDEX_VERIFICATION_CODE'] ?>"/>
	<? endif ?>
	<? // /код верификации яндекса?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-73068811-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-73068811-1');
    </script>
</head>
<body>
<? $APPLICATION->ShowPanel(); ?>
<div class="page">
    <header class="header">

        <?if ($USER->GetId() == '508'):?>
            <div class="new-search">
                <form action="">
                    <input type="text" placeholder="Умный поиск по каталогу">
                </form>
            </div>
        <?endif;?>
        <div class="static-header">
            <div class="container">
                <div class="left-header">
                    <div class="left-header-mob">
                        <div class="icon-mob-menu">
                            <span></span>
                        </div>
                        <div class="user-mob">
                            <a href="/personal_section/">
                                <span></span>
                            </a>
                        </div>
						<? if ($cityInfo['PHONE']): ?>
							<?
							$replace = [' ', '(', ')', '-'];
							$trimmedPhone = str_replace($replace, '', $cityInfo['PHONE']);
							?>
                            <div class="phone-mob-header">
                                <a href="tel: <?= $trimmedPhone ?>"><span></span></a>
                            </div>
						<? else: ?>
							<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH . "/include/header/phone_mobile_left.php",
								)
							); ?>
						<? endif ?>

                    </div>
                    <div class="top-header" style="">
                        <div class="pin"><a href="#"><?= $cityInfo['NAME'] ?></a></div>
						<? /* if($_SERVER['REMOTE_ADDR'] == '109.106.143.2'): ?>
                            <?
                            $selectedShop = Czebra\Project\SelectedShop::getShop();
                            ?>
                            <? if($cityInfo['NAME'] !== 'Другой город'): ?>
                                <div class="store-address change-select-shop-modal">Ваш магазин: <a
                                            href="javascript::void(0)"
                                            data-title="<?=$selectedShop['NAME']?>">«<?=$cityInfo['SHOP']['NAME_SHORT']?>
                                        »</a></div>
                            <? endif ?>
                        <? else: */ ?>
						<?
						$selectedShop = Czebra\Project\SelectedShop::getShop();
						?>
						<? if ($cityInfo['NAME'] !== 'Другой город'): ?>
                            <div class="store-address change-select-shop-modal"><a
                                        href="javascript::void(0)"
                                        data-title="<?= $selectedShop['NAME'] ?>">«<?= $selectedShop['NAME_SHORT'] ?>
                                    »</a></div>
						<? endif ?>
						<? // endif ?>
                        <div class="phone-header">
							<? if ($cityInfo['PHONE']): ?>
								<?
								$replace = [' ', '(', ')', '-'];
								$trimmedPhone = str_replace($replace, '', $cityInfo['PHONE']);
								?>
                                <a href="tel: <?= $trimmedPhone ?>"><?= $cityInfo['PHONE'] ?></a>
							<? else: ?>
								<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => SITE_TEMPLATE_PATH . "/include/header/phone_mobile.php",
									)
								); ?>
							<? endif ?>
                        </div>
                    </div>
                    <div class="bottom-header">
                        <div class="menu">
							<? $APPLICATION->IncludeComponent(
								"bitrix:menu",
								"main",
								array(
									"ALLOW_MULTI_SELECT" => "N",
									"CHILD_MENU_TYPE" => "dop",
									"DELAY" => "N",
									"MAX_LEVEL" => "3",
									"MENU_CACHE_GET_VARS" => array(),
									"MENU_CACHE_TIME" => "359999",
									"MENU_CACHE_TYPE" => "Y",
									"MENU_CACHE_USE_GROUPS" => "Y",
									"ROOT_MENU_TYPE" => "top",
									"USE_EXT" => "Y",
									"COMPONENT_TEMPLATE" => "main"
								),
								false
							); ?>
                        </div>
                    </div>
                </div>
                <div class="logo">
                    <span class="img-logo hidden-mobil"><a href="/"><img
                                    src="<?= SITE_TEMPLATE_PATH ?>/front/img/logo.svg" alt=""></a><span>Официальный интернет-магазин</span></span>
                    <span class="hidden-dt"><a href="/"><img src="<?= SITE_TEMPLATE_PATH ?>/front/img/logo-mob.svg"
                                                             alt=""></a></span>
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
                        <div class="phone-service1">
							<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH . "/include/header/phone_service.php",
								)
							); ?>
                        </div>
                        <div class="lk">
							<? if ($USER->IsAuthorized()): ?>
								<?
								$fullName = $USER->GetFullName();
								if (strlen($fullName) > 15) {
									$fullName = explode(' ', $fullName);
									if ((strlen($fullName[0]) + strlen($fullName[0])) <= 16) {
										$fullName = $fullName[0] . ' ' . $fullName[1];
									} else {
										$fullName = $fullName[0];
									}

								}
								?>

                                <!--noindex-->
                                <a href="/personal_section/" rel="nofollow"><?= $fullName ?></a>
                                <!--/noindex-->
							<? else: ?>
                                <!--noindex-->
                                <a href="/auth/" rel="nofollow">Авторизация</a>
                                <!--/noindex-->
							<? endif ?>
                        </div>
                    </div>
                    <div class="bottom-header">
                        <div class="support"><a href="/servise_centres/#">Сервис и поддержка</a></div>
                        <div class="search">
                            <a href="#">
								<? /*img src="<?=SITE_TEMPLATE_PATH?>/front/img/search.svg" alt=""*/ ?>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 33.1 32.9" style="enable-background:new 0 0 33.1 32.9;"
                                     xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #323232;
                                        }
                                    </style>
                                    <path class="st0" d="M32.7,32.7c0.4-0.4,0.4-1.1,0-1.5l-7.9-7.9c2.1-2.5,3.4-5.7,3.4-9.2c0-7.7-6.3-14-14-14s-14,6.3-14,14
                                    s6.3,14,14,14c3.5,0,6.7-1.3,9.2-3.4l7.9,7.9c0.2,0.2,0.5,0.3,0.7,0.3C32.3,33,32.5,32.9,32.7,32.7z M32.7,32.7L32.7,32.7L32.7,32.7
                                    L32.7,32.7L32.7,32.7z M2.3,14.1c0-6.6,5.4-11.9,11.9-11.9c6.6,0,11.9,5.4,11.9,11.9c0,6.6-5.3,11.9-11.9,11.9
                                    C7.6,26.1,2.3,20.7,2.3,14.1z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="compare">
                            <a href="/catalog/compare/">
								<? /*img src="<?=SITE_TEMPLATE_PATH?>/front/img/compare.svg" alt=""*/ ?>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 41.4 32.2" style="enable-background:new 0 0 41.4 32.2;"
                                     xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #323232;
                                        }
                                    </style>
                                    <path class="st0" d="M33.3,32.1c-2.6,0-5-1-6.8-2.8l-1.1-1.1c-0.3-0.3-0.4-0.7-0.2-1l6.7-15.8l-7.7-1.1l-0.1,0.2
                                    c-0.6,1.1-1.8,1.8-3.1,1.8c-1.7,0-3.1-1.2-3.5-2.8l-0.1-0.2L9.8,8.1l6.6,15.1c0.2,0.4,0.1,0.8-0.2,1.1l-1.1,1
                                    c-1.8,1.8-4.2,2.8-6.8,2.8s-5-1-6.8-2.8l-1.1-1.1c-0.3-0.3-0.4-0.7-0.2-1L7.4,6.6C7.5,6.2,7.9,6,8.3,6h0.1l9.3,1.3l0.1-0.2
                                    c0.4-0.9,1.2-1.5,2-1.8L20,5.2V1c0-0.5,0.4-0.9,0.9-0.9s0.9,0.4,0.9,0.9v4.3L22,5.4c1.2,0.4,2.1,1.5,2.4,2.8v0.3l8.8,1.3
                                    c0.3,0,0.6,0.3,0.8,0.6l7.2,17c0.2,0.4,0.1,0.8-0.2,1l-1.1,1.1C38.3,31.1,35.9,32.1,33.3,32.1z M29.3,29.1c1.2,0.7,2.6,1.1,4,1.1
                                    c1.4,0,2.8-0.4,4-1.1l1.1-0.6H28.3L29.3,29.1z M27.5,26.6h11.6L33.3,13L27.5,26.6z M4.3,25.2c1.2,0.7,2.6,1.1,4,1.1s2.8-0.4,4-1.1
                                    l1.1-0.6H3.2L4.3,25.2z M2.5,22.7h11.6L8.3,9.4L2.5,22.7z M21,7c-0.9,0-1.7,0.8-1.7,1.7s0.8,1.7,1.7,1.7c0.9,0,1.7-0.8,1.7-1.7
                                    S21.9,7,21,7z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="favorites">
                            <a href="/favorites/">
								<? /*img src="<?=SITE_TEMPLATE_PATH?>/front/img/star.svg" alt=""*/ ?>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 33.6 31.6" style="enable-background:new 0 0 33.6 31.6;"
                                     xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #323232;
                                        }
                                    </style>
                                    <path class="st0" d="M16.9,25.5L6.6,31.7L9.3,20l-9.1-7.9l12-1L16.9,0l4.7,11.1l12,1L24.5,20l2.7,11.7L16.9,25.5z M9.3,28l7.6-4.6
                                    l0.9,0.6l6.7,4l-2-8.7l0.8-0.7l5.9-5.1l-8.8-0.7l-3.5-8.2l-3.5,8.2l-1,0.1l-7.8,0.7l6.7,5.8L9.3,28z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="cart">
                            <a href="/personal_section/cart/order_start/">
								<? /*img src="<?=SITE_TEMPLATE_PATH?>/front/img/cart.svg" alt=""*/ ?>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 38 33.1" style="enable-background:new 0 0 38 33.1;"
                                     xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #323232;
                                        }
                                    </style>
                                    <g>
                                        <path class="st0" d="M12.3,26.3c-1.7,0-3.2-1.4-3.2-3.1c0-1.3,0.7-2.4,1.9-2.9l0.2-0.1L7.1,1.9h-6C0.6,1.9,0.2,1.5,0.2,1
                                    s0.4-0.9,0.9-0.9h6.7c0.4,0,0.8,0.3,0.9,0.7l0.8,3.7h27.6c0.3,0,0.6,0.1,0.7,0.4C38,5,38,5.3,37.9,5.6l-4.4,15.6
                                    C33.4,21.6,33,22,32.6,22H12.3c-0.7,0-1.3,0.6-1.3,1.3c0,0.7,0.6,1.3,1.3,1.3h20.3c0.5,0,0.9,0.4,0.9,0.9s-0.4,0.9-0.9,0.9
                                    C32.6,26.4,12.3,26.4,12.3,26.3z M13,20h18.9l4-13.8h-26L13,20z"/>
                                        <path class="st0" d="M14.5,33c-1.7,0-3.1-1.4-3.1-3.1c0-1.7,1.4-3.1,3.1-3.1s3.1,1.4,3.1,3.1C17.6,31.7,16.2,33,14.5,33z
                                     M14.5,28.5c-0.8,0-1.4,0.6-1.4,1.4c0,0.8,0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4C15.9,29.2,15.3,28.5,14.5,28.5z"/>
                                        <path class="st0" d="M30.3,33c-1.7,0-3.1-1.4-3.1-3.1c0-1.7,1.4-3.1,3.1-3.1s3.1,1.4,3.1,3.1C33.5,31.7,32.1,33,30.3,33z
                                     M30.3,28.5c-0.8,0-1.4,0.6-1.4,1.4c0,0.8,0.6,1.4,1.4,1.4c0.8,0,1.4-0.6,1.4-1.4C31.7,29.2,31.1,28.5,30.3,28.5z"/>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapp-mobil-menu">
            <div class="select-сity-mobil"><a href="#" id="open_select_city"><?= $cityInfo['NAME'] ?></a></div>
			<? /*
            <div class="select-сity-mobil"><a href="#">Москва и область</a></div>
            */ ?>
            <div class="close-mobil-menu"><a href="#"></a></div>

            <div class="catalog-mobil-menu">
                <ul>
					<? $APPLICATION->IncludeComponent(
						"bitrix:menu",
						"mobile",
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "dop",
							"DELAY" => "N",
							"MAX_LEVEL" => "3",
							"MENU_CACHE_GET_VARS" => array(),
							"MENU_CACHE_TIME" => "359999",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "top",
							"USE_EXT" => "Y",
							"COMPONENT_TEMPLATE" => "_bfs"
						),
						false
					); ?>
					<? $APPLICATION->IncludeComponent(
						"bitrix:menu",
						"mobile_additional",
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "mobile_additional",
							"DELAY" => "N",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_GET_VARS" => array(),
							"MENU_CACHE_TIME" => "359999",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "mobile_additional",
							"USE_EXT" => "Y",
						),
						false
					); ?>

                </ul>
            </div>
            <div class="bottom-mobil-menu">
                <div class="link-favorites">
                    <a href="/favorites/"><img src="<?= SITE_TEMPLATE_PATH ?>/front/img/mobil/star.svg" alt=""></a>
                </div>
                <div class="link-entry">
                    <!--noindex-->
                    <a href="/personal_section/" rel="nofollow"><img
                                src="<?= SITE_TEMPLATE_PATH ?>/front/img/mobil/user.svg" alt=""></a>
                    <!--/noindex-->
                </div>
            </div>


        </div>
        <div class="fixed-header">
            <div class="container">
                <div class="left-header">
                    <div class="bottom-header">
                        <div class="menu">
							<? $APPLICATION->IncludeComponent(
								"bitrix:menu",
								"main",
								array(
									"ALLOW_MULTI_SELECT" => "N",
									"CHILD_MENU_TYPE" => "dop",
									"DELAY" => "N",
									"MAX_LEVEL" => "3",
									"MENU_CACHE_GET_VARS" => array(),
									"MENU_CACHE_TIME" => "359999",
									"MENU_CACHE_TYPE" => "A",
									"MENU_CACHE_USE_GROUPS" => "Y",
									"ROOT_MENU_TYPE" => "top",
									"USE_EXT" => "Y",
									"COMPONENT_TEMPLATE" => "_bfs"
								),
								false
							); ?>
                        </div>
                    </div>
                </div>
                <div class="logo">
                    <a href="/">
                        <span class="img-logo hidden-mobil"><img src="<?= SITE_TEMPLATE_PATH ?>/front/img/logo.svg"
                                                                 alt=""><span>Официальный интернет-магазин</span></span>
                        <span class="hidden-dt"><img src="<?= SITE_TEMPLATE_PATH ?>/front/img/logo-mob.svg"
                                                     alt=""></span>
                    </a>
                </div>
                <div class="right-header">
                    <div class="bottom-header">
                        <div class="phone-service">
							<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH . "/include/header/phone_service.php",
								)
							); ?>
                        </div>
                        <div class="lk">
                            <a href="/personal_section/"></a>
                        </div>
                        <div class="search"><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/front/img/search.svg"
                                                             alt=""></a>
                        </div>
                        <div class="compare">
                            <a href="/catalog/compare/  ">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/front/img/compare.svg" alt="">
                            </a>
                        </div>
                        <div class="favorites">
                            <a href="/favorites/">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/front/img/star.svg" alt="">
                                <div class="count-items"><span>3</span></div>
                            </a>
                        </div>
                        <div class="cart">
                            <a href="/personal_section/cart/order_start/">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/front/img/cart.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
		<? if ($curPage != SITE_DIR . "index.php"): ?>
			<? $APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"main",
				array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
				)
			); ?>
		<? endif; ?>
        <script>
            renewHeaderFavs();
            renewHeaderCompares();
            renewHeaderCart();
        </script>


