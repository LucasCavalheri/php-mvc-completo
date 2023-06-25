<?php

namespace app\classes;

use app\core\MethodExtract;
use app\interfaces\ControllerInterface;

class Block
{
    public static function getMethodsToBlock(ControllerInterface $controllerInterface, array $blockMethods)
    {
        $methods = get_class_methods($controllerInterface);

        [$actualMethod] = MethodExtract::extract($controllerInterface);

        $blockMethod = false;

        foreach ($methods as $method) {
            if (in_array($method, $blockMethods) && $actualMethod === $method) {
                $blockMethod = true;
            }
        }

        return $blockMethod;
    }
}
