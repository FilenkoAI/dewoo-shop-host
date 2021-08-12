<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональный раздел");
?>

<div class="title-lk">
    <div class="container">
        <h1>Личный кабинет</h1>
    </div>
</div>
<div class="wrapp-lk">
    <div class="container">
        <div class="block-lk">
            <?if($bonusInfo):?>
                <div class="wrapp-card-lk">
                    <div class="card-lk">
                        <img src="<?=SITE_TEMPLATE_PATH?>/front/img/lk/img-card.png" alt="1 бонус = 1 руб.">
                        <div class="logo-card-dw"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/lk/dw.png" alt=""></div>
                        <div class="count-bonus">
                            <p><?=$bonusInfo['Points'];?></p>
                            <span>Бонусов</span>
                        </div>
                        <div class="name-user-card">
                            <?/*
                        $arName = explode(' ', $bonusInfo['User']);
                        if(count($arName) > 2) {
                            $arName = [$arName[0], $arName[1]];
                        }
                        $name = implode(' ', $arName)
                        */?>
                            <?=$USER->GetFullName()?>
                        </div>
                    </div>
                    <div class="bonus-equivalent-mobil">
                        1 бонус = 1 <span class="rubl">i</span>
                    </div>
                    <p class="info-bonus-programm"><a href="/bonuses/">Подробные условия Бонусной программы</a></p>
                </div>
            <?endif;?>
            <?
            $arFilter = Array(
                "USER_ID" => $USER->GetID(),
                ">=DATE_INSERT" => date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), mktime(0, 0, 0, date("n"), 1, date("Y")))
            );

            $db_sales = CSaleOrder::GetList(array("DATE_INSERT" => "ASC"), $arFilter);
            $counter = 0;
            while ($ar_sales = $db_sales->Fetch())
            {
                $counter++;
            }
            ?>
            <div class="wrapp-menu-lk <?if(!$bonusInfo):?>whithout-bonus-block<?endif;?>">
                <div class="item-menu-lk menu-lk1">
                    <a href="/personal_section/profile/">
                        <div class="name-menu-lk">Личные данные</div>
                        <div class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/lk/icon-menu1.png" alt=""></div>
                    </a>
                </div>
                <div class="item-menu-lk menu-lk2">
                    <a href="/personal_section/order/history/">
                        <div class="name-menu-lk">История покупок</div>
                        <div class="descr-menu-lk">
                            <p class="color-text"><?=$counter?> покупок</p>
                            <p>за последний месяц</p>
                        </div>
                        <div class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/lk/icon-menu2.png" alt=""></div>
                    </a>
                </div>

                <div class="item-menu-lk menu-lk4">
                    <a href="/personal_section/views/">
                        <div class="name-menu-lk">История просмотров</div>
                        <div class="descr-menu-lk">
                            <?
                            $idUser = $USER->GetID();
                            $rsUser = CUser::GetByID($idUser);
                            $arUser = $rsUser->Fetch();
                            $userViews = unserialize($arUser['UF_VIEWS']);
                            $productCount = count($userViews);
                            ?>

                            <p class="color-text"><?=$productCount?> товаров</p>
                        </div>
                        <div class="img-menu"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/lk/icon-menu4.png" alt=""></div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
