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
    protected $statement;

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
        foreach ($data as $coulm => $values) {
            $placeholder[] = ' ? ';
        }
        $fileds = implode(',', array_keys($data));
        $placeholder = implode(',', $placeholder);
        $this->value = array_values($data);
        $sql = "INSERT INTO {$this->table} ({$fileds}) VALUES({$placeholder})";
        $this->execute($sql);

        return (int)$this->Connection->lastInsertId();
    }

    public function where(string $coulm, string $value)
    {
        if (is_null($this->condition)) {
            $this->condition = "{$coulm}=?";
        } else {
            $this->condition .= " AND {$coulm}=?";
        }
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
        $this->condition;
        $sql = "Update {$this->table} SET {$felids} WHERE {$this->condition}";
        $this->execute($sql);
        return $this->statement->rowCount();
    }

    public function delete()
    {
        $this->condition;

        $sql = "DELETE FROM {$this->table} WHERE {$this->condition}";
        $this->execute($sql);
        return $this->statement->rowCount();
    }

    public function get(array $colums = ['*'])
    {
        $this->condition;
        $colums = implode(",", $colums);
        $sql = "SELECT {$colums} FROM {$this->table} WHERE {$this->condition}";
        $this->execute($sql);
        return $this->statement->fetchAll();
    }

    public function first($colums = ['*'])
    {
        $data = $this->get($colums);
        return empty($data) ? null : $data[0];
    }

    public function find(int $id)
    {
        return $this->where('id', $id)->first();
    }

    public function findBy(string $colum, $value)
    {
        return $this->where($colum, $value)->first();
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

    private function execute($sql)
    {
        $this->statement = $this->Connection->prepare($sql);
        $this->statement->execute($this->value);
        $this->value = [];
        return $this;
    }
}
