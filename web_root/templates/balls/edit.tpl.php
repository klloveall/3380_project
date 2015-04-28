<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Edit Bowling Ball</h1>
<form action="" method="post">
    <label for="name">Bowling Ball Name:</label>
    <input type="text" maxlength="50" name="ball_name" value="<?=$_POST['ball_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['ball_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['ball_name'] ?></span>
    <? endif; ?>

    <label for="file">PDF File:</label>
    <input type="file" name="file" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['file'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['file'] ?></span>
    <? endif; ?>

    <label for="notes">Notes:</label>
    <textarea name="notes"><?=$_POST['notes']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['notes'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['notes'] ?></span>
    <? endif; ?>

    <input type="submit" name="submit" value="Edit Bowling Ball" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>