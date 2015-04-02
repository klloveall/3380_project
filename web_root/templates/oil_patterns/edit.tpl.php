<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Edit Oil Pattern</h1>
<form action="" method="post">
    <label for="name">Oil Pattern Name:</label>
    <input type="text" maxlength="50" name="pattern_name" value="<?=$_POST['pattern_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['pattern_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['pattern_name'] ?></span>
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

    <input type="submit" name="submit" value="Edit Oil Pattern" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>