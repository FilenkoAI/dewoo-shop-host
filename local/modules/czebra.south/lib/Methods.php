<?php

namespace Czebra\South;

use Bitrix\Main\UserTable;

class Methods
{
    const CODE_MIN = 1000;
    const CODE_MAX = 9999;
    const SEND_TIMEOUT = 3600; //время через сколько можно отправлять смс снова
    const SEND_INTERVAL = 3600;
    const MESSAGES_MAX_COUNT = 3;
    const MAX_ATTEMPTS_COUNT = 4;

    public static function isUserRegistered($phone)
    {
        $user = UserTable::query()
            ->setFilter(['PHONE_AUTH.PHONE_NUMBER' => $phone])
            ->setSelect(['ID', 'PHONE_AUTH.PHONE_NUMBER'])
            ->fetchObject();
        $result = [];
        if ($user) {
            $result['ID'] = $user->getId();
            $result['STATUS'] = 'Y';
        } else {
            $result['STATUS'] = 'N';
        }
        return $result;
    }

    public static function sendCode($phone, $register = 'N')
    {
        $result = [];

        if (self::isUserRegistered($phone)['STATUS'] == 'N' && $register == 'N') {
            $result['status'] = 'error';
            $result['message'] = 'Пользователь не найден';
            return $result;
        }

        $ip = $_SESSION['SESS_IP'];

        $isAllowed = self::isSendingAllowed($ip);
        $result[] = $isAllowed;

        $isValid = \Bitrix\Main\PhoneNumber\Parser::getInstance()->parse($phone)->isValid();

        if ($isValid) {
            if ($isAllowed['code'] !== 4) {

                $code = \Bitrix\Main\Security\Random::getInt(self::CODE_MIN, self::CODE_MAX);

                $sms = new \Bitrix\Main\Sms\Event(
                    "SMS_USER_CONFIRM_NUMBER",
                    [
                        "USER_PHONE" => $phone,
                        "CODE" => $code,
                    ]
                );
                $smsResult = $sms->send(true);
                if (!$smsResult->isSuccess()) {
                    $result['success'] = false;
                    $result['status'] = 'error';
                    $result['message'] = 'Слишком много запросов. Попробуйте позднее';
                    return $result;
                }

                $result['success'] = true;
                $result['sms_result'] = $smsResult;
                $codeHash = md5($code);

                $res = \Czebra\South\AuthTable::getByPrimary($phone)->fetchObject();

                if ($res) {
                    $res->setAttemptsCount(0);
                    $res->setMessagesSentCount($res->getMessagesSentCount() + 1);
                    $res->setCodeHash($codeHash);
                    $res->save();
                } else {
                    \Czebra\South\AuthTable::add([
                        'PHONE' => $phone,
                        'CODE_HASH' => $codeHash
                    ]);
                }


            }
        } else {
            $result['success'] = false;
            $result['status'] = 'error';
            $result['message'] = 'Неверный формат номера телефона';
        }

        return $result;
    }

    public static function authProcess($phone)
    {
        $phone = trim($phone);
        $userIsRegistered = self::isUserRegistered($phone);
        if ($userIsRegistered['STATUS'] === 'Y') {
            return 'Y';
        } else {
            return 'N';
        }
    }
    //временно public
    // придумать что возвращать еслли не нашел телефон
    public static function checkHashCode($phone, $code): array
    {
        $res = \Czebra\South\AuthTable::getByPrimary($phone)->fetchObject();
        $result = [];
        if ($res) {
            if ($res->getAttemptsCount() > self::MAX_ATTEMPTS_COUNT) {
                $result['STATUS'] = 'N';
                $result['MESSAGE'] = 'Слишком много попыток. Попробуйте другой код.';
            } else {
                $res->setAttemptsCount($res->getAttemptsCount() + 1);
                if ($res->getCodeHash() === md5($code)) {
                    $res->delete();
                    $result['STATUS'] = 'Y';
                    $result[] = self::userProceed($phone);
                } else {
                    $result['STATUS'] = 'N';
                    $result['MESSAGE'] = 'Неверный код подтверждения';
                }
            }

        } else {
            $result['STATUS'] = 'N';
            $result['MESSAGE'] = 'ERROR';
        }
        $res->save();
        return $result;
    }

