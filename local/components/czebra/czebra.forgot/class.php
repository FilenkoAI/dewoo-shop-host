<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

// что с именем?
class CCzebraAuthComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if(!isset($arParams["CACHE_TIME"])) {
            $arParams["CACHE_TIME"] = 36000000;
        }
        $arParams['PATH'] = $this->GetPath();
        return $arParams;
    }

    public function executeComponent()
    {
        if($this->arParams['AJAX'] == 'Y') {
            $phone = Czebra\Auth\CommonController::trimPhoneNumber($_POST['phone']);
            if($_POST['sendCode'] == 'Y' || $_POST['sendAgain']) {
                $this->arResult = $this->sendCode($phone);
            } else {
                $code = trim($_POST['code']);
                $newPassword = trim($_POST['newPassword']);
                $confirmPassword = trim($_POST['confirmPassword']);
                $this->arResult = $this->changePassword($code, $phone, $newPassword, $confirmPassword);
            }
        } else {
            $this->includeComponentTemplate();
        }
        return $this->arResult;
    }

    private static function sendCode($phone)
    {
        $USER_ID = Czebra\Auth\CommonController::getUserIdByPhoneNumber($phone);
        $result = [];
        if($USER_ID) {
            $res = Czebra\Auth\CommonController::sendConfirmationCode($USER_ID);
            if($res) {
                $result['success'] = true;
            } else {
                $result['message'] = GetMessage('CZEBRA.AUTH.WRONG');
                $result['success'] = false;
            }
        } else {
            $result['success'] = false;
            $result['message'] = GetMessage('CZEBRA.FORGOT.NOT_FOUND');
        }

        echo json_encode($result);
    }

    private static function changePassword($code, $phone, $newPassword, $confirmPassword, $regExp = '/^[a-zA-Z0-9@#$%^~&*_=-]{6,30}$/')
    {

        if($newPassword == $confirmPassword) {
            $USER_ID = CUser::VerifyPhoneCode($phone, $code);
            $res['USER'] = $USER_ID;
            if($USER_ID) {
                $res = Czebra\Auth\ForgotController::setNewPassword($USER_ID, $newPassword, $regExp);
                $result['test1'] = $res;
                if($res['success']) {
                    $result['success'] = true;
                } else {
                    $result['success'] = false;
                    if(!$res['password_is_valid']) {
                        $result['message'] = GetMessage('CZEBRA.FORGOT.INVALID_PASSWORD');
                    } else {
                        $result['message'] = $res['error'];
                    }
                }
            } else {
                $result['message'] = GetMessage('CZEBRA.FORGOT.INCORRECT_CODE');
                $result['success'] = false;
            }
        } else {
            $result['message'] = GetMessage('CZEBRA.FORGOT.NOT_CONFIRMED');
            $result['success'] = false;
        }
        echo json_encode($result);
    }
}
