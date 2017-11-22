<?php

class TodoController extends Controller
{
    public function welcomeAction()
    {
        $list = $this->db_manager->get('Todo')->fetchAllTodos();
        return $this->render(array(
            'list' => $list
        ));
    }

    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->forward404();
        }

        $token = $this->request->getPost('_token');
        if (!$this->checkCsrfToken('todos/new', $token)) {
            return $this->redirect('/todos/new');
        }

        $todo = new Todo();
        $todo->title = $this->request->getPost('title');
        $todo->completed = $this->request->getPost('completed');

        //// TODO error check

        $this->db_manager->get('Todo')->insert($todo);
        //return $this->render(array());
        return $this->redirect('/todos/new');
    }

    public function newAction()
    {
        return $this->render(array(
            '_token' => $this->generateCsrfToken('todos/new'),
        ));
    }
}
