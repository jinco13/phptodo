<h1>Welcome! This is test<?php echo $_SERVER['REMOTE_ADDR'] ?></h1>
<a href="/todos/new">Add Todo</a><br/>
<ul>
<?php foreach($list as $todo): ?>
<li>
    <a href='/todos/edit/<?php echo $todo->id; ?>'>
        <?php if ($todo->completed) { ?><strike><?php } ?>
        <?php echo htmlspecialchars($todo->title, ENT_QUOTES, 'UTF-8'); ?>(<?php echo $todo->getCreatedDate() ?>)
        <?php if ($todo->completed) { ?></strike><?php } ?>
    </a>
</li>
<?php endforeach; ?>
</ul>
