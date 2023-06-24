<?php

namespace app\controllers;

use app\classes\Flash;
use app\models\activerecord\FindBy;
use app\models\User;

class Login
{
    public string $view = '';
    public array $data = [];

    public function index()
    {
        $this->view = 'login.php';
        $this->data = [
            'title' => 'Login',
        ];
    }

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($_POST['password']);

        $user = new User;
        $userFound = $user->execute(new FindBy('email', $email, 'firstName,lastName,password'));

        if (!$userFound) {
            Flash::set('login', 'Usuário ou senha inválidos');
            return redirect('login');
        }

        $passwordMatch = password_verify($password, $userFound->password);

        if (!$passwordMatch) {
            Flash::set('login', 'Usuário ou senha inválidos');
            return redirect('login');
        }

        unset($userFound->password);

        $_SESSION['user'] = $userFound;

        return redirect('/');
    }

    public function destroy()
    {
        // session_destroy(); //
        unset($_SESSION['user']);
        return redirect('/');
    }
}
