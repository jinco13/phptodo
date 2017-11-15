<?php

namespace MyTodo\Models;

class Todo
{
    public function __construct($id=null, $title="", $completed=FALSE) {
        $this->id = $id;
        $this->title = $title;
        $this->completed = $completed;
    }

    public function done() {
        $this->completed = TRUE;
    }
}
