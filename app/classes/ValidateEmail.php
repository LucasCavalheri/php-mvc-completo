<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateEmail implements ValidateInterface
{
    public function handle($field, $param)
    {
        $isEmail = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

        if (!$isEmail) {
            Flash::set($field, "O campo: {$field} não é um email válido");
            return false;
        }

        $string = filter_input(INPUT_POST, $field, FILTER_SANITIZE_EMAIL);

        if ($string === '') {
            Flash::set($field, "O campo: {$field} obrigatório");
            return false;
        }

        return $string;
    }
}
