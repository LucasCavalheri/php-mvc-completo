<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class Validate
{
    public bool $errors = false;
    public array $data = [];

    private function executeClass(ValidateInterface $validateInterface, $field, $param)
    {
        $validateInterface->handle($field, $param);
    }

    private function validationInstance(string $field, array $validations)
    {
        foreach ($validations as $classValidate) {
            $namespace = "app\\classes\\";

            $class = $namespace . $classValidate;

            [$class, $param] = $this->classWithColon($class);

            if (class_exists($class)) {
                $this->data[$field] = $this->executeClass(new $class, $field, $param);
            }
        }
    }

    private function classWithColon($class)
    {
        if (str_contains($class, ':')) {
            [$class, $param] = explode(':', $class);
        }

        return [$class, $param ?? null];
    }

    public function handle(array $validations)
    {
        foreach ($validations as $field => $validation) {
            $this->validationInstance($field, $validation);
        }

        if (in_array(false, $this->data)) {
            $this->errors = true;
        }
    }
}
