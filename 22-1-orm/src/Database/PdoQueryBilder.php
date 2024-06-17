<?php

namespace App\Database;

use App\Contracts\DatabaseConnectionInterface;

class PdoQueryBilder
{

    protected $table;
    protected $Connection;
    protected $condition;
    protected $value;

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

    public function where(string $coulm, string $value)
    {
        $this->condition[] = "{$coulm}=?";
        $this->value[] = $value;
        // $sql="UPDATE {$this->table} SET VAL";
        return $this;
    }

    public function update(array $data)
    {
        $felids = [];
        foreach ($data as $coulm => $value) {
            $felids[] = "{$coulm}='{$value}'";
        }
        $felids = implode(",", $felids);
        $condition = implode("and", $this->condition);

        $sql = "Update {$this->table} SET {$felids} WHERE {$condition}";
        $query = $this->Connection->prepare($sql);
        $query->execute($this->value);

        return $query->rowCount();
    }
}