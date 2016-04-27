<?php

function is_prod()
{
    return env('APP_ENV') === 'production';
}

function resolve_asset($url)
{
    return is_prod() ? asset($url, true) : asset($url);
}

function resolve_url($url)
{
    return is_prod() ? url($url, [], true) : url($url);
}
