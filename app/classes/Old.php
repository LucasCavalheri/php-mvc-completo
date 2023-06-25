<?php

namespace app\classes;

class Old
{
    public static function set(string $key, string $value)
    {
        if (!isset($_SESSION['old'][$key])) {
            $_SESSION['old'][$key] = $value;
        }
    }

    public static function get(string $key)
    {
        if (isset($_SESSION['old'][$key])) {
            $flash = $_SESSION['old'][$key];
            unset($_SESSION['old'][$key]);

            return $flash;
        }
    }
}
