<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;

class Delete implements ActiveRecordExecuteInterface
{
    public function __construct(private string $field, private string|int $value)
    {
    }

    public function execute(ActiveRecordInterface $activeRecordInterface): int
    {
        try {
            $query = $this->createQuery($activeRecordInterface);

            $connection = Connection::connect();

            $prepare = $connection->prepare($query);
            $prepare->execute([
                $this->field => $this->value
            ]);

            return $prepare->rowCount();
        } catch (\Throwable $th) {
            formatException($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface): string
    {
        if ($activeRecordInterface->getAttributes()) {
            throw new \Exception("Para deletar não precisa passar atributos");
        }
        $sql = "DELETE FROM {$activeRecordInterface->getTable()} ";
        $sql .= " WHERE {$this->field} = :{$this->field}";

        return $sql;
    }
}
