<?php

namespace app\core;

class AppExtract
{
    private array $uri = [];
    private string $controller = 'Home';

    public function controller(): string
    {
        $this->uri = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

        if (isset($this->uri[0]) && $this->uri[0] != '') {
            $this->controller = ucfirst($this->uri[0]);
        }

        $namespaceAndController = "app\\controllers\\{$this->controller}";

        if (class_exists($namespaceAndController)) {
            $this->controller = $namespaceAndController;
        }

        return $this->controller;
    }

    public function method()
    {
    }

    public function params()
    {
    }
}
