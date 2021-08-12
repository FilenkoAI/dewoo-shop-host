<?php

namespace Czebra\Project;

use \Bitrix\Main\Application;

class Share
{
    private static function getFullUrl($isUri = true)
    {
        $context = Application::getInstance()->getContext();
        $server = $context->getServer();
        $request = $context->getRequest();

        $result = "";
        $result = $request->isHttps() ? "https://" : "http://";
        $result .= $server->getHttpHost();
        if ($isUri) {
            $result .= $request->getRequestUri();
        }

        return $result;
    }

    public static function getVK()
    {
        $url = "https://vk.com/share.php";
        $url .= "?url=" . self::getFullUrl();
        return $url;
    }

    public static function getFacebook()
    {
        $url = "https://www.facebook.com/sharer.php";
        $url .= "?u=" . self::getFullUrl();
        return $url;
    }

    public static function getTwitter()
    {
        $url = "https://twitter.com/intent/tweet";
        $url .= "?url=" . self::getFullUrl();
        return $url;
    }

    public static function getOpenGraph($title = '', $desc, $image)
    {
        global $APPLICATION;
        $title = $title ?: $APPLICATION->GetTitle();
        $titleCode = urlencode(base64_encode(gzcompress(json_encode(array("TEXT" => $title)))));
        $domen = self::getFullUrl(false);
        $name = 'Интернет-магазин DAEWOO POWER PRODUCTS';
        $result = '<meta property="og:site_name" content="'.$name.'">';
        $result .= '<meta property="og:url" content="' . self::getFullUrl() . '"';
        $result .= '<meta property="og:type" content="website">';
        $result .= '<meta property="fb:app_id" content="139243947771039">';
//        $result .= '<meta property="og:image:width" content="1200">';
//        $result .= '<meta property="og:image:height" content="630">';
        $result .= '<link rel="image_src" href="' . $domen . $image . '">';
        $result .= '<meta property="og:image" content="' . $domen . $image . '">';
        $result .= '<meta property="og:title" content="' . $title . '">';
        $result .= '<meta property="og:description" content="'.$desc.'" >';

        $APPLICATION->SetPageProperty("czebra_open_graph", $result);
    }

    public static function getImage()
    {
        $request = Application::getInstance()->getContext()->getRequest();
        if(empty($request["arParams"])){
            return false;
        }

        $arParams = (array) json_decode(gzuncompress(base64_decode(($request["arParams"]))));

        $text = $arParams['TEXT'];

        $arString = array();
        $arText = explode(" ", $text);
        $str_tmp = "";
        foreach ($arText as $word) {
            if (strlen($str_tmp . $word) < 33) {
                $str_tmp .= " " . $word;
            } else {
                $arString[] = $str_tmp;
                $str_tmp = " " . $word;
            }
        }
        $arString[] = $str_tmp;

        $start = 250;
        if (count($arString) == 2) {
            $start = 250;
        } elseif (count($arString) == 3) {
            $start = 220;
        } elseif (count($arString) == 4) {
            $start = 200;
        } elseif (count($arString) >= 5) {
            $start = 165;
        }


        $iSize = 32;
        $font = $_SERVER['DOCUMENT_ROOT'] . "/local/templates/lgbt_portal/front/fonts/Exo2-Regular.ttf";
        $pic = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'] . "/bitrix/ajax/images/pattern.png");

        if ($pic) {
            $white = imagecolorallocate($pic, 0, 0, 0);

            foreach ($arString as $str) {
                imagettftext($pic, $iSize, 0, 50, $start, $white, $font, $str);
                $start += 50;
            }

            header('Content-Type: image/png');
            imagepng($pic);
            imagedestroy($pic);
        }
    }
}
