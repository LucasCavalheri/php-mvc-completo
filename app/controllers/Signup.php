<?php

namespace app\controllers;

use app\classes\Validate;

class SignUp
{
    public string $view = '';
    public array $data = [];

    public function index()
    {
        $this->view = 'signup.php';
        $this->data = [
            'title' => 'Cadastrar'
        ];
    }

    public function store()
    {
        $validate = new Validate();
        $validate->handle([
            'firstName' => [REQUIRED],
            'lastName' => [REQUIRED],
            'email' => [REQUIRED, EMAIL],
            'password' => [REQUIRED, MAXLEN.':10'],
        ]);

        // if ($validate->errors) {

        // }

        // 
    }
}
