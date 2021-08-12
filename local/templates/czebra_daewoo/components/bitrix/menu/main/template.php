<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
if (!empty($arResult)) :?>
    <ul>
    <?
    $previousLevel = 0;
    $secondLevelImage = [];
//    Bitrix\Main\Diag\Debug::writeToFile($arResult,"","menu_debug2.txt");
    foreach ($arResult as $key => $arItem) :?>
        <? if ($arItem['DEPTH_LEVEL'] == 1):?>
            <? $verticalLine = 0 ?>
            <? if ($previousLevel == 3):?>
                </ul>
                <? if ($secondLevelImage):?>
                    <div class="img-menu img-menu2">
                        <a href="<?= $secondLevelImage['LINK'] ?>">
                            <img src="<?= $secondLevelImage['IMAGE_NO_HOVER'] ?>" alt="" class='no-hover'>
                            <img src="<?= $secondLevelImage['IMAGE_HOVER'] ?>" alt="" class="hover-menu">
                        </a>
                    </div>
                    <? $secondLevelImage = []; ?>
                <? endif; ?>
                </li>
                </ul></li></li>
                <li>
                <a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a>
                <ul class="menu-catalog12" data-section="<?= $arItem['TEXT'] ?>">
            <? elseif ($previousLevel == 2):?>
                <? if ($secondLevelImage):?>
                    <div class="img-menu img-menu2">
                        <a href="<?= $secondLevelImage['LINK'] ?>">
                            <img src="<?= $secondLevelImage['IMAGE_NO_HOVER'] ?>" alt="" class='no-hover'>
                            <img src="<?= $secondLevelImage['IMAGE_HOVER'] ?>" alt="" class="hover-menu">
                        </a>
                    </div>
                    <? $secondLevelImage = []; ?>
                <? endif; ?>
                </li></ul></li></li>
                <li>
                <a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a>
                <ul class="menu-catalog12">
            <? elseif ($previousLevel == 1):?>
                <? /*быть такого не может но возможно и может*/
                ?>
            <? else:?>
                <li>
                <a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a>
                <ul class="menu-catalog12">
            <? endif; ?>
        <? elseif ($arItem['DEPTH_LEVEL'] == 2):?>
            <? if ($arItem['IS_PARENT'] == 1):?>
                <? if ($previousLevel == 3):?>
                    </ul>
                    <? if ($secondLevelImage):?>
                        <div class="img-menu img-menu2">
                            <a href="<?= $secondLevelImage['LINK'] ?>">
                                <img src="<?= $secondLevelImage['IMAGE_NO_HOVER'] ?>" alt="" class='no-hover'>
                                <img src="<?= $secondLevelImage['IMAGE_HOVER'] ?>" alt="" class="hover-menu">
                            </a>
                        </div>
                        <? $secondLevelImage = []; ?>
                    <? endif; ?>
                    </li>
                    <?
                    $lineClass = '';
                    if ($verticalLine <= 2) {
                        switch ($verticalLine) {
                            case 0:
                                $lineClass = 'vertical-line';
                                $verticalLine++;
                                break;
                            case 1 || 2:
                                $lineClass = 'vertical-line2';
                                $verticalLine++;
                                break;
                        }
                    }
                    ?>
                    <li class="menu-catalog-12-item line-bottom <?= $lineClass ?>" data-submenu-name="<?= $arItem['TEXT'] ?>">
                    <div class="angle angle1"></div>
                    <div class="angle angle2"></div>
                    <div class="angle angle3"></div>
                    <div class="angle angle4"></div>
                    <a href="<?= $arItem['LINK'] ?>" class="menu-catalog-12-link"><?= $arItem['TEXT'] ?></a>
                <? elseif ($previousLevel == 2):?>
                    </li>
                    <?
                    $lineClass = '';
                    if ($verticalLine <= 2) {
                        switch ($verticalLine) {
                            case 0:
                                $lineClass = 'vertical-line';
                                $verticalLine++;
                                break;
                            case 1 || 2:
                                $lineClass = 'vertical-line2';
                                $verticalLine++;
                                break;
                        }
                    }
                    ?>
                    <li class="menu-catalog-12-item line-bottom <?= $lineClass ?>" data-submenu-name="<?= $arItem['TEXT'] ?>">
                    <div class="angle angle1"></div>
                    <div class="angle angle2"></div>
                    <div class="angle angle3"></div>
                    <div class="angle angle4"></div>
                    <a href="<?= $arItem['LINK'] ?>" class="menu-catalog-12-link"><?= $arItem['TEXT'] ?></a>
                <? elseif ($previousLevel == 1):?>
                    <?
                    $lineClass = '';
                    if ($verticalLine <= 2) {
                        switch ($verticalLine) {
                            case 0:
                                $lineClass = 'vertical-line';
                                $verticalLine++;
                                break;
                            case 1 || 2:
                                $lineClass = 'vertical-line2';
                                $verticalLine++;
                                break;
                        }
                    }
                    ?>
                    <li class="menu-catalog-12-item line-bottom <?= $lineClass ?>" data-submenu-name="<?= $arItem['TEXT'] ?>">
                    <div class="angle angle1"></div>
                    <div class="angle angle2"></div>
                    <div class="angle angle3"></div>
                    <div class="angle angle4"></div>
                    <a href="<?= $arItem['LINK'] ?>" class="menu-catalog-12-link"><?= $arItem['TEXT'] ?></a>
                <? endif; ?>
            <? else:?>

                <? if ($previousLevel == 3):?>
                    </ul>
                <? endif ?>

                <? if ($secondLevelImage):?>
                    <div class="img-menu img-menu2">
                        <a href="<?= $secondLevelImage['LINK'] ?>">
                            <img src="<?= $secondLevelImage['IMAGE_NO_HOVER'] ?>" alt="" class='no-hover'>
                            <img src="<?= $secondLevelImage['IMAGE_HOVER'] ?>" alt="" class="hover-menu">
                        </a>
                    </div>
                    <? $secondLevelImage = []; ?>
                <? endif; ?>


                </li><li class="menu-catalog-12-item line-bottom" dafta-submenu-name="<?= $arItem['TEXT'] ?>">
                <div class="angle angle1"></div>
                <div class="angle angle2"></div>
                <div class="angle angle3"></div>
                <div class="angle angle4"></div>
                <a href="<?= $arItem['LINK'] ?>" class="menu-catalog-12-link"><?= $arItem['TEXT'] ?></a>

                <span class="to_section"><a href="<?= $arItem['LINK'] ?>">Перейти в раздел</a></span>

                <? if ($arItem['PARAMS']['IMAGE_HOVER'] && ($previousLevel == 1 || $previousLevel == 3)):?>
                    <?
                    $secondLevelImage = [
                        'IMAGE_NO_HOVER' => $arItem['PARAMS']['IMAGE_NO_HOVER'],
                        'IMAGE_HOVER' => $arItem['PARAMS']['IMAGE_HOVER'],
                        'LINK' => $arItem['LINK']
                    ];
                    ?>
                <? endif; ?>
                <? if ($secondLevelImage):?>
                    <div class="img-menu img-menu2">
                        <a href="<?= $secondLevelImage['LINK'] ?>">
                            <img src="<?= $secondLevelImage['IMAGE_NO_HOVER'] ?>" alt="" class='no-hover'>
                            <img src="<?= $secondLevelImage['IMAGE_HOVER'] ?>" alt="" class="hover-menu">
                        </a>
                    </div>
                    <? $secondLevelImage = []; ?>
                <? endif; ?>

            <? endif; ?>
            <? if ($arItem['PARAMS']['IMAGE_HOVER']):?>
                <?
                $secondLevelImage = [
                    'IMAGE_NO_HOVER' => $arItem['PARAMS']['IMAGE_NO_HOVER'],
                    'IMAGE_HOVER' => $arItem['PARAMS']['IMAGE_HOVER'],
                    'LINK' => $arItem['LINK']
                ];
                ?>
            <? endif; ?>

        <? else:?>
            <? if ($previousLevel == 2):?>
                <ul class="menu__catalog-13">
                <li><a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a></li>
            <? else:?>
                <li><a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a></li>
            <? endif; ?>
        <? endif; ?>
        <? $previousLevel = $arItem['DEPTH_LEVEL'] ?>
    <? endforeach ?>
    <? if ($secondLevelImage):?>
        <div class="img-menu img-menu2">
            <a href="<?= $secondLevelImage['LINK'] ?>">
                <img src="<?= $secondLevelImage['IMAGE_NO_HOVER'] ?>" alt="" class='no-hover'>
                <img src="<?= $secondLevelImage['IMAGE_HOVER'] ?>" alt="" class="hover-menu">
            </a>
        </div>
        <? $secondLevelImage = []; ?>
    <? endif; ?>

    </ul>
<? endif ?>