<?php

function resolve_asset($url)
{
    return (env('APP_ENV') === 'production') ? asset($url, true) : asset($url);
}