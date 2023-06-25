<?php

namespace app\classes;

use app\interfaces\ControllerInterface;

class BlockNotLogged
{
    public static function block(ControllerInterface $controllerInterface, array $blockMethods)
    {
        $canBlockMethod = Block::getMethodsToBlock($controllerInterface, $blockMethods);

        if (!isset($_SESSION['user']) && $canBlockMethod) {
            BlockPostRequest::block();
            return redirect('/');
        }
    }
}
