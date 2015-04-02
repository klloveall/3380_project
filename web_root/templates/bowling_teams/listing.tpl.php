<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<h1>View Teams</h1>

<? foreach ($_TEMPLATES['vars']['teams'] as $team): ?>
<h2><a href="?id=<?= $team['teams_id'] ?>"><?= $team['name'] ?></a></h2>  
    <p><b>Notes:</b> <?= $team['notes'] ?></p>
<? endforeach; ?>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>