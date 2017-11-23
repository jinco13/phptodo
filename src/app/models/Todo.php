<?php

class Todo
{
    public function __construct($id=null, $title="", $completed=FALSE)
    {
        $this->id = $id;
        $this->title = $title;
        $this->completed = $completed;
        $this->created_at = new DateTime();
    }

    public function done()
    {
        $this->completed = TRUE;
    }
}
