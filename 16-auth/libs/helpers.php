<?php


function siteUrl(string $uri = ''): string
{
    return BASE_URL . $uri;
}

function assets(string $path): string
{
    return siteUrl('/assets/' . $path);
}


function redirect(string $target = BASE_URL): void
{
    header('Location:' . $target);
    die();
}

function setErrorAndRedirect(string $message, string $target = BASE_URL): void
{
    $_SESSION['error'] = $message;
    redirect(siteUrl($target));
}
