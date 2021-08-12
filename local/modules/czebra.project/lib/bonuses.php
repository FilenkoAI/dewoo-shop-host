<?php
namespace Czebra\Project;

use \Bitrix\Main\Application;
use \Bitrix\Main\UserTable;

class Bonuses
{
    const URL_GET_USER_BONUS_INFO = 'http://dw.k-n-d.ru:63556/daewoo/hs/DaewooAPI/V1/User/';

    public static function getUserBonusInfoByPhone($phone)
    {
        $params = ['Tel' => $phone];
        $jsonUserBonusInfo = self::getResponse(self::URL_GET_USER_BONUS_INFO, $params);
        return $jsonUserBonusInfo;
    }

    public static function getUserBonusesByPhone($phone)
    {
        $jsonUserBonusInfo = self::getUserBonusInfoByPhone($phone);
        if($jsonUserBonusInfo === false) {
            return false;
        }
        $arUserBonusInfo  = \Bitrix\Main\Web\Json::decode($jsonUserBonusInfo);
        $bonuses = (!$arUserBonusInfo['error']) ? $arUserBonusInfo['Points'] : false;
        return $bonuses;
    }

    public static function getUserBonusInfoByCurrentUser()
    {
        global $USER;
        $userId = $USER->GetId();
        $arUser = UserTable::query()
            ->setFilter(['ID' => $userId])
            ->setSelect(['ID', 'PHONE_AUTH.PHONE_NUMBER'])
            ->fetch();
        $phone = preg_replace('/[^0-9]/', '', $arUser['MAIN_USER_PHONE_AUTH_PHONE_NUMBER']);
        $arUserBonusInfo = \Bitrix\Main\Web\Json::decode(self::getUserBonusInfoByPhone($phone));
        return (!$arUserBonusInfo['error']) ? $arUserBonusInfo : false;
    }

    //Получаем список пользователей, которым начислены бонусы
    public static function getUsersWhithBonuses($excludingId = false)
    {
        $allUsers = UserTable::query()
            ->setFilter(['!PHONE_AUTH.PHONE_NUMBER' => false, '!ID' => $excludingId])
            ->setSelect(['ID', 'PHONE_AUTH.PHONE_NUMBER'])
            ->fetchAll();

        $usersWhithBonuses = [];
        foreach ($allUsers as $user) {
            $phone = preg_replace('/[^0-9]/', '', $user['MAIN_USER_PHONE_AUTH_PHONE_NUMBER']);
            $bonuses = self::getUserBonusesByPhone($phone);

            if($bonuses !== false) {
                $usersWhithBonuses[$user['ID']] = ['ID' => $user['ID'], 'PHONE' => $user['MAIN_USER_PHONE_AUTH_PHONE_NUMBER'], 'BONUSES' => $bonuses];
            }
        }
        return $usersWhithBonuses;
    }

    //Получам список пользователей из счетов на сайте
    public static function getUsersWhithBonusesInAccounts()
    {
        $idUsersWhithBonuses = [];
        $usersWhithBonuses = [];
        $resAccount = \CSaleUserAccount::GetList([], [], false, false, ['CURRENT_BUDGET', 'USER_ID']);
        while ($arAccount = $resAccount -> GetNext()) {
            $usersWhithBonuses[$arAccount['USER_ID']] = ['ID' => $arAccount['USER_ID'], 'BONUSES' => $arAccount['CURRENT_BUDGET']];
            $idUsersWhithBonuses[$arAccount['USER_ID']] = $arAccount['USER_ID'];
        }

        $allUsers = UserTable::query()
            ->setFilter(['ID' => $idUsersWhithBonuses])
            ->setSelect(['ID', 'PHONE_AUTH.PHONE_NUMBER'])
            ->fetchAll();

        foreach ($allUsers as $user) {
            $phone = preg_replace('/[^0-9]/', '', $user['MAIN_USER_PHONE_AUTH_PHONE_NUMBER']);
            $bonuses = self::getUserBonusesByPhone($phone);

            if($bonuses !== false) {
                $usersWhithBonuses[$user['ID']] = ['ID' => $user['ID'], 'PHONE' => $user['MAIN_USER_PHONE_AUTH_PHONE_NUMBER'], 'SUM' => $bonuses - $usersWhithBonuses[$user['ID']]['BONUSES']];
            }
        }
        return $usersWhithBonuses;
    }

    //Добавляем счета тем пользователям, у которых есть бонусы, и обновляем если они уже существуют
    public static function setBonusesInAccounts()
    {
        $usersUpdateAccounts = self::getUsersWhithBonusesInAccounts();

        foreach ($usersUpdateAccounts as $userUpdateAccount) {
            if($userUpdateAccount['SUM'] != 0){
                \CSaleUserAccount::UpdateAccount(
                    $userUpdateAccount['ID'],
                    $userUpdateAccount['SUM'],
                    'RUB',
                    ($userUpdateAccount['SUM'] > 0) ? 'Начисление' : 'Списание'
                );
            }
        }

        $idUsersUpdateAccounts = array_column($usersUpdateAccounts, 'ID');
        $usersAddAccounts = self::getUsersWhithBonuses($idUsersUpdateAccounts);

        foreach ($usersAddAccounts as $userAddAccount) {
            $arFields = Array('USER_ID' => $userAddAccount['ID'], 'CURRENCY' => 'RUB', 'CURRENT_BUDGET' => $userAddAccount['BONUSES']);
            $accountID = \CSaleUserAccount::Add($arFields);
        }
        return true;
    }

    //Агент для обновления счетов пользователей
    public static function agentSetBonusesInAccounts()
    {
        self::setBonusesInAccounts();
        return 'Czebra\Project\Bonuses::agentSetBonusesInAccounts();';
    }

    //Общий метод для запросов
    public static function getResponse($url, $params)
    {
        $httpClient = new \Bitrix\Main\Web\HttpClient();
        $httpClient->setHeader('Content-Type', 'application/json', 'charset=UTF-8', true);
        $response = $httpClient->get($url . "?" . http_build_query($params));
        $status = $httpClient->getStatus();
        $response = ($status == 200) ? $response : false;
        return $response;
    }


}