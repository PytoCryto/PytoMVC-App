<?php
/*
 * Global functions cuz im lazy =D
*/
function timestamp_format($unix, $format)
{
    return date($format, $unix);
}

function replaceStr($str, $pattern)
{
    return str_repeat($pattern, strlen($str));
}

function getSelected($value, $expected, $attribute = 'selected', $default = '')
{
    return $value == $expected ? $attribute : $default;
}

function purify($html)
{
    return \Purifier::clean($html);
}

function autoVersionAsset($asset)
{
    $vars = [];

    foreach (config('template.assets_paths') as $key => $path) {
        // this allows for variable usage e.g:
        // {auto_version: $css/style.css}
        // where $css points to config('template.assets_paths.css')
        $vars['$' . $key] = $path;
    }

    $asset = str_replace(array_keys($vars), array_values($vars), $asset);

    $path = public_path(
        ltrim(str_replace(['/public', '$url'], '', $asset), '/')
    );

    $asset = str_replace('$url', config('app.url'), $asset);

    if (! file_exists($path)) {
        return $asset;
    }

    $version = md5(filemtime($path));

    return $asset . '?v=' . $version;
}
