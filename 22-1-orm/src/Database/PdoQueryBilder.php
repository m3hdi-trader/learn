<?php

namespace App\Database;

use App\Contracts\DatabaseConnectionInterface;

class PdoQueryBilder
{

    protected $table;
    protected $Connection;
    public function __construct(DatabaseConnectionInterface $Connection)
    {
        $this->Connection = $Connection->getConnection();
    }



    public function table(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function create(array $data)
    {
        $placeholder = [];
        foreach ($data as $coulm => $value) {
            $placeholder[] = '?';
        }
        $fileds = implode(',', array_keys($data));
        $placeholder = implode(',', $placeholder);
        $sql = "INSERT INTO {$this->table} ({$fileds}) VALUES({$placeholder})";
        // var_dump($sql);
        $query = $this->Connection->prepare($sql);
        $query->execute(array_values($data));
        return (int)$this->Connection->lastInsertId();
    }
}
