<?php
class Url
{
    public static function getCurrent()
    {
        $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $url;
    }

    public static function segment($url = null)
    {
        if ($url == null) {
            $url = self::getCurrent();
        }
        $url = str_replace(['http://', 'https//'], '', $url);
        $segment = explode("/", $url);
        return $segment;
    }

    public static function parsms()
    {
        return $_REQUEST;
    }
}

var_dump(Url::getCurrent());
var_dump(Url::parsms());
var_dump(Url::segment());
