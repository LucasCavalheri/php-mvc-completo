<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateMaxLen implements ValidateInterface
{
    public function handle($field, $param)
    {
        $string = filter_input(INPUT_POST, $field);

        if ($string === '') {
            Flash::set($field, "O campo: {$field} obrigatório");
            return false;
        }

        if (strlen($string) > $param) {
            Flash::set($field, "O campo: {$field} deve ter no máximo {$param} caracteres");
            return false;
        }

        return $string;
    }
}
