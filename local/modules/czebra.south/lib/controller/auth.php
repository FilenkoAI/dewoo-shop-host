<?php

namespace Czebra\South\Controller;

use Bitrix\Main;
use Bitrix\Sale;
use Czebra\South;

class Auth extends Main\Engine\Controller
{
    public function configureActions()
    {
        return [
            'sendCode' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ],
            'checkCode' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ],
            'register' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ]
        ];
    }

    public function sendCodeAction($phone, $register = 'N')
    {
        $phone = trim($phone);
        $replace = [" ", "(", ")", "-"];
        $phone = str_replace($replace, "", $phone);

        return South\Methods::sendCode($phone, $register);

    }

    public function checkCodeAction($phone, $code)
    {
        if ( check_bitrix_sessid() ) {
            $phone = trim($phone);
            $code = trim($code);
            $replace = [" ", "(", ")", "-"];
            $phone = str_replace($replace, "", $phone);

            return South\Methods::checkHashCode($phone, $code);

        } else {

            return false;

        }
    }

    public function registerAction($phone, $name, $email, $code)
    {
        if ( check_bitrix_sessid() ) {
            $phone = trim($phone);
            $code = trim($code);
            $replace = [" ", "(", ")", "-"];
            $phone = str_replace($replace, "", $phone);

            return South\Methods::registerUser($phone, $name, $email, $code);

        } else {

            return false;

        }
    }
}