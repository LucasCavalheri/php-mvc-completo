<?php

namespace app\core;

class AppExtract
{
    private array $uri = [];
    private array $params = [];
    private string $method = 'index';
    private string $controller = 'Home';
    private int $sliceIndexStartFrom = 2;

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

    public function method(): string
    {
        if (isset($this->uri[1])) {
            $this->method = strtolower($this->uri[1]);
        }

        if ($this->method == '') {
            $this->method = 'index';
        }

        if (!method_exists($this->controller, $this->method)) {
            $this->method = 'index';
            $this->sliceIndexStartFrom = 1;
        }

        return $this->method;
    }

    public function params(): array
    {
        $countUri = count($this->uri);

        $this->params = array_slice($this->uri, $this->sliceIndexStartFrom, $countUri);

        return $this->params;
    }
}
