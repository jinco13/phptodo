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

    }
}
