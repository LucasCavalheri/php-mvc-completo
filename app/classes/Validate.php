<?php

namespace app\classes;

class Validate
{
    public function handle(array $validations)
    {
        foreach ($validations as $field => $validation) {
            foreach ($validation as $classValidate) {
                $namespace = "app\\classes\\";

                $class = $namespace . $classValidate;

                if (str_contains($class, ':')) {
                    [$class, $param] = explode(':', $class);
                    var_dump($class);
                }


                if (class_exists($class)) {
                    // var_dump('Classe Existe');
                }
            }
        }
    }
}
