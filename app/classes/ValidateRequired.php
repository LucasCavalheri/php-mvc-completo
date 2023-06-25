<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateRequired implements ValidateInterface
{
    public function handle($field, $param)
    {
        $string = filter_input(INPUT_POST, $field, FILTER_DEFAULT);

        if ($string === '') {
            Flash::set($field, "O campo: {$field} obrigatório");
            return false;
        }

        Old::set($field, $string);

        return $string;
    }
}
