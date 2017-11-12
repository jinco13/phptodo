<?php

namespace MyTodo;

class Todo
{
    public function __construct() {
      $this->title = "";
      $this->completed = FALSE;
    }

    public function done() {
      $this->completed = TRUE;
    }
}
