<h1>Edit Todo</h1>
<form action="/todos/update" method="POST">
    <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
    <input type="hidden" name="id" value="<?php echo $todo->id ?>"/>
    <input type="text" name="title" value="<?php echo $todo->title ?>"/>
    <input type="checkbox" name="completed" value="TRUE" <?php echo $todo->getCompletedCheck();?>/><br/>
    <label>Created At: <?php echo $todo->getCreatedDate() ?></label>
    <br/>

    <input type="submit" value="Update"/>
</form>
<form action="/todos/delete" method="POST">
    <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
    <input type="hidden" name="id" value="<?php echo $todo->id ?>"/>
    <input type="submit" value="Delete"/>
</form>
