<?php

namespace Czebra\Project;
use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;
global $cityInfo;
class SelectedShop
{
    const IBLOCK_ID = 28;
    public static function getShop()
    {
        $selectedShopId = self::getId();
        if (!$selectedShopId) {
            $arrShopFilter = [
                'IBLOCK_ID' => self::IBLOCK_ID,
                'ACTIVE' => "Y",
            ];
        } else {
            $arrShopFilter = [
                'ID' => $selectedShopId,
                'IBLOCK_ID' => self::IBLOCK_ID,
            ];
        }
        $result = [];
        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "IBLOCK_ID");
        $res = \CIBlockElement::GetList(Array(), $arrShopFilter, false, Array("nPageSize"=>50), $arSelect);
        if($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $result = [
                'NAME' => $arFields['NAME'],
                'NAME_SHORT' => mb_strimwidth($arFields['NAME'], 0, 20, "..."),
                'ID' => $arFields['ID']
            ];
        }
        return $result;
    }
    public static function getId(){
        global $USER, $APPLICATION, $cityInfo;

        if(!$USER->IsAuthorized()) // Для неавторизованного
        {
            $shopId = $APPLICATION->get_cookie("selected_shop");
        } else {
            $idUser = $USER->GetID();
            $rsUser = $USER->GetByID($idUser);
            $arUser = $rsUser->Fetch();
            $shopId = $arUser['UF_UF_SHOP'];

        }

        $arrShopFilter = [
            'IBLOCK_ID' => 28,
            'ACTIVE' => "Y",
            'PROPERTY_CITY.NAME' => $cityInfo['NAME']
        ];
        $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "IBLOCK_ID");
        $res = \CIBlockElement::GetList(array(), $arrShopFilter, false, array("nPageSize" => 50), $arSelect);
        $shopIds = [];
        while($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $shopIds[] = $arFields['ID'];
        }
        if(!in_array($shopId, $shopIds)) {
            return $cityInfo['DEFAULT_SHOP_ID'];
        } else {
            return $shopId;
        }

    }
    public function setShop($id){
        $application = Application::getInstance();
        $context = $application->getContext();
        global $USER;
        if (!$USER->IsAuthorized()) {
            $cookie = new Cookie("selected_shop", $id, time() + 60 * 60 * 24 * 60);
            $cookie->setDomain('daewoo-shop.com');
            $cookie->setHttpOnly(false);
            $context->getResponse()->addCookie($cookie);
            $context->getResponse()->flush("");
        } else {
            $idUser = $USER->GetID();
            $rsUser = new \CUser;
            $rsUser->Update($idUser, array("UF_UF_SHOP" => $id));
        }
    }
}