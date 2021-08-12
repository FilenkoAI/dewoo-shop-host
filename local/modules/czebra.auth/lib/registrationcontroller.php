<?php

namespace Czebra\Auth;

use Czebra\Project\ORM\Pomade;

class RegistrationController
{
    public static function registerUser(
        $name,
        $phone,
        $email,
        $password,
        $confirmPassword,
        $regExp,
        $sendConfirm = true,
        $userGroups = []
    )
    {
        global $DB;
        global $USER;
        // проверить зачем это
        $bConfirmReq = (\COption::GetOptionString("main", "new_user_registration_email_confirmation", "N")) == "Y";
        $arFields = array(
            "NAME" => $name,
            "LOGIN" => \Bitrix\Main\Security\Random::getString(12),
            "LID" => SITE_ID,
            "ACTIVE" => "N",
            "EMAIL" => $email,
            "GROUP_ID" => $userGroups,
            "PASSWORD" => $password,
            "CONFIRM_PASSWORD" => $confirmPassword,
            "CHECKWORD" => md5(\CMain::GetServerUniqID() . uniqid()),
            "~CHECKWORD_TIME" => $DB->CurrentTimeFunction(),
            // проверить зачем это
            "CONFIRM_CODE" => $bConfirmReq ? randString(8) : "",
            "PHONE_NUMBER" => $phone,
        );

        $CUser = new \CUser;
        $USER_ID = $CUser->Add($arFields);
        if(intval($USER_ID) > 0) {
            $result['success'] = true;
//            $USER->Authorize($USER_ID);
        } else {
            $result['success'] = false;
            $result['error'] = html_entity_decode($CUser->LAST_ERROR);
        }

        return $result;
    }
}