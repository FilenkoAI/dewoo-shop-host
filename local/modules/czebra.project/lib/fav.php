<?php


namespace Czebra\Project;

class Fav
{
    public static function getList(){
        global $USER;
        if(!$USER->IsAuthorized()) // Для неавторизованного
        {
            $favorites = unserialize(\Bitrix\Main\Application::getInstance()->getContext()->getRequest()->getCookie("favorites"));
        }
        else {
            $idUser = $USER->GetID();
            $rsUser = \CUser::GetByID($idUser);
            $arUser = $rsUser->Fetch();
            $favorites = $arUser['UF_FAVORITES'];

        }
        $arr = explode(',', str_replace(['[', ']', '"'], '', json_encode($favorites)));
        foreach($arr as &$item){
            $item = intval($item);
        }
        return $arr;
    }
}