<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<h1>Teams</h1>

<? foreach ($_TEMPLATES['vars']['teams'] as $team): ?>
    <h2><a href="?id=<?= $team['teams_id'] ?>"><?= $team['name'] ?></a></h2>  
    <p><b>Notes:</b> <?= $team['notes'] ?></p>
    <p>
        <a href="view_team.php?id=<?=$team['teams_id']?>">View Team</a><br />
        <a href="edit_team.php?id=<?=$team['teams_id']?>">Edit Team</a><br />
        <a class="delete" href="edit_team.php?id=<?=$team['teams_id']?>&delete=true">Delete Team</a><br />
    </p>
<? endforeach; ?>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>