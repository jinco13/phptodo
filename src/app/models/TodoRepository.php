<?php

class TodoRepository extends DbRepository
{
    public function insert($todo)
    {
        $now = new DateTime();
        $sql = "
                INSERT INTO todos(title, completed)
                    VALUES(:title, :completed)
        ";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':title', $todo->title, PDO::PARAM_STR);
        $stmt->bindParam(':completed', $todo->completed, PDO::PARAM_BOOL);
        $stmt->execute();
        return $this->con->lastInsertId();
    }

    public function fetchAllTodos()
    {
        $sql = "SELECT id, title, completed FROM todos";
        $list = $this->fetchAll($sql);
        return $list;
    }

    public function deleteAll()
    {
        $stmt = $this->con->prepare("truncate todos");
        $stmt->execute();
    }
}
