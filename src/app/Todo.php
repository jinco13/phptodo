<?php

namespace MyTodo;

class Todo
{
    public function __construct() {
      $this->title = "";
      $this->completed = false;
    }

    public function done() {
      $this->completed = true;
    }
}
