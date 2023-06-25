<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateRequired implements ValidateInterface
{
    public function handle($field, $param)
    {
        $string = filter_input(INPUT_POST, $field);

        if ($string === '') {
            Flash::set($field, "O campo: {$field} obrigatório");
            return false;
        }

        return $string;
    }
}
