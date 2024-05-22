<?php
defined('BASE_PATH') or die("Permision Denied!");

function diePage($msg)
{
    echo "<div style ='padding: 30px; width: 80%; margin: 50px auto; background: #fad7d7; border: 1px solid #cca4a4; color: #521717; border-radius: 5px; font-family: sans-serif;'>$msg</div>";
    die();
}
function message($msg, $cssClass = 'green')
{
    echo "<div style='width: 20%;position: absolute;z-index: 999;'><div style='padding: 22px;margin-left: 16px;' class='w3-panel w3-$cssClass w3-round'>$msg</div></div>";
}

function siteUrl($uri = '')
{
    return BASE_URL . $uri;
}

function isAjaxRequest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        //request is ajax
        return true;
    }
    return false;
}


function dd($var)
{
    echo "<pre style='color: #9c4100; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
    var_dump($var);
    echo "</pre>";
}

function ddd($var)
{
    echo "<pre style='color: #9c4100; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
    var_dump($var);
    echo "</pre>";
    die();
}
