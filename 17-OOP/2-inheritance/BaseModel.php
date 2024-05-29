<?php
class BaseModel
{
    protected $db;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct()
    {
        try {
            $this->db = new pdo("mysql:dbname=auth;host:localhost", 'root', '');
            echo 'ok';
        } catch (PDOException $pe) {
            die('connnection failed:' . $pe->getMessage());
        }
    }

    public function find($id)
    {
        $sql = "select * from {$this->table} WHERE {$this->primaryKey}=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
