<?php


function siteUrl(string $uri = ''): string
{
    return BASE_URL . $uri;
}

function assets(string $path): string
{
    return siteUrl('/assets/' . $path);
}
