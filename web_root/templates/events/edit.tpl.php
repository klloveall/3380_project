<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Edit Event</h1>
<form action="" method="post">
    <label for="name">Event Name:</label>
    <input type="text" maxlength="50" name="name" value="<?=$_POST['name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['name'] ?></span>
    <? endif; ?>

    <label for="notes">Notes:</label>
    <textarea name="notes"><?=$_POST['notes']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['notes'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['notes'] ?></span>
    <? endif; ?>

    <input type="submit" name="submit" value="Edit Event" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>