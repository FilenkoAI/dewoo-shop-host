<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
// что с именем?
class CCzebraAuthComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if (!isset($arParams["CACHE_TIME"])) {
            $arParams["CACHE_TIME"] = 36000000;
        }
        $arParams['PATH'] = $this->GetPath();
        return $arParams;
    }

    public function executeComponent()
    {
        if ($this->arParams['AJAX'] == 'Y') {
            $phone = Czebra\Auth\CommonController::trimPhoneNumber($_POST['phone']);
            $password = $_POST['password'];
            $this->arResult = $this->auth( $phone, $password );
        } else {
            $this->includeComponentTemplate();
        }
        return $this->arResult;
    }

    private static function auth($phone, $password){
        $USER_ID = Czebra\Auth\CommonController::getUserIdByPhoneNumber($phone);
        $result = [];
        if ($USER_ID) {
            $res = Czebra\Auth\CommonController::userPhoneLogin($phone, $password);
            if ( empty($res['MESSAGE']) ) {
                $result['success'] = true;
            } else {
                // пока так
                $result['error'] = GetMessage('CZEBRA.AUTH.INCORRECT');
                $result['success'] = false;
            }
        } else {
            $result['success'] = false;
            $result['error'] = GetMessage('CZEBRA.AUTH.NOT_FOUND');
        }

        echo json_encode($result);
    }
}
