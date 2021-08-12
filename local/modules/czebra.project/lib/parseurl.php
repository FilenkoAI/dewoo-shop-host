<?php
namespace Czebra\Project;
class ParseUrl
{
    public static function addParam($url, $paramsAdd = [])
    {
        $params = parse_url($url)['query'];
        $path = parse_url($url)['path'];
        parse_str($params, $paramsArray);
        foreach ($paramsAdd as $key => $param) {
            $paramsArray[$key] = $param;
        }
        return $path . '?' . http_build_query($paramsArray);
    }

}