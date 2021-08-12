<?php

namespace Czebra\Project\Controller;

use Bitrix\Main;
use Czebra\Project\CheckDelivery;

class CheckOrdering extends Main\Engine\Controller
{
    public function configureActions() : array
    {
        return [
            'checkdelivery' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ]
        ];
    }

    public function checkDeliveryAction() : array
    {
        return \Czebra\Project\CheckDelivery::checkDeliveryProperties();
    }

}