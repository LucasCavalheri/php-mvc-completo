<?php

namespace app\classes;

class BlockPostRequest
{
    public static function block()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'Você não tem permissão para fazer isso | <a href="/">Voltar</a>';
            die();
        }
    }
}
