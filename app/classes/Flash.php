<?php

namespace app\classes;

class Flash
{
    public static function set(string $key, string $message, string $alert = 'danger')
    {
        if (!isset($_SESSION['messages'][$key])) {
            $_SESSION['messages'][$key] = [
                'message' => $message,
                'alert' => $alert,
            ];
        }
    }

    public static function get(string $key)
    {
        if (isset($_SESSION['messages'][$key])) {
            $flash = $_SESSION['messages'][$key];
            unset($_SESSION['messages'][$key]);

            return $flash;
        }
    }
}
