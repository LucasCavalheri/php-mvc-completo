<?php

namespace app\core;

use app\interfaces\ControllerInterface;

class AppExtract implements ControllerInterface
{
    private array $params = [];
    private int $sliceIndexStartFrom;

    public function controller(): string
    {
        return ControllerExtract::extract();
    }

    public function method($controller): string
    {
        [$method, $sliceIndexStartFrom] = MethodExtract::extract($controller);
        $this->sliceIndexStartFrom = $sliceIndexStartFrom;

        return $method;
    }

    public function params(): array
    {
        $uri = Uri::uri();

        $countUri = count($uri);

        $this->params = array_slice($uri, $this->sliceIndexStartFrom, $countUri);

        return $this->params;
    }
}
