<h1>Welcome! This is test<?php echo $_SERVER['REMOTE_ADDR'] ?></h1>
<a href="/todos/new">Add Todo</a><br/>
<ul>
<?php foreach($list as $todo): ?>
<li>
    <?php if ($todo->completed) { ?><strike><?php } ?>
    <?php echo $todo->title; ?>(<?php echo $todo->getCreatedDate() ?>)
    <?php if ($todo->completed) { ?></strike><?php } ?>
</li>
<?php endforeach; ?>
</ul>
