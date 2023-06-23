<?php

namespace app\core;

class ParamsExtract
{
    public static function extract($sliceIndexStartFrom): array
    {
        $uri = Uri::uri();
        $countUri = count($uri);

        return array_slice($uri, $sliceIndexStartFrom, $countUri);
    }
}
