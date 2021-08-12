<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization;

Localization\Loc::loadMessages(__FILE__);

GLOBAL $APPLICATION;
GLOBAL $cityInfo;
$curPage = $APPLICATION->GetCurPage(true);

?>
<div class="quick-order-form modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<div class="search-site modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="title-search">Умный поиск по сайту</div>
<!--                --><?//$APPLICATION->IncludeComponent(
//                    "bitrix:search.form",
//                    "suggest",
//                    Array(
//                        "PAGE" => "#SITE_DIR#search/index.php",
//                        "USE_SUGGEST" => "Y"
//                    )
//                );?>
                <div class="wrapp-result-search">
                    <div class="form-search">
                            <form action="/search/" method="get">
                                <div>
                                    <input type="text" name="q" size="40"/>
                                    <input type="submit" value="" />
                                    <input type="hidden" name="sort" value="r"/>
                                </div>

                            </form>
                    </div>
                </div>

                <a href="#" class="close-modal"></a>
            </div>
        </div>
    </div>
</div>

<?if($_COOKIE['REGION_SHOP'] == ''):?>
<div class="select-city-modal modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="title-select-city">
                    <p>Ваш город</p>
                    <span><?=$cityInfo['NAME']?></span>
                </div>
                <div class="btn-select-city">
                    <span class="ok-city">
                        <a href="#">
                            <span class="btn-trans">Да, спасибо</span>
                            <span class="btn-anim">Да, спасибо</span>
                        </a>
                    </span>
                    <span class="change-city">
                        <a href="#">
                            <span class="btn-trans">Нет, изменить</span>
                            <span class="btn-anim">Нет, изменить</span>
                        </a>
                    </span>
                    <!-- <a href="#" class="close-modal"></a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?endif;?>

