<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Bowling Balls Users</h1>

<?php foreach ($_TEMPLATES['vars']['balls_users'] as $ball): ?>
    <hr />
    <h2><a href='?id=<?=$ball['id']?>'><?=$ball['name']?></a></h2>
    <p>Notes: <?=$ball['notes']?></p>
    <p>
        <a href="view_ball_user.php?id=<?=$ball['id']?>">View bowling ball user</a><br />
        <a href="edit_ball_user.php?id=<?=$ball['id']?>">Edit bowling ball user </a><br />
        <a class="delete" href="edit_ball_user.php?id=<?=$ball['id']?>&delete=true">Delete bowling ball user</a><br />
    </p>

<?php endforeach; ?>
    
<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>