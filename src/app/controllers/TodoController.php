<?php

class TodoController extends Controller
{
    public function welcomeAction()
    {
        $list = $this->db_manager->get('Todo')->fetchAllTodos();
        return $this->render(array(
            '_token' => $this->generateCsrfToken('todo/welcome'),
            'list' => $list
        ));
    }
}
