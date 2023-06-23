<?php

namespace app\controllers;

class Product
{
    public array $data = [];
    public string $view = '';

    public function index()
    {
    }

    public function edit(array $args)
    {
        $this->view = 'edit';
        $this->data = [
            'title' => 'Edit'
        ];
    }
}
