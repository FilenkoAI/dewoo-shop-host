<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

class CCzebraEmptyComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if (!isset($arParams["CACHE_TIME"])) {
            $arParams["CACHE_TIME"] = 36000000;
        }

        return $arParams;
    }

    public function executeComponent()
    {
        if ($this->startResultCache()) {
            //$this->arResult =
            $this->includeComponentTemplate();
        }
        return $this->arResult;
    }
}
