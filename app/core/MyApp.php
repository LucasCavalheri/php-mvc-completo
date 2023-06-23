<?php

namespace app\core;

use app\interfaces\ControllerInterface;

class MyApp
{
    private $controller;

    public function __construct(private ControllerInterface $controllerInterface)
    {
    }

    public function controller()
    {
        $controller = $this->controllerInterface->controller();
        $method = $this->controllerInterface->method();
        $params = $this->controllerInterface->params();

        $this->controller = new $controller;
        $this->controller->$method($params);
    }

    public function view()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (empty($this->controller->data)) {
                throw new \Exception('Controller precisa ter uma propriedade $data');
            }

            if (!array_key_exists('title', $this->controller->data)) {
                throw new \Exception('A propriedade $data precisa ter uma chave chamada title');
            }

            $viewsPath = '../app/views/';
            extract($this->controller->data);
            require '../app/views/index.php';
        }
    }
}
