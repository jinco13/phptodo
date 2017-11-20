<?php

class TodoDaoTest extends \PHPUnit\Framework\TestCase
{
    function setUp()
    {
        $this->markTestSkipped('must be revisited.');
        $this->target = new TodoDao('localhost');
    }

    function testGetTodos()
    {
        $todo1 = new Todo(); $todo1->title = "todo1";
        $todo2 = new Todo(); $todo2->title = "todo2";
        $list = [];
        array_push($list, $todo1, $todo2);
        $this->target->insertTodoList($list);
        $result = $this->target->getAllTodos();
        $this->assertEquals("todo1", $result[1]->title);
    }

    function testInsertTodo()
    {
        $this->todo = new Todo();
        $this->todo->title = "test todo";
        $inserted = $this->target->insertTodo($this->todo);
        $this->assertInternalType("string", $inserted);
    }

    function testInsertErrorStringTodo()
    {
        $this->todo = new Todo();
        $this->todo->title = "test '; show tables;";
        $inserted = $this->target->insertTodo($this->todo);
        $this->assertInternalType("string", $inserted);
    }

    function testInsertTodoList()
    {
        $todo1 = new Todo(); $todo1->title = "todo1";
        $todo2 = new Todo(); $todo2->title = "todo2";
        $list = [];
        array_push($list, $todo1, $todo2);
        $count = $this->target->insertTodoList($list);
        $this->assertEquals(2, $count);
    }

    function testDatabaseConnection()
    {
        $this->assertNotNull($this->target->db);
    }

    function tearDown()
    {
        $this->target->db->query("truncate todos");
    }

}
