<?php

class Todo
{
    public function __construct($id=null, $title="", $completed=FALSE, $created_at = null)
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

    public function getCreatedDate()
    {
        return $this->created_at->format('Y/m/d');
    }

    public function setCompleted($status = "")
    {
        if ($status === "TRUE") {
            $this->completed = TRUE;
        } else {
            $this->completed = FALSE;
        }
    }
}
