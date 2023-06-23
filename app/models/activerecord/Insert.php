<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;

class Insert implements ActiveRecordExecuteInterface
{
    public function execute(ActiveRecordInterface $activeRecordInterface): bool
    {
        $query = $this->createQuery($activeRecordInterface);

        $connection = Connection::connect();

        $prepare = $connection->prepare($query);
        return $prepare->execute($activeRecordInterface->getAttributes());
    }

    public function createQuery(ActiveRecordInterface $activeRecordInterface): string
    {
        try {
            $sql = "INSERT INTO {$activeRecordInterface->getTable()} (";
            $sql .= implode(', ', array_keys($activeRecordInterface->getAttributes())) . ') VALUES (';
            $sql .= ':' . implode(', :', array_keys($activeRecordInterface->getAttributes())) . ')';

            return $sql;
        } catch (\Throwable $th) {
            formatException($th);
        }
    }
}
