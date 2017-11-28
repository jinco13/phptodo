<?php

class MyTodoApplication extends Application
{
    protected $login_action = array();

    public function getRootDir()
    {
        return dirname(__FILE__);
    }

    protected function registerRoutes()
    {
        return array(
            '/'                 => array('controller' => 'todo', 'action' => 'welcome'),
            '/todos/new'        => array('controller' => 'todo', 'action' => 'new'),
            '/todos/create'     => array('controller' => 'todo', 'action' => 'create'),
            '/todos/edit/:id'   => array('controller' => 'todo', 'action' => 'edit'),
            '/todos/update'     => array('controller' => 'todo', 'action' => 'update'),
            '/todos/delete'     => array('controller' => 'todo', 'action' => 'delete'),
        );
    }

    protected function configure()
    {
        $this->db_manager->connect('master', array(
            'dsn'       => 'pgsql:dbname=todos;host=postgres',
            'user'      => 'docker',
            'password'  => 'docker',
        ));
    }
}
