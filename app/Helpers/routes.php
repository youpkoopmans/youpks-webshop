<?php

if (!function_exists('route_backend')) {
    /**
     * @param $file
     * @return string
     */
    function route_backend($file)
    {
        return __DIR__ . '/../../routes/backend/' . $file;
    }
}

if (!function_exists('route_frontend')) {
    /**
     * @param $file
     * @return string
     */
    function route_frontend($file)
    {
        return __DIR__ . '/../../routes/frontend/' . $file;
    }
}


