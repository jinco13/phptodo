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
            '/' => array('controller' => 'todo', 'action' => 'welcome'),
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
