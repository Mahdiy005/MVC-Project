<?php

// ---------<><><><><><><><>----------
// All Method That Help You On Project
// ---------<><><><><><><><>----------

use Bug\View\View;

if(! function_exists('env'))
{
    function env(string $key, string $default = null)
    {
        return $_ENV[$key] ?? value($default);
    }
}

if(! function_exists('value'))
{
    function value(string $default)
    {
        return is_callable($default) ? $default() : $default;
    }
}

// get the root path from nested file 
if(! function_exists('base_path'))
{
    function base_path()
    {
        return dirname(__DIR__, 2) . '/';
    }
}


// make function that render view to make call use space once 
if(! function_exists('makeView'))
{
    function makeView($path, $options)
    {
        return View::make($path, $options);
    }
}
if(! function_exists('makeView'))
{
    function makeViewError($path, $options)
    {
        return View::makeError($path, $options);
    }
}