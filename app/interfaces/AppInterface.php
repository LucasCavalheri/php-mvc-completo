<?php

namespace app\interfaces;

interface AppInterface
{
    public function controller(): string;
    public function method($controller): string;
    public function params(): array;
}
