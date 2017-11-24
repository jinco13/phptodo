<h1>New Todo</h1>

<form action="/todos/create" method="POST">
    <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
    <input type="text" name="title" value=""/>
    <input type="checkbox" name="completed" value="TRUE"/>
    <input type="submit" value="Save"/>
</form>
