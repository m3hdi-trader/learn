<?php

namespace App\Utilities;

use App\Utilities\Response;


class CacheUtilitiy
{
    protected static $cacheFile;
    protected static $cacheEnable = CACHE_ENABLE;
    const EXPIRE_TIME = 3600;
    public static function init()
    {
        self::$cacheFile = CACHE_DIR . md5($_SERVER['REQUEST_URI']) . ".json";
        if ($_SERVER['REQUEST_URI'] = !'GET') {
            self::$cacheEnable = 0;
        }
    }

    public static function  cacheExits()
    {

        return (file_exists(self::$cacheFile) && (time() - self::EXPIRE_TIME) < filemtime(self::$cacheFile));
    }

    public static function  start()
    {
        self::init();

        if (!self::$cacheEnable) {
            return;
        }
        if (self::cacheExits()) {
            Response::setHeaders();
            readfile(self::$cacheFile);
            exit;
        }
        ob_start();
    }
    public static function end()
    {
        if (!self::$cacheEnable) {
            return;
        }
        $cachedFile = fopen(self::$cacheFile, 'w');
        fwrite($cachedFile, ob_get_contents());
        fclose($cachedFile);
        ob_end_flush();
    }

    public static function flush()
    {
        $files = glob(CACHE_DIR . "*");
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file);
        }
    }
}
