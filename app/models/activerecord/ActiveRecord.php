<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use ReflectionClass;

abstract class ActiveRecord implements ActiveRecordInterface
{
    protected $table = null;
    protected $attributes = [];

    public function __construct()
    {
        if (!$this->table) {
            $this->table = strtolower((new ReflectionClass($this))->getShortName());
        }
    }

    public function __set(string $attribute, string $value): void
    {
        $this->attributes[$attribute] = $value;
    }

    public function __get(string $attribute): string
    {
        return $this->attributes[$attribute];
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function execute(ActiveRecordExecuteInterface $activeRecordExecuteInterface)
    {
        return $activeRecordExecuteInterface->execute($this);
    }
}
