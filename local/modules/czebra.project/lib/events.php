<?php
namespace Czebra\Project;

use Bitrix\Main\EventManager;

class Events
{
    public function create()
    {
        $eventManager = EventManager::getInstance();

        //Удаляем type= text/javascript из страницы
        $eventManager->addEventHandler("main", "OnEndBufferContent", array("Czebra\\Project\\Base\\Content", "DeleteJSType"));

        //Выставляем глобальную переменную $cityInfo с информацией о текущем городе
        $eventManager->addEventHandler("main", "OnProlog", array("Czebra\\Project\\City", "get"));

        $eventManager->addEventHandler("iblock", "OnBeforeIBlockElementAdd", array("Czebra\\Project\\ModalDate", "addDate"));

        //Отслеживаем переход пользователя по оформлению заказа
//        $eventManager->addEventHandler("main", "OnProlog", array("Czebra\\Project\\Ordering", "init"));

        // перед сохранением заказа
        $eventManager->addEventHandler("sale", "OnSaleOrderBeforeSaved", array("Czebra\\Project\\OrderHandler", "Clear"));

        //удаление типа доставки после изменения корзины
        $eventManager->addEventHandler("sale", "OnBasketAdd", array("Czebra\\Project\\OrderHandler", "RemoveDeliveryType"));

        // добавляем превью после сохранения видео
        $eventManager->addEventHandler("iblock", "OnAfterIBlockElementAdd", array("Czebra\\Project\\YoutubeVideo", "addPreview"));

//         модифицируем данные для шаблона письма
        $eventManager->addEventHandler('sale', 'OnOrderNewSendEmail', array("Czebra\\Project\\EmailModified", 'Init'));
    }
}
