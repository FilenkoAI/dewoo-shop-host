<?php

namespace Czebra\Project\Controller;

use Bitrix\Main;
use Bitrix\Sale;

class Basket extends Main\Engine\Controller
{
    public function configureActions()
    {
        return [
            'get' => [
                '-prefilters' => [
                    \Bitrix\Main\Engine\ActionFilter\Authentication::class,
                    \Bitrix\Main\Engine\ActionFilter\Csrf::class
                ],
            ]
        ];
    }

    public function getAction()
    {
        if (Main\Loader::includeModule("sale")) {
            $basket = Sale\Basket::loadItemsForFUser(
                Sale\Fuser::getId(),
                Main\Context::getCurrent()->getSite()
            );
            $data = [];
            foreach ($basket as $item) {
                $data[] = $item->getProductId();
            }
        } else {
            return false;
        }
        return $data;
    }
}