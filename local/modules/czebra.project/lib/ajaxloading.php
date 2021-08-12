<?php
namespace Czebra\Project;

use Bitrix\Main\Web\Json;

class AjaxLoading
{
    public function getCryptComponent($name, $templateName, $params)
    {
        foreach ($params as $key => $value) {
            if (strripos($key, "PAGER") !== false) {
                unset($params[$key]);
            } elseif ($key[0] == "~") {
                unset($params[$key]);
            }
        }
        $params["COMPONENT_NAME"] = $name;
        $params["TEMPLATE_NAME"] = $templateName;
        if ($params["SHOW_ALL_WO_SECTION"] == "1") {
            $params["SHOW_ALL_WO_SECTION"] = "Y";
        }

        return self::getCryptArray($params);
    }

    public function getCryptArray($params)
    {
        $result = urlencode(base64_encode(gzcompress(Json::encode($params))));
        return $result;
    }

    public function getDecryptArray($strCrypt)
    {
        return Json::decode(gzuncompress(base64_decode(urldecode($strCrypt))));
    }
}