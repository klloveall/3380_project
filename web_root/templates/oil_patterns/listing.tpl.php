<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Oil Patterns</h1>

<?php foreach ($_TEMPLATES['vars']['patterns'] as $pattern): ?>
    <hr />
    <h2><a href='?id=<?=$pattern['id']?>'><?=$pattern['name']?></a></h2>
    <p>Notes: <?=$pattern['notes']?></p>
    <p>
        <a href="view_oil_pattern.php?id=<?=$pattern['id']?>">View oil pattern</a><br />
        <a href="edit_oil_pattern.php?id=<?=$pattern['id']?>">Edit oil pattern</a><br />
        <a class="delete" href="edit_oil_pattern.php?id=<?=$pattern['id']?>&delete=true">Delete oil pattern</a><br />
    </p>

<?php endforeach; ?>
    
<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>