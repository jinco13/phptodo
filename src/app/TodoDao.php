<?php

namespace MyTodo;

class TodoDao
{
    public function __construct($user='docker', $pass='docker') {
        $dsn = "pgsql:host=localhost; port=5432; dbname=todos";
        try {
            $this->db = new \PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            throw $e;
        }
        $this->table = "todos";
    }

    public function insertTodoList($list) {
        $values_query = "";
        foreach ($list as $todo) {
            $values_query .= "('$todo->title', FALSE),";
        }
        $qry = rtrim($values_query, ",");
        $stmt = $this->db->prepare("INSERT INTO $this->table (title, completed) VALUES ".$qry.";");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function insertTodo($todo) {
        $stmt = $this->db->prepare("INSERT INTO $this->table (title, completed) VALUES ('$todo->title', FALSE);");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function __destruct() {
        $this->db = null;
    }
}
