<?php

namespace MyTodo;

class TodoDao
{
    function __construct($user='docker', $pass='docker') {
        $dsn = "pgsql:host=localhost; port=5432; dbname=todo";
        try {
            $this->db = new \PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    function insertTodoList($list) {
        $values_query = "";
        foreach ($list as $todo) {
            $values_query .= "(false, '$todo->title'),";
        }
        $qry = rtrim($values_query, ",");
        $stmt = $this->db->prepare("INSERT INTO todo (completed, title) VALUES ".$qry.";");
        $stmt->execute();
        return $stmt->rowCount();
    }

    function insertTodo($todo) {
        $stmt = $this->db->query("INSERT INTO todo (completed, title) VALUES (false, '$todo->title');");
        $stmt->execute();
        return $stmt->rowCount();
    }

    function __destruct() {
        $this->db = null;
    }
}
