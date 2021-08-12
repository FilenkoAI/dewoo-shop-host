<?php

namespace Czebra\Project\AccountEmail;

use \Bitrix\Main\Context;
use \Bitrix\Sale;
use \Bitrix\Main;

class Email
{
    const SEND_TIMEOUT = 86000;
    const SEND_INTERVAL = 3600;
    const MESSAGES_MAX_COUNT = 3;

    public static function sendEmail($orderId, $account)
    {
        $result = [];
        if($account) {

            $ip = $_SESSION['SESS_IP'];
            $res = \Czebra\Project\AccountEmail\IpTable::getByPrimary($orderId)->fetchObject();

            if($res === null) {
                \Czebra\Project\AccountEmail\IpTable::add(['ORDER_ID' => $orderId]);

            } else {
                $lastSent = $res->getDateLastSent()->getTimestamp();
                $secondsPast = (new \Bitrix\Main\Type\DateTime())->getTimestamp() - $lastSent;
                if($res->getMessagesSentCount() < self::MESSAGES_MAX_COUNT) {
                    if($secondsPast > self::SEND_INTERVAL) {
                        $res->setDateLastSent(new \Bitrix\Main\Type\DateTime());
                        $res->setMessagesSentCount(0);
                    } else {
                        $res->setDateLastSent(new \Bitrix\Main\Type\DateTime());
                        $res->setMessagesSentCount($res->getMessagesSentCount() + 1);
                    }
                } else {
                    if($secondsPast > self::SEND_TIMEOUT) {
                        $res->setMessagesSentCount(0);
                        $res->setDateLastSent(new \Bitrix\Main\Type\DateTime());

                    } else {
                        $result['status'] = 'error';
                    }

                }

                $res->save();
            }
            if ($result['status'] !== 'error'){
                self::process($orderId, $account);
            }


        }
        return $result;

    }

    private static function process($orderId, $account)
    {

        $order = Sale\Order::load($orderId);
        $propertyCollection = $order->getPropertyCollection();
        $emailPropValue = $propertyCollection->getUserEmail();
        if($emailPropValue) {

            $email = $emailPropValue->getValue();
            \Bitrix\Main\Mail\Event::sendImmediate([
                "EVENT_NAME" => "SEND_ACCOUNT",
                "LID" => \Bitrix\Main\Context::getCurrent()->getSite(),
                "C_FIELDS" => [
                    "EMAIL" => $email,
                    "ACCOUNT" => $account
                ],

            ]);
        }

    }
}
