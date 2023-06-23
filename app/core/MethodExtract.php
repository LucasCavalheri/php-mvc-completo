<?php

namespace app\core;

class MethodExtract
{
    public static function extract($controller)
    {
        $uri = Uri::uri();

        $method = 'index';
        $sliceIndexStartFrom = 2;

        if (isset($uri[1])) {
            $method = strtolower($uri[1]);
        }

        if ($method == '') {
            $method = 'index';
        }

        if (!method_exists($controller, $method)) {
            $method = 'index';
            $sliceIndexStartFrom = 1;
        }

        return [
            $method,
            $sliceIndexStartFrom,
        ];
    }
}
