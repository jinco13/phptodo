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

    public function editAction($params)
    {
        $todo = $this->db_manager->get('Todo')->findTodo($params['id']);
        return $this->render(array(
            'todo' => $todo,
            '_token' => $this->generateCsrfToken('todos/edit'),
        ));
    }

    public function deleteAction($params)
    {
        $this->db_manager->get('Todo')->deleteTodo($this->request->getPost('id'));
        return $this->redirect('/');
    }

    public function updateAction()
    {
        if (!$this->request->isPost()) {
            $this->forward404();
        }

        $id = $this->request->getPost('id');
        $token = $this->request->getPost('_token');
        if (!$this->checkCsrfToken('todos/edit', $token)) {
            return $this->redirect('/todos/edit/' . $id);
        }

        $todo = $this->db_manager->get('Todo')->findTodo($id);
        $todo->title = $this->request->getPost('title');
        $todo->setCompleted($this->request->getPost('completed'));

        $updated = $this->db_manager->get('Todo')->update($todo);

        return $this->redirect('/');
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
        $todo->setCompleted($this->request->getPost('completed'));

        //// TODO error check

        $id = $this->db_manager->get('Todo')->insert($todo);

        return $this->redirect('/');
    }

    public function newAction()
    {
        return $this->render(array(
            '_token' => $this->generateCsrfToken('todos/new'),
        ));
    }
}
