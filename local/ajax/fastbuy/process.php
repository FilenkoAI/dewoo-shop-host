<?php

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
$name = $request->getPost("NAME");
$phone = $request->getPost("PHONE");
if ($name && $phone) {
    $result = \Czebra\Project\FastBuy::create($name, $phone);
    $res = [];
    if ($result['ID'] > 0) {
        $res['status'] = 'success';
        $res['id'] = $result['ID'];
//        LocalRedirect("/personal_section/fastbuy/?ID=" . $result['ID'], true);
    }
    echo json_encode($res);
}
//LocalRedirect("/personal_section/fastbuy/error/", true);