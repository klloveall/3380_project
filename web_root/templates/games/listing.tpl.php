<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Games</h1>

<?php foreach ($_TEMPLATES['vars']['games'] as $games): ?>
    <hr />
    <h2><a href='?id=<?=$games['id']?>'></a></h2>
    <p>Notes: <?=$games['notes']?></p>
    <p>
        <a href="view_game.php?id=<?=$games['id']?>">View Game</a><br />
        <a href="edit_game.php?id=<?=$games['id']?>">Edit Game</a><br />
        <a class="delete" href="edit_game.php?id=<?=$games['id']?>&delete=true">Delete Games</a><br />
    </p>

<?php endforeach; ?>
    
<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>
