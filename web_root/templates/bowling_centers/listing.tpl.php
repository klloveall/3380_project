<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Bowling Centers</h1>

<?php foreach ($_TEMPLATES['vars']['centers'] as $centers): ?>
    <hr />
    <h2><a href='?id=<?=$centers['id']?>'><?=$centers['name']?></a></h2>
    <p>Notes: <?=$centers['notes']?></p>
    <p>
        <a href="view_bowling_center.php?id=<?=$centers['id']?>">View Bowling Centers</a><br />
        <a href="edit_bowling_center.php?id=<?=$centers['id']?>">Edit Bowling Centers</a><br />
        <a class="delete" href="edit_bowling_center.php?id=<?=$centers['id']?>&delete=true">Delete Bowling Centers</a><br />
    </p>

<?php endforeach; ?>
    
<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>
