<?php

namespace App\Database;

use App\Contracts\DatabaseConnectionInterface;
use PDO;

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
        $query = $this->Connection->prepare($sql);
        $query->execute(array_values($data));
        return (int)$this->Connection->lastInsertId();
    }

    public function where(string $coulm, string $value)
    {
        $this->condition[] = "{$coulm}=?";
        $this->value[] = $value;
        return $this;
    }

    public function update(array $data)
    {
        $felids = [];
        foreach ($data as $coulm => $value) {
            $felids[] = "{$coulm}='{$value}'";
        }
        $felids = implode(",", $felids);
        $condition = implode(" and ", $this->condition);

        $sql = "Update {$this->table} SET {$felids} WHERE {$condition}";
        $query = $this->Connection->prepare($sql);
        $query->execute($this->value);

        return $query->rowCount();
    }

    public function delete()
    {
        $condition = implode("and", $this->condition);

        $sql = "DELETE FROM {$this->table} WHERE {$condition}";
        $query = $this->Connection->prepare($sql);
        $query->execute($this->value);
        return $query->rowCount();
    }

    public function get(array $colums = ['*'])
    {
        $condition = implode("and", $this->condition);
        $colums = implode(",", $colums);
        $sql = "SELECT {$colums} FROM {$this->table} WHERE {$condition}";
        $query = $this->Connection->prepare($sql);
        $query->execute($this->value);
        return $query->fetchAll();
    }

    public function first($colums = ['*'])
    {
        $data = $this->get($colums);
        return empty($data) ? null : $data[0];
    }

    public function truncateAllTable()
    {
        $query = $this->Connection->prepare("SHOW TABLES");
        $query->execute();
        foreach ($query->fetchAll(PDO::FETCH_COLUMN) as $table) {
            $this->Connection->prepare("TRUNCATE TABLE `{$table}`")->execute();
        }
    }

    public function beginTransaction()
    {
        $this->Connection->beginTransaction();
    }

    public function rollback()
    {
        $this->Connection->rollback();
    }
}
