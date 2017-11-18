<?php

class TodoController extends Controller
{
    public function welcomeAction()
    {
        return $this->render(array(
            '_token' => $this->generateCsrfToken('todo/welcome'),
        ));
    }
}
