<?php

namespace app\core;

use app\interfaces\ControllerInterface;

class AppExtract implements ControllerInterface
{
    private array $uri = [];
    private array $params = [];
    private string $method = 'index';
    private int $sliceIndexStartFrom = 2;

    public function controller(): string
    {
        return ControllerExtract::extract();
    }

    public function method($controller): string
    {
        if (isset($this->uri[1])) {
            $this->method = strtolower($this->uri[1]);
        }

        if ($this->method == '') {
            $this->method = 'index';
        }

        if (!method_exists($controller, $this->method)) {
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
