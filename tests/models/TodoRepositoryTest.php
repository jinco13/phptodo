<?php

class TodoRepositoryTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->db_manager = new DbManager();
        $this->db_manager->connect('master', array(
            'dsn'       => 'pgsql:dbname=todos;host=localhost',
            'user'      => 'docker',
            'password'  => 'docker',
        ));
        $this->todo = new Todo();
        $this->todo->title = "This is test name";
        $this->todo->completed = TRUE;
    }

    public function testInsertTodo()
    {
        $id = $this->db_manager->get('Todo')->insert($this->todo);
        $this->assertNotNull($id);
    }

    public function testFetchAllTodos()
    {
        $this->db_manager->get('Todo')->insert($this->todo);
        $list = $this->db_manager->get('Todo')->fetchAllTodos();
        $this->assertTrue(count($list) > 1);
    }

}
