<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

    use Bitrix\Highloadblock as HL;
    use Bitrix\Main\Loader;

    Loader::IncludeModule("subscribe");

    function searchSerialPrefix()
    {
        $serial = trim($_GET["q"]);
        $arSectionIds = false;
        $arData = [
            "SECTIONS" => [],
            "ELEMENTS" => [],
            "SECTION_NAMES" => '',
            "SELECT_ELEMENTS" => '<option value="0">Модель</option>',
        ];
        if (strlen($serial) > 2) {

            $prefix = strtolower(substr($serial, 0, 3));

            CModule::IncludeModule('iblock');

            $obCache = new CPHPCache();
            $cacheLifetime = 86400;
            $cacheID = 'prefixes';
            $cachePath = '/warranty/' . $cacheID;


            if ($obCache->InitCache($cacheLifetime, $cacheID, $cachePath)) {

                $arPrefixes = $obCache->GetVars();

            } elseif ($obCache->StartDataCache()) {

                $arPrefixes = [];
                CModule::IncludeModule('highloadblock');
                $hlblock = HL\HighloadBlockTable::getById(6)->fetch();
                $entity = HL\HighloadBlockTable::compileEntity($hlblock);
                $entity_data_class = $entity->getDataClass();

                $sTableID = 'tbl_' . $hlblock["TABLE_NAME"];

                $rsData = $entity_data_class::getList(array(
                    "select" => array('*'),
                    "filter" => array(),
                    "order" => array()
                ));
                $rsData = new CDBResult($rsData, $sTableID);

                while ($rwPrefix = $rsData->Fetch()) {
                    $arPrefixes[$rwPrefix["UF_PREFIX"]] = $rwPrefix;
                }

                $obCache->EndDataCache($arPrefixes);

            }


            if (array_key_exists($prefix, $arPrefixes) === true) {
                $arSectionIds = $arPrefixes[$prefix]["UF_SECTIONS"];
            }


            if (empty($arSectionIds) === false) {
                $cacheLifetime = 86400;
                $cacheID = 'catalog-data-' . implode('-', $arSectionIds);
                $cachePath = '/warranty/' . $cacheID;
                if ($obCache->InitCache($cacheLifetime, $cacheID, $cachePath)) {
                    $arData = $obCache->GetVars();
                } elseif ($obCache->StartDataCache()) {

                    $rsSections = CIBlockSection::GetList(
                        array("SORT" => "ASC"),
                        array("IBLOCK_ID" => 4, "ID" => $arSectionIds),
                        false,
                        array("ID", "IBLOCK_ID", "NAME", "UF_SEO_H1")
                    );
                    while ($rwSection = $rsSections->GetNext()) {
                        $arData["SECTIONS"][$rwSection["ID"]] = $rwSection;
                    }

                    // модели----
                    $rsElements = CIBlockElement::GetList(
                        array("SORT" => "ASC", "NAME" => "ASC"),
                        array(
                            "IBLOCK_ID" => 4,
                            "SECTION_ID" => $arSectionIds,
                            "PROPERTY_IS_XXL_WARRANTY_VALUE" => "Y",
                            "INCLUDE_SUBSECTIONS" => "Y"
                        ),
                        false,
                        false,
                        array("ID", "IBLOCK_ID", "NAME", 'IBLOCK_SECTION_ID')
                    );

                    while ($rwElement = $rsElements->GetNext()) {
                        $arData["ELEMENTS"][$rwElement["ID"]] = $rwElement;
                        $arData["SELECT_ELEMENTS"] .= '<option value="' . $rwElement["ID"] . '" 
                        data-section-id="' . $rwElement['IBLOCK_SECTION_ID'] . '">' . $rwElement["NAME"] . '</option>';
                    }


                    $sectionNames = [];
                    foreach ($arData["SECTIONS"] as $section) {
                        if (empty($section["UF_SEO_H1"]) === false) {
                            $name = $section["UF_SEO_H1"];
                        } else {
                            $name = $section["NAME"];
                        }
                        $sectionNames[] = $name;
                    }
                    if (empty($sectionNames) === false) {
                        $arData["SECTION_NAMES"] = implode(', ', $sectionNames);
                    }

                    $obCache->EndDataCache($arData);
                }
            }
        }
        echo json_encode([
            "SECTION_IDS" => implode(',', $arSectionIds),
            "SECTIONS" => $arData["SECTIONS"],
            "PRODUCTS" => $arData["ELEMENTS"],
            "SECTION_NAMES" => $arData["SECTION_NAMES"],
            "SELECT_ELEMENTS" => $arData["SELECT_ELEMENTS"],
        ]);
        return;
    }

    function getCertificate($data)
    {
        //$img = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/skin/images/certificate.jpg';
        //$font = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/skin/images/arial.ttf';
        //Czebra
        $img = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/front/skin/images/certificate.jpg';
        $font = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/front/skin/images/arial.ttf';
        $pic = ImageCreateFromjpeg($img); //открываем рисунок в формате JPEG
        $color = ImageColorAllocate($pic, 0, 0, 0); //получаем идентификатор цвета
        ImageTTFtext($pic, 9, 0, 120, 318, $color, $font, $data['model_name']);
        ImageTTFtext($pic, 9, 0, 330, 318, $color, $font, $data['serial_num']);
        ImageTTFtext($pic, 9, 0, 540, 318, $color, $font, $data['date']);
        $filename = '/upload/certs/' . md5(time()) . '.jpg';
        Imagejpeg($pic, $_SERVER['DOCUMENT_ROOT'] . $filename); //сохраняем рисунок в формате JPEG
        ImageDestroy($pic); //освобождаем память и закрываем изображение
        return $filename;
    }


    function getCertificateZip($data)
    {
        $fileId = md5(time());

        // $img = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/skin/images/certificate.jpg';
        // $font = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/skin/images/arial.ttf';
        //Czebra
        $img = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/front/skin/images/certificate.jpg';
        $font = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/front/skin/images/arial.ttf';
        $pic = ImageCreateFromjpeg($img); //открываем рисунок в формате JPEG
        $color = ImageColorAllocate($pic, 0, 0, 0); //получаем идентификатор цвета
        ImageTTFtext($pic, 9, 0, 120, 318, $color, $font, $data['model_name']);
        ImageTTFtext($pic, 9, 0, 330, 318, $color, $font, $data['serial_num']);
        ImageTTFtext($pic, 9, 0, 540, 318, $color, $font, $data['date']);

        $fileDir = '/upload/certs/';
        $filename = $fileDir . $fileId . '.jpg';
        $filenameZip = $fileDir . $fileId . '.zip';

        Imagejpeg($pic, $_SERVER['DOCUMENT_ROOT'] . $filename); //сохраняем рисунок в формате JPEG
        ImageDestroy($pic); //освобождаем память и закрываем изображение

        $pack = CBXArchive::GetArchive($_SERVER["DOCUMENT_ROOT"] . $filenameZip);
        $pack->SetOptions(array(
            'REMOVE_PATH' => $_SERVER["DOCUMENT_ROOT"] . $fileDir,
        ));
        $pRes = $pack->Pack(array(
            $_SERVER['DOCUMENT_ROOT'] . $filename
        ));


        return $filenameZip;
    }


    function warrantyRegister()
    {
        CModule::IncludeModule('iblock');

        $serialnum = strtolower(trim(strip_tags($_POST['serialnum'])));
        $catalogId = (int)trim(strip_tags($_POST['catalog_id']));
        $date = trim(strip_tags($_POST['date_sale']));
        list($day, $month, $year) = explode('.', $date);
        $date_sale = mktime(0, 0, 0, intval($month), intval($day), intval($year));
        $surname = trim(strip_tags($_POST['surname']));
        $firstname = trim(strip_tags($_POST['firstname']));
        $patname = trim(strip_tags($_POST['patname']));
        $email = trim(strip_tags($_POST['email']));
		$telefon = trim(strip_tags($_POST['telefon']));
        $date_add = time();

        if (!preg_match("/^\w{3,4}\D{0,1}\d{3,4}\w{2}\d{4}\w{0,2}$/i", $serialnum)) {
            echo json_encode(array('status' => 'error', 'name' => 'serialnum', 'msg' => 'Серийный номер не верный'));
        } elseif ($catalogId == 0) {
            echo json_encode(array('status' => 'error', 'name' => 'catalog_id', 'msg' => 'Вы не указали модель'));
        } elseif ($date_add < $date_sale) {
            echo json_encode(array('status' => 'error', 'name' => 'date_sale', 'msg' => 'Неверно указана дата покупки'));
        } elseif ($date == '') {
            echo json_encode(array('status' => 'error', 'name' => 'date_sale', 'msg' => 'Выберите, пожалуйста, дату'));
        } elseif ($surname == '') {
            echo json_encode(array('status' => 'error', 'name' => 'surname', 'msg' => 'Укажите фамилию'));
        } elseif ($telefon == '') {
            echo json_encode(array('status' => 'error', 'name' => 'telefon', 'msg' => 'Укажите Ваш телефон'));
        }
/*else if ($firstname=='') {
		echo json_encode(array('status'=>'error','name'=>'firstname','msg'=>'Укажите имя'));
	} else if ($patname=='') {
		echo json_encode(array('status'=>'error','name'=>'patname','msg'=>'Укажите отчество'));
	}*/ elseif ($email == '') {
            echo json_encode(array('status' => 'error', 'name' => 'email', 'msg' => 'Укажите Ваш E-mail'));
        } elseif (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[-_.a-z0-9]+)?@[-_.a-z0-9]+(?:\.?[-_.a-z0-9]+)?\.[-_.a-z]{2,5})$/i", trim($email))) {
            echo json_encode(array('status' => 'error', 'name' => 'email', 'msg' => 'Проверьте корректность e-mail!'));
        } elseif (($date_add - $date_sale) > 60 * 60 * 24 * 33) {
            echo json_encode(array('status' => 'ok', 'msg' => 'Обязательным условием предоставления расширенной гарантии Daewoo XXL является регистрация приобретенной техники не позднее 32 дней с момента покупки.'));
        } else {

            // проверка не добавлено ли ранее ------------
            $rwWarrantyRecord = CIBlockElement::GetList(
                array(),
                array(
                    "IBLOCK_ID" => 16,
                    "PROPERTY_SERIAL_NUMBER" => $serialnum,
                    "PROPERTY_PRODUCT" => intval($catalogId)
                ),
                false,
                false,
                array("ID", "IBLOCK_ID")
            )->GetNext();

            if ($rwWarrantyRecord !== false) {
                echo json_encode(array(
                        'status' => 'ok',
                        "msg" => '<p>Пожалуйста, проверьте правильность ввода.<br> В случае возникновения повторной ошибки, пожалуйста, обратитесь в службу поддержки по телефону: +7 (495) 988-9-388</p>',
                        'title' => 'Введенный серийный номер изделия был ранее зарегистрирован в системе.')
                );
                return false;
            }

            //поиск продукта ---------
            $obProduct = CIBlockElement::GetList(
                array(),
                array(
                    "IBLOCK_ID" => IBLOCK_ID_CATALOG,
                    "ID" => $catalogId
                ),
                false,
                false,
                array("ID", "IBLOCK_ID", "NAME")
            )->GetNextElement(false, false);

            $arProduct = array();
            if ($obProduct) {
                $arProduct = $obProduct->GetFields();
                $arProduct['PROPERTIES'] = $obProduct->GetProperties();
            } else {
                echo json_encode(array('status' => 'error', 'name' => 'catalog_id', 'msg' => 'Модель указана не верно'));
                return false;
            }

            // if (strlen(trim($arProduct['PROPERTIES']['PRODUCT_CODE']['VALUE'])) <= 0) {
            //     echo json_encode(array('status' => 'error', 'name' => 'catalog_id', 'msg' => 'Не удалось определить код товар'));
            //     return false;
            // }

            // // поиск сертификата -----
            // if(!Loader::includeModule('daewoopower.custom'))
            // {
            //     echo json_encode(array('status' => 'error', 'name' => 'catalog_id', 'msg' => 'Не установлен модулья daewoopower.custom для првоерки серийного номера'));
            //     return false;
            // }

            // $oSerialNumber = new \Daewoopower\Custom\SerialNumber();
            // $arSerialNumberFind = $oSerialNumber->getTable()->getList(array(
            //     'filter' => array(
            //         'MODEL' => mb_strtoupper(preg_replace('/\s+/', '',$arProduct['PROPERTIES']['PRODUCT_CODE']['VALUE'])),
            //         'NUMBER' => mb_strtoupper($serialnum)
            //     )
            // ))->fetch();
            //
            // if(!$arSerialNumberFind)
            // {
            //     echo json_encode(array('status' => 'error', 'name' => 'catalog_id', 'msg' => 'Не найден такой серийный номер'));
            //     return false;
            // }


            if ($_POST["subscribe_yes_garant"] == "on")
                $is_subscribe = 635; // Согласие на рассылку
            else
                $is_subscribe = 636; // Несогласие на рассылку

            $PROP = [
                "SERIAL_NUMBER" => $serialnum,
                "PRODUCT" => $catalogId,
                "CUSTOMER_NAME" => $surname,
                "CUSTOMER_EMAIL" => $email,
                "CUSTOMER_TELEFON" => $telefon,
                "BUY_DATE" => ConvertTimeStamp($date_sale, "SHORT", "ru"),
                "REG_DATE" => ConvertTimeStamp($date_add, "SHORT", "ru"),
                "SUBSCRIBE" => $is_subscribe
            ];
            $arFields = Array(
                'IBLOCK_SECTION_ID' => false,
                'IBLOCK_ID' => 16,
                'PROPERTY_VALUES' => $PROP,
                'NAME' => $surname,
                'ACTIVE' => "Y",
                'SORT' => "500",
            );

            $el = new CIBlockElement;
            $el->Add($arFields, false, false);

            if ($is_subscribe == 635) {
                $sub = new CSubscription;
                $sub->Add(array("ACTIVE" => "Y", "EMAIL" => $email, "CONFIRMED" => "Y", "SEND_CONFIRM" => "N"));
            }

            $cert_data = array(
                'model_name' => preg_replace('|[^A-Za-z\d\s]|msi', '', $arProduct["NAME"]),
                'serial_num' => $serialnum,
                'date' => date('d.m.Y', $date_sale),
            );
//                $certificate = GetCertificate($cert_data);
            $certificate = GetCertificateZip($cert_data);
            $message = '' .
                '<p>Уважаемый клиент!</p>' .
                '<p>Благодарим Вас за покупку оригинальной техники Daewoo и регистрацию в программе сервисного обслуживания XXL.</p>' .
                '<p>Во вложении находится сертификат, который подтверждает право на бесплатное устранение неисправностей, возникших по вине производителя, в течение 36 месяцев со дня продажи.</p>' .
                '<p>При обращении в авторизованный сервисный центр необходимо предоставить документ, подтверждающий покупку (товарный или кассовый чек), а также гарантийный талон.</p>' .
                '<p>На официальном сайте компании Вы можете ознакомиться с <a href="//daewoo-power.ru/support/warranty_rules/">условиями предоставления гарантии</a> и <a href="http://daewoo-power.ru/support/grafik_to/">графиком технического обслуживания</a> Вашей техники Daewoo.</p>' .
                '';
            if (empty($email) === false) {
                $arEventFields = array(
                    "MESSAGE" => $message,
                    "EMAIL_TO" => $email,
                );
                CEvent::Send("XXL_WARRANTY", 's1', $arEventFields, "Y", 48, array($certificate), 'ru');
            }
            // if($email){
            // 	$MyCMS['phpmailer']->IsMail();
            // 	$MyCMS['phpmailer']->Subject = "Регистрация на расширенную гарантию Daewoo XXL";
            // 	$MyCMS['phpmailer']->FromName = "Daewoo Power Products";
            // 	$MyCMS['phpmailer']->From = 'zakaz@daewoo-power.ru';
            // 	$MyCMS['phpmailer']->CharSet = "utf-8";
            // 	$MyCMS['phpmailer']->WordWrap = 75;
            // 	$MyCMS['phpmailer']->IsHTML(true);
            // 	$MyCMS['phpmailer']->Body = $message;
            // 	$MyCMS['phpmailer']->AltBody = "";
            // 	$MyCMS['phpmailer']->AddAddress($email);
            // 	$MyCMS['phpmailer']->AddAttachment($_SERVER['DOCUMENT_ROOT'].$certificate, 'certificate.jpg');
            // 	$MyCMS['phpmailer']->Send();
            // 	$MyCMS['phpmailer']->ClearAddresses();
            // }
            echo json_encode(array('status' => 'ok', 'msg' => '<p>На Ваш электронный адрес направлен Сертификат,<br> а также информационное письмо об условиях сервисного обслуживания.</p>', 'title' => 'Спасибо за регистрацию оригинальной техники Daewoo!'));

        }
    }

    function checkWarrantyFormStepOne()
    {
        $serialNumber = strtolower(trim(strip_tags($_GET['serialnum'])));
        $catalogId = (int)trim(strip_tags($_GET['catalog_id']));

        CModule::IncludeModule('iblock');
        $element = false;
        if (empty($catalogId) === false) {
            $element = CIBlockElement::GetList(
                array(),
                array("IBLOCK_ID" => 4,
                    "ID" => $catalogId,
                    "=PROPERTY_IS_XXL_WARRANTY_VALUE" => "Y"
                ),
                false,
                false,
                array("ID", "IBLOCK_ID")
            )->GetNext();
        }

        if (empty($serialNumber) === true) {
            echo json_encode(array('status' => 'error', 'name' => 'serialnum', 'msg' => 'Серийный номер не верный'));
        } elseif (empty($catalogId) === true) {
            echo json_encode(array('status' => 'error', 'name' => 'catalog_id', 'msg' => 'Вы не указали модель'));
        } elseif ($element === false) {
            echo json_encode(array('status' => 'error', 'name' => 'catalog_id', 'msg' => 'Модель указана не верно'));
        } else {
            echo json_encode(array('status' => 'ok'));
        }

        return;
    }

    function getSerialInfo()
    {
        CModule::IncludeModule('iblock');
        $serialnum = strip_tags(strtolower($_POST["serialnum"]));
        $rwWarrantyRecord = CIBlockElement::GetList(
            array(),
            array("IBLOCK_ID" => 16, "PROPERTY_SERIAL_NUMBER" => $serialnum),
            false,
            false,
            array(
                "ID",
                "IBLOCK_ID",
                "NAME",
                "PROPERTY_REG_DATE",
                "PROPERTY_BUY_DATE",
                "PROPERTY_CUSTOMER_NAME",
                "PROPERTY_SERIAL_NUMBER",
                "PROPERTY_PRODUCT"
            )
        )->GetNext();
        $response = [];

        if ($rwWarrantyRecord !== false) {
            $rwProduct = CIBlockElement::GetList(
                array(),
                array("IBLOCK_ID" => 4, "ID" => $rwWarrantyRecord["PROPERTY_PRODUCT_VALUE"]),
                false,
                false,
                array("ID", "IBLOCK_ID", "NAME")
            )->GetNext();
            $productName = '';
            if ($rwProduct !== false) {
                $productName = $rwProduct["NAME"];
            }
            $message = '';
            if (empty($rwWarrantyRecord["PROPERTY_SERIAL_NUMBER_VALUE"]) === false) {
                $message .= "<p><span class='bold'>Серийный номер:</span> {$rwWarrantyRecord["PROPERTY_SERIAL_NUMBER_VALUE"]}</p>";
            }
            if (empty($productName) === false) {
                $message .= "<p><span class='bold'>Наименование модели:</span> {$productName}</p>";
            }
            if (empty($rwWarrantyRecord["PROPERRTY_CUSTOMER_NAME_VALUE"]) === false) {
                $message .= "<p><span class='bold'>ФИО покупателя:</span> {$rwWarrantyRecord["PROPERRTY_CUSTOMER_NAME_VALUE"]}</p>";
            } else {
                $message .= "<p><span class='bold'>ФИО покупателя:</span> {$rwWarrantyRecord["NAME"]}</p>";
            }
            if (empty($rwWarrantyRecord["PROPERTY_BUY_DATE_VALUE"]) === false) {
                $message .= "<p><span class='bold'>Дата покупки:</span> {$rwWarrantyRecord["PROPERTY_BUY_DATE_VALUE"]}</p>";
                $buyDateTimestamp = MakeTimeStamp($rwWarrantyRecord["PROPERTY_BUY_DATE_VALUE"]);
                $endWarrantyTimestamp = $buyDateTimestamp + (86400 * 365 * 3);
                $message .= "<p><span class='bold'>Дата окончания гарантии:</span> " . ConvertTimeStamp($endWarrantyTimestamp, "SHORT", "ru") . "</p>";
            }
            $response = [
                "status" => "ok",
                "msg" => $message,
                "title" => "Статус гарантии"
            ];
            $response["TIMESTAMP"] = $buyDateTimestamp;
            echo json_encode($response);
        } else {
            $response = [
                "status" => "ok",
                "msg" => "Введенный серийный номер не зарегистрирован в программе расширенной гарантии Daewoo XXL.",
                "title" => "Статус гарантии"
            ];
            echo json_encode($response);
        }
    }

    function getAllSections()
    {
        $obCache = new CPHPCache();
        $cacheLifetime = 86400 * 3;
        $cacheID = 'all-sections-options';
        $cachePath = '/warranty/' . $cacheID;

        $arAllSectionsData = array();

        if ($obCache->InitCache($cacheLifetime, $cacheID, $cachePath)) {
            $arAllSectionsData = $obCache->GetVars();
        } elseif ($obCache->StartDataCache()) {
            CModule::IncludeModule('iblock');
            $rsSections = CIBlockSection::GetTreeList(
                array("IBLOCK_ID" => 4),
                array("ID", "DEPTH_LEVEL", "NAME")
            );

            $arSections = [];

            // категории ------
            $sectionOptions = '<option value="">Категория</option>';
            while ($rwSection = $rsSections->GetNext()) {
                // $arSections[$rwSection["ID"]] = $rwSection;
                $margin = str_repeat('--', (int)$rwSection["DEPTH_LEVEL"] - 1);
                $sectionOptions .= "<option value='{$rwSection["ID"]}'>{$margin}{$rwSection["NAME"]}</option>";
            }

            // модели --------
            $arAllSectionsData["SELECT_ELEMENTS"] = '<option value="0">Модель</option>';
            $rsElements = CIBlockElement::GetList(
                array("SORT" => "ASC", "NAME" => "ASC"),
                array(
                    "IBLOCK_ID" => 4,
                    "PROPERTY_IS_XXL_WARRANTY_VALUE" => "Y",
                    "INCLUDE_SUBSECTIONS" => "Y"
                ),
                false,
                false,
                array("ID", "IBLOCK_ID", "NAME", 'IBLOCK_SECTION_ID')
            );

            while ($rwElement = $rsElements->GetNext()) {
                $arAllSectionsData["ELEMENTS"][$rwElement["ID"]] = $rwElement;
                $arAllSectionsData["SELECT_ELEMENTS"] .= '<option value="' . $rwElement["ID"] . '" 
                        data-section-id="' . $rwElement['IBLOCK_SECTION_ID'] . '">' . $rwElement["NAME"] . '</option>';
            }

            $arAllSectionsData['SECTION_OPTIONS'] = $sectionOptions;

            $obCache->EndDataCache($arAllSectionsData);
        }


        echo json_encode([
            "SECTION_OPTIONS" => $arAllSectionsData['SECTION_OPTIONS'],
            "SECTIONS" => false,
            "SELECT_ELEMENTS" => $arAllSectionsData['SELECT_ELEMENTS'],
        ]);
        die();
    }

    function getSectionItems()
    {
        if (empty($_GET["q"]) === false) {
            $sectionId = $_GET["q"];
        } else {
            die();
        }

        $obCache = new CPHPCache;
        $cacheLifetime = 86400;
        $cacheID = 'section-' . $sectionId;
        $cachePath = '/warranty/' . $cacheID;
        if ($obCache->InitCache($cacheLifetime, $cacheID, $cachePath)) {
            $selectElements = $obCache->GetVars();
        } elseif ($obCache->StartDataCache()) {
            CModule::IncludeModule('iblock');
            $rsElements = CIBlockElement::GetList(
                array("SORT" => "ASC", "NAME" => "ASC"),
                array(
                    "IBLOCK_ID" => 4,
                    "SECTION_ID" => $sectionId,
                    "PROPERTY_IS_XXL_WARRANTY_VALUE" => "Y",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    'ACTIVE' => 'Y'
                ),
                false,
                false,
                array("ID", "IBLOCK_ID", "NAME")
            );

            $selectElements = '';

            while ($rwElement = $rsElements->GetNext()) {
                $selectElements .= '<option value="' . $rwElement["ID"] . '">' . $rwElement["NAME"] . '</option>';
            }

            $obCache->EndDataCache($selectElements);
        }

        echo json_encode([
            "SELECT_ELEMENTS" => $selectElements
        ]);
        die();
    }

    switch ($_GET["action"]) {
        //поиск категорий и моделей по серийному номеру -----
        case 'search-serial':
            {
                searchSerialPrefix();
                break;
            }

        case 'xxl-step-check':
            {
                checkWarrantyFormStepOne();
                break;
            }
        case 'xxl-final-step':
            {
                warrantyRegister();
                break;
            }
        case 'get-sn-info':
            {
                getSerialInfo();
                break;
            }
        // получение всех категорий и моделей когда по первым трем буквам не удалось определить категорию---
        case 'get-all-sections':
            {
                getAllSections();
                break;
            }
        case 'get-section-items':
            {
                getSectionItems();
                break;
            }

        default:
            die('access denied');
            break;
    }

