<?php

namespace app\controllers;

use app\models\activerecord\FindAll;
use app\models\User;

class Home
{
    public array $data = [];
    public string $view = '';

    public function index()
    {
        $users = (new User)->execute(new FindAll(fields: 'id,firstName,lastName'));

        $this->view = 'home.php';
        $this->data = [
            'title' => 'Home',
            'users' => $users,
        ];
    }
}
