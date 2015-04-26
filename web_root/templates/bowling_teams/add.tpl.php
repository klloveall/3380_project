<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<h1>Add New Bowling Team</h1>

<form action="" method="post">
    <label for="name">Bowling Team Name:</label>
    <input type="text" maxlength="50" name="team_name" 
value="<?=$_POST['team_name']?>" />

<? if (isset($_TEMPLATES['vars']['form_errors']['team_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['team_name'] ?></span>
    <? endif; ?>

<!--<form action="" method="post">
    <label for="owner">Owner Name:</label>
    <input type="text" maxlength="50" owner="owner" 
value="<?=$_POST['owner']?>" />

<? if (isset($_TEMPLATES['vars']['form_errors']['owner'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['owner'] ?></span>
    <? endif; ?>-->

<label for="notes">Notes:</label>
    <textarea name="notes"><?=$_POST['notes']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['notes'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['notes'] ?></span>
    <? endif; ?>

<input type="submit" name="submit" value="Add Team" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>





 