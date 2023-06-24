<?php

function welcome($index)
{
    if (isset($_SESSION[$index])) {
        $user = $_SESSION[$index];
        return "<p>Bem vindo, {$user->firstName} {$user->lastName}! | <a href='login/destroy'>Logout</a></p>";
    }

    return '<p>Bem vindo, visitante!</p>';
}