</main>
<footer class="footer">
    <div class="container">
        <div class="wrapp-footer">
            <div class="column-footer">
                <div class="menu-footer">
                    <div class="name-menu-footer">
                        <span class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/footer-icon1.svg" alt=""></span>
                        <span class="name-menu">О компании</span>
                    </div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "_bfs",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "dop",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "360000",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom_company",
                            "USE_EXT" => "N"
                        )
                    );?>
                </div>
                <div class="menu-footer">
                    <div class="name-menu-footer">
                        <span class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/footer-icon2.svg" alt=""></span>
                        <span class="name-menu">Покупателям</span>
                    </div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "_bfs",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "dop",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "360000",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom_to_customers",
                            "USE_EXT" => "N"
                        )
                    );?>
                </div>
            </div>
            <div class="column-footer">
                <div class="menu-footer">
                    <div class="name-menu-footer">
                        <span class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/footer-icon3.svg" alt=""></span>
                        <span class="name-menu">Поддержка</span>
                    </div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "_bfs",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "dop",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "360000",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom_support",
                            "USE_EXT" => "N"
                        )
                    );?>
                </div>
                <div class="menu-footer">
                    <div class="name-menu-footer">
                        <span class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/footer-icon4.svg" alt=""></span>
                        <span class="name-menu">Полезная информация</span>
                    </div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "_bfs",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "dop",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "360000",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom_useful_info",
                            "USE_EXT" => "N"
                        )
                    );?>
                </div>
            </div>
            <div class="column-footer">
                <div class="menu-footer">
                    <div class="name-menu-footer">
                        <span class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/footer-icon5.svg" alt=""></span>
                        <span class="name-menu">Правовая информация</span>
                    </div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "_bfs",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "dop",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "360000",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom_law",
                            "USE_EXT" => "N"
                        )
                    );?>
                </div>
                <div class="menu-footer">
                    <div class="name-menu-footer">
                        <span class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/footer-icon6.svg" alt=""></span>
                        <span class="name-menu">Контакты</span>
                    </div>
                    <div class="wrapp-contacts-footer">
                        <div class="phone-footer1">
                            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/include/footer/contacts-phone1.php",
                                )
                            );?>
                        </div>
                        <div class="phone-footer">
                            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/include/footer/contacts-phone2.php",
                                )
                            );?>
                        </div>
                        <div class="email-footer">
                            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/include/footer/contacts-email.php",
                                )
                            );?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-footer">
                <div class="menu-footer">
                    <div class="name-menu-footer">
                        <span class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/footer-icon7.svg" alt=""></span>
                        <span class="name-menu">Присоединяйтесь к нам в соц. сетях:</span>
                    </div>
                    <div class="social-footer">
                        <div><a href="https://www.instagram.com/daewoo_power_products/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/insta.png" alt=""> Instagram</a></div>
                        <div><a href="https://www.facebook.com/daewoopowerproductsrussia/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/facebook.svg" alt=""> Facebook</a></div>
                        <div><a href="https://vk.com/daewoopowerproducts" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/vk.svg" alt=""> Vkontakte</a></div>
                        <div><a href="https://www.youtube.com/channel/UCNoSo5_n22ZU91I-h_KW4Vg" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/youtube.svg" alt=""> YouTube</a></div>
                        <div><a href="https://ok.ru/group/52738602827857/"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/odnok.svg" alt=""> Odnoklassniki</a></div>
                    </div>
                    <div class="list-bank">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/AlfaBank.png" alt="" class="alfabank-img">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/Visa.png" alt="" class="visa-img">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/Mastercard-logo.png" alt="" class="mrcard-img">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/logo_mir.png" alt="" class="mir-img">
                        <?/*
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/verified-by-visa.png" alt="" class="vervisa-img">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/mastercard-securecode.png" alt="" class="mcsecur-img">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/MIRaccept.png" alt="" class="mirraccept-img">
                        */?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="text-bottom-footer">
                <p>© DAEWOO-SHOP.COM — фирменный интернет-магазин силовой и садовой техники, электроинструмента.</p>
                <span>Все права защищены.</span>
            </div>
            <div class="cz-logo">
                <noindex>
                <a href="https://www.czebra.ru/" target="_blank" rel="nofollow"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/logo-czebra.png" alt=""></a>
                </noindex>
            </div>
        </div>
    </div>

    <div class="wrapp-footer-mobil">
        <div class="social-footer-mobil">
            <div class="caption">Присоединяйтесь к нам в соц. сетях:</div>
            <div class="list-social">
                <a href="https://www.youtube.com/channel/UCNoSo5_n22ZU91I-h_KW4Vg" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/yt-footer.svg" alt=""></a>
                <a href="https://vk.com/daewoopowerproducts" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/vk-footer.svg" alt=""></a>
                <a href="https://www.instagram.com/daewoo_power_products/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/insta-footer.svg" alt=""></a>
                <a href="https://www.facebook.com/daewoopowerproductsrussia/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/fb-footer.svg" alt=""></a>
                <a href="https://ok.ru/group/52738602827857/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/odn.svg" alt=""></a>
            </div>

        </div>
        <div class="contact-info">
            <div class="caption">Контактная информация</div>
            <div class="city">
                <a href="/addresses/">
                    <span class="btn-trans"><?=$cityInfo['NAME']?></span>
                    <span class="btn-anim"><?=$cityInfo['NAME']?></span>
                </a>
            </div>
            <?if ($cityInfo['SHOP']['NAME']):?>
            <p class="address-info"><span><?=$cityInfo['SHOP']['ADDRESS']?></span></p>
            <?endif;?>
            
            <?/*if($cityInfo['PHONE']):?>
            <p class="phone-info"><span><?=$cityInfo['PHONE']?></span></p>
            <?endif*/;?>
            <p class='phone-info'><span><a href="tel:+74951512920">+7 (495) 151-29-20</a></span></p>
            <p class='phone-info'><span><a href='tel:+78005004293'>8 (800) 500-42-93</a></span></p>
            <div class="all-magazine">
                <a href="/addresses/">
                    <span class="btn-trans">Все магазины</span>
                    <span class="btn-anim">Все магазины</span>
                </a>
            </div>
            <div class="other-info">
                <div class="type-getting">
                    <a href="/delivery/">Способы получения</a>
                </div>
                <div class="service-support">
                    <a href="/servise_centres/">Сервисная поддержка</a>
                </div>
            </div>
        </div>
        <div class="type-payment">
            <div class="caption">Способы оплаты</div>
            <div class="footer-list-type-payment">
                <div class="item-footer-payment">
                    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/visa.svg" alt="" style="width: 36px;">
                </div>
                <div class="item-footer-payment">
                    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/mastercard.svg" alt="" style="width: 27px;">
                </div>
                <div class="item-footer-payment">
                    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/mir.svg" alt="" style="width: 41px;">
                </div>
                <div class="item-footer-payment">
                    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/kredit.svg" alt="" style="width: 31px;">
                </div>
                <div class="item-footer-payment">
                    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/cash.svg" alt="" style="width: 35px;">
                </div>
                <div class="item-footer-payment">
                    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/mobil/bank.svg" alt="" style="width: 30px;">
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-mobil">
        © DAEWOO-SHOP.COM — фирменный интернет-магазин силовой и садовой техники, электроинструмента.
        <br>
        Все права защищены.
    </div>

</footer>
</div>
<div id="loader" style="display: none">
    <img src="<?=SITE_TEMPLATE_PATH?>/front/img/loading.gif" alt="">
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(31362968, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/31362968" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?// Отключение советника Яндекс ?>
<script>
    _23d567b65b2cc8b855b1933cb2a3c227.s()
</script>
<?// /Отключение советника Яндекс ?>
</body>

</html>