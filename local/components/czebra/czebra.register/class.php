<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
// что с именем?
class CCzebraRegComponent extends CBitrixComponent
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
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $code = $_POST['code'];
            if ($_POST['sendAgain'] == 'Y') {
                self::sendCode($phone);
            } else {
                if ($_POST['activate'] == 'Y'){
                    self::activateUser($phone, $code);
                } elseif ($_POST['send_again'] == 'Y'){
                    echo json_encode(sendCode::sendCode($phone));
                } else {
                    self::registerUser($name, $phone, $email, $password, $confirmPassword, false );
                }
            }
        } else {
            $this->includeComponentTemplate();
        }
        return $this->arResult;
    }

    private static function registerUser($name, $phone, $email, $password, $confirmPassword, $sendConfirm, $regExp = '/^[a-zA-Z0-9@#$%^&*_=-]{6,30}$/'){
        $result = [];
//        $fields = [
//            'NAME' => $name,
//            'PHONE' => $phone,
//        ];
        if ( $password == $confirmPassword ){
            if ( preg_match($regExp, $password) ){
                $res = Czebra\Auth\RegistrationController::registerUser($name, $phone, $email, $password, $confirmPassword, $regExp, false);
                if ($res['success']){
                    $result['success'] = true;
                    self::sendCode($phone);
                } else {
                    $result['message'] = $res['error'];
                    $result['success'] = false;
                }
            } else {
                $result['message'] = GetMessage('CZEBRA.REGISTER.PASSWORD_IS_NOT_VALID');
                $result['success'] = false;
            }
        } else {
            $result['message'] = GetMessage('CZEBRA.REGISTER.PASSWORDS_DO_NOT_MATCH');
            $result['success'] = false;
        }
//        $result['data'] = $fields;
        echo json_encode($result);
    }
    private static function activateUser($phone, $code){
        $fields = [
            'PHONE' => $phone,
            'CODE' => $code
        ];
        $USER_ID = CUser::VerifyPhoneCode($phone, $code);
        if($USER_ID) {
            $result['success'] = true;
            $user = new \CUser;
            $user->Update($USER_ID, ['ACTIVE' => 'Y']);
            global $USER;
            $USER->Authorize($USER_ID);

        } else {
            $result['message'] = GetMessage('CZEBRA.REGISTER.INCORRECT_CODE');
            $result['success'] = false;
        }
        $result['data'] = $fields;
        echo json_encode($result);

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

//        echo json_encode($result);
        return $result;
    }
}
