<?php

namespace Czebra\Project\Controller;

use Bitrix\Main;
use Czebra\Project\CheckDelivery;

class SendAccount extends Main\Engine\Controller
{
    public function configureActions() : array
    {
        return [
            'sendaccount' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ]
        ];
    }

    public function sendAccountAction($orderId, $account)
    {

        return \Czebra\Project\AccountEmail\Email::sendEmail($orderId, $account);
    }

}