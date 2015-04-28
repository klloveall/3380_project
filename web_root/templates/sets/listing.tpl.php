<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Sets</h1>

<?php foreach ($_TEMPLATES['vars']['sets'] as $set): ?>
    <hr />
    <h2><a href='?id=<?=$set['id']?>'></a></h2>
    <p>Notes: <?=$set['notes']?></p>
    <p>
        <a href="view_set.php?id=<?=$set['id']?>">View Set</a><br />
        <a href="edit_set.php?id=<?=$set['id']?>">Edit Set</a><br />
        <a class="delete" href="edit_set.php?id=<?=$set['id']?>&delete=true">Delete Set</a><br />
    </p>

<?php endforeach; ?>
    
<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>
