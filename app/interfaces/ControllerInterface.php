<?php

namespace app\interfaces;

interface ControllerInterface
{
    public function controller(): string;
    public function method(): string;
    public function params(): array;
}