    public static function isSendingAllowed($ip): array
    {
        $res = \Czebra\South\IPTable::getByPrimary($ip)->fetchObject();
        $result = [];
        if ($res === null) {
            \Czebra\South\IPTable::add(['IP' => $ip]);
            $result['status'] = 'success';
            $result['message'] = 'added';
            $result['code'] = 0;
        } else {
            $lastSent = $res->getDateLastSent()->getTimestamp();
            $secondsPast = (new \Bitrix\Main\Type\DateTime())->getTimestamp() - $lastSent;
            if ($res->getMessagesSentCount() > self::MESSAGES_MAX_COUNT) {
                if ($secondsPast > self::SEND_TIMEOUT) {

                    $res->setMessagesSentCount(0);
                    $res->setDateLastSent(new \Bitrix\Main\Type\DateTime());
                    $res->save();

                    $result['status'] = 'success';
                    $result['message'] = 'sending allowed again';
                    $result['code'] = 3;

                } else {
                    $result['status'] = 'error';
                    $result['message'] = 'required time did not expired';
                    $result['code'] = 4;
                }
            } else {
                if ($secondsPast > self::SEND_INTERVAL) {
                    $res->setDateLastSent(new \Bitrix\Main\Type\DateTime());
                    $res->setMessagesSentCount(0);

                    $result['message'] = 'another message has been sent, sent messages field have been set to 0';
                    $result['code'] = 1;
                } else {
                    $res->setDateLastSent(new \Bitrix\Main\Type\DateTime());
                    $res->setMessagesSentCount($res->getMessagesSentCount() + 1);

                    $result['message'] = 'another message has been sent, sent messages field have been incremented';
                    $result['code'] = 2;
                }
                $res->save();
                $result['status'] = 'success';
            }
        }

        return $result;
    }

    public static function userProceed($phone)
    {
        $result = [];
        $result['AUTHORIZED'] = 'Y';
        $result['AUTHORIZATION']['STATUS'] = self::authorizeUser($phone);
        return $result;
    }

    public static function registerUser($phone, $name, $email, $code)
    {
        $isValid = \Bitrix\Main\PhoneNumber\Parser::getInstance()->parse($phone)->isValid();
        $result = [];

        if (self::isUserRegistered($phone)['STATUS'] == 'N'){
            if ($isValid) {
                global $USER;

                $res = \Czebra\South\AuthTable::getByPrimary($phone)->fetchObject();
                if ($res) {
                    if ($res->getAttemptsCount() > self::MAX_ATTEMPTS_COUNT) {
                        $result['status'] = 'error';
                        $result['message'] = 'Слишком много попыток. Попробуйте другой код.';
                    } else {
                        $res->setAttemptsCount($res->getAttemptsCount() + 1);
                        if ($res->getCodeHash() === md5($code)) {
                            $res->delete();

                            $bConfirmReq = (\COption::GetOptionString("main", "new_user_registration_email_confirmation", "N")) == "Y";
                            $password = \Bitrix\Main\Security\Random::getString(25);
                            $login = \Bitrix\Main\Security\Random::getString(50);

                            $arFields = array(
                                "NAME" => $name,
                                "LOGIN" => $login,
                                "LID" => SITE_ID,
                                "ACTIVE" => "Y",
                                "EMAIL" => $email,
                                "PASSWORD" => $password,
                                "CONFIRM_PASSWORD" => $password,
                                "CONFIRM_CODE" => $bConfirmReq ? randString(8) : "",
                                "PHONE_NUMBER" => $phone,
                            );

                            $USER_ID = $USER->Add($arFields);

                            if (intval($USER_ID) > 0) {
                                $USER->Authorize($USER_ID);
                                $result['status'] = 'success';
                                $result['message'] = 'Вы успешно зарегистрировались!';
                            } else {
                                $result['status'] = 'error';
                                $result['message'] = $USER->LAST_ERROR;
                            }

                        } else {
                            $result['status'] = 'error';
                            $result['message'] = 'Неверный код подтверждения';
                        }
                    }
                } else {
                    $result['status'] = 'error';
                    $result['message'] = 'Попытка подтвердить номер телефона без отправленного сообщения';
                }
                $res->save();
                return $result;

            } else {
                $result['status'] = 'error';
                $result['message'] = 'Неверный номер телефона';
            }
        } else {
            $result['status'] = 'error';
            $result['message'] = 'Пользователь уже существует';
        }
        return $result;
    }

    public static function authorizeUser($phone)
    {
        global $USER;
        $result = '';
        $user = UserTable::query()
            ->setFilter(['PHONE_AUTH.PHONE_NUMBER' => $phone])
            ->setSelect(['ID', 'PHONE_AUTH.PHONE_NUMBER'])
            ->fetchObject();
        $id = $user->getId();
        if ($id) {
            $USER->Update($id, ['ACTIVE' => 'Y']);
            $USER->Authorize($id);
            $result = 'success';
        } else {
            $result = 'error';
        }
        return $result;
    }

}