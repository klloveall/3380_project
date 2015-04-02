<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Events</h1>

<?php foreach ($_TEMPLATES['vars']['events'] as $event): ?>
    <hr />
    <h2><a href='?id=<?=$event['id']?>'><?=$event['name']?></a></h2>
    <p>Notes: <?=$event['notes']?></p>
    <p>
        <a href="view_event.php?id=<?=$event['id']?>">View event</a><br />
        <a href="edit_event.php?id=<?=$event['id']?>">Edit event</a><br />
        <a class="delete" href="edit_event.php?id=<?=$event['id']?>&delete=true">Delete event</a><br />
    </p>

<?php endforeach; ?>
    
<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>