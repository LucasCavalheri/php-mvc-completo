<?php

namespace app\core;

use app\interfaces\ControllerInterface;

class AppExtract implements ControllerInterface
{
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
        return ParamsExtract::extract($this->sliceIndexStartFrom);
    }
}
