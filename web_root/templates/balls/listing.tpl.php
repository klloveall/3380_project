<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Bowling Balls</h1>

<?php foreach ($_TEMPLATES['vars']['balls'] as $ball): ?>
    <hr />
    <h2><a href='?id=<?=$ball['id']?>'><?=$ball['name']?></a></h2>
    <p>Notes: <?=$ball['notes']?></p>
    <p>
        <a href="view_bowling_ball.php?id=<?=$ball['id']?>">View bowling ball</a><br />
        <a href="edit_bowling_ball.php?id=<?=$ball['id']?>">Edit bowling ball</a><br />
        <a class="delete" href="edit_bowling_ball.php?id=<?=$ball['id']?>&delete=true">Delete bowling ball</a><br />
    </p>

<?php endforeach; ?>
    
<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>