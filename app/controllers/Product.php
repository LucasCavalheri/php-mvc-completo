<?php

namespace app\controllers;

class Product
{
    public array $data = [];
    public string $view = '';

    public function index(array $args)
    {
        var_dump($args);
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'Product'
        ];
    }

    public function edit(array $args)
    {
        var_dump($args);
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'Edit'
        ];
    }
}
