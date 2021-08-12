<?php


namespace Czebra\Auth;


class CommonController
{
    public static function getUserInfo($phone)
    {
        $result = false;
        $res = \Czebra\Auth\Tables\UserPhoneTable::query()
            ->setSelect(['*', 'USER'])
            ->setFilter(['PHONE_NUMBER' => $phone])
            ->fetchObject();
        if($res !== null) {
            $result = [
                'ID' => $res->getUser()->getId(),
                'LOGIN' => $res->getUser()->getLogin(),
                'EMAIL' => $res->getUser()->getEmail(),
                'PHONE_NUMBER' => $res->getPhoneNumber()
            ];

        }
        return $result;
    }

    public static function getUserIdByPhoneNumber($phone){
        $user = self::getUserInfo($phone);
        return $user['ID'];
    }

    public static function trimPhoneNumber($phone){
        $replace = [" ", "(", ")", "-"];
        $phone = str_replace($replace, "", $phone);
        return $phone;
    }
    // именно этот метод должен использоваться при авторизации
    public static function userPhoneLogin($phone, $password)
    {
        global $USER;
        $phone = self::trimPhoneNumber($phone);
        $login = self::getUserInfo($phone)['LOGIN'];
        $res = $USER->Login($login, $password, 'Y');
        return $res;
    }

    public static function confirmCode($code, $phone) : array
    {
        $USER_ID = CUser::VerifyPhoneCode($phone, $code);
        if ($USER_ID) {
            self::updateUser($USER_ID, ['ACTIVE' => 'Y']);
            $result['success'] = true;
        } else {
            $result['success'] = false;
        }
        return $result;
    }

    public static function sendConfirmationCode($USER_ID)
    {
        list($code, $phoneNumber) = \CUser::GeneratePhoneCode($USER_ID);
        $sms = new \Bitrix\Main\Sms\Event(
            "SMS_USER_CONFIRM_NUMBER",
            [
                "USER_PHONE" => $phoneNumber,
                "CODE" => $code,
            ]
        );
        $smsResult = $sms->send(true);
        return $smsResult;
    }

    public static function updateUser($USER_ID, $fields = []) : array
    {
//        $user = new \CUser;
//        $user->Update($USER_ID, $fields);
//        if (!$user->LAST_ERROR){
//            $result['success'] = true;
//        } else {
//            $result['success'] = false;
//            $result['error'] = $user->LAST_ERROR;
//        }
//        return $result;
    }

    public static function checkConfirmationCode($code, $phone) : array
    {
        $result = [];
        if ( $userId = CUser::VerifyPhoneCode($phone, $code) ) {
            $result['status'] = 'success';
            $result['USER_ID']  = $userId;
        } else {
            $result['status'] = 'error';
        }
        return $result;
    }
}