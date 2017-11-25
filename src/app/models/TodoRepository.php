<?php

class TodoRepository extends DbRepository
{
    public function insert($todo)
    {
        $now = new DateTime();
        $sql = "
                INSERT INTO todos(title, completed, created_at)
                    VALUES(:title, :completed, current_timestamp)
        ";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':title', $todo->title, PDO::PARAM_STR);
        $stmt->bindParam(':completed', $todo->completed, PDO::PARAM_BOOL);
        $stmt->execute();
        return $this->con->lastInsertId();
    }

    public function deleteTodo($id)
    {
        $stmt = $this->con->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function findTodo($id)
    {
        $stmt = $this->con->prepare("SELECT id, title, completed, created_at FROM todos WHERE id = :id ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        $row = $stmt->fetch();

        if ($row == null) {
            return null;
        }
        $todo = new Todo($row['id'], $row['title'], $row['completed'], $row['created_at']);
        return $todo;
    }

    public function fetchAllTodos()
    {
        $sql = "SELECT id, title, completed, created_at FROM todos ORDER BY id DESC";
        $list = $this->fetchAll($sql);
        $result = array();
        foreach ($list as $todo) {
            $result[] = new Todo($todo['id'], $todo['title'], $todo['completed'], $todo['created_at']);
        }
        return $result;
    }

    public function deleteAll()
    {
        $stmt = $this->con->prepare("truncate todos");
        $stmt->execute();
    }
}
