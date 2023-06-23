<?php

namespace app\controllers;

class Home
{
    public array $data = [];
    public string $view = '';

    public function index()
    {
        $this->view = 'home.php';
        $this->data = [
            'title' => 'Home',
            'name' => 'Lucas'
        ];
    }
}
