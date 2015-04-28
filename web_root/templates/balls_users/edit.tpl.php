<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Edit Bowling Ball User </h1>
<form action="" method="post">
    <label for="name"> Ball User Name:</label>
    <input type="text" maxlength="50" name=“ball_user_name" value="<?=$_POST['ball_user_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['ball_user_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['ball_user_name'] ?></span>
    <? endif; ?>

  <label for="name"> User ID:</label>
    <input type="text" maxlength="50" name=“user_id" value="<?=$_POST['user_id']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['user_id'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['user_id'] ?></span>
    <? endif; ?>

    <label for="file">PDF File:</label>
    <input type="file" name="drill_pattern_filename" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['drill_pattern_filename'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['drill_pattern_filename'] ?></span>
    <? endif; ?>

<label for="name"> Custom Name:</label>
    <input type="text" maxlength="50" name=“custom_name" value="<?=$_POST['custom_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['custom_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['custom_name'] ?></span>
    <? endif; ?>

<label for="name"> Pearlized:</label>
    <input type="text" maxlength="50" name=“pearlized" value="<?=$_POST['pearlized']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['pearlized'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['pearlized'] ?></span>
    <? endif; ?>


    <label for="notes">Notes:</label>
    <textarea name="notes"><?=$_POST['notes']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['notes'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['notes'] ?></span>
    <? endif; ?>


    <input type="submit" name="submit" value="Edit Bowling Ball User" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>