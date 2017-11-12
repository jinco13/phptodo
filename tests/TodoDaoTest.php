<?php

namespace MyTodo;

class TodoDaoTest extends \PHPUnit\Framework\TestCase
{
    function setUp() {
        $this->target = new TodoDao();
        $this->todo = new Todo();
        $this->todo->title = "test todo";
    }

    function testInsertTodo() {
        $count = $this->target->insertTodo($this->todo);
        $this->assertEquals(1, $count);
    }

    function testInsertTodoList() {
        $todo1 = new Todo(); $todo1->title = "todo1";
        $todo2 = new Todo(); $todo2->title = "todo2";
        $list = [];
        array_push($list, $todo1, $todo2);
        $count = $this->target->insertTodoList($list);
        $this->assertEquals(2, $count);
    }

    function testDatabaseConnection() {
        $this->assertNotNull($this->target->db);
    }

    function tearDown() {
        $this->target->db->query("truncate todo");
    }

}
