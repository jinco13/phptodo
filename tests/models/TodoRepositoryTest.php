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
    }

    public function testInsertTodo()
    {
        $id = $this->db_manager->get('Todo')->insert($this->todo);
        $this->assertNotNull($id);
    }
}
