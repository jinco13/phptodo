<?php

namespace MyTodo\Models;
use PDOStatement\bindValue;
use PDO;

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

    public function getAllTodos() {
        $sth = $this->db->prepare("SELECT id, title, completed FROM todos");
        $sth->execute();
        $result = $sth->fetchAll();
        $list = [];
        foreach ($result as $todo) {
            $list[] = new Todo($todo['id'],$todo['title'],$todo['completed']);
        }
        return $list;
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
        $stmt = $this->db->prepare("INSERT INTO $this->table (title, completed) VALUES (:title, FALSE);");
        $stmt->bindValue(':title', $todo->title, PDO::PARAM_STR);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function __destruct() {
        $this->db = null;
    }
}
