<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<h1>Add New Bowling Center</h1>

<form action="" method="post">
    <label for="name">Bowling Center Name:</label>
    <input type="text" maxlength="50" name="bowling_center_name" value="<?=$_POST['bowling_center_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['bowling_center_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['bowling_center_name'] ?></span>
    <? endif; ?>

    <label for="file">PDF File:</label>
    <input type="file" name="file" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['file'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['file'] ?></span>
    <? endif; ?>
    
    <label for="notes">Notes:</label>
    <input type="text" maxlength="100" name="location" value="<?=$_POST['location']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['location'])): ?>
      <span class="error"><?= $_TEMPLATES['vars']['form_errors']['location'] ?></span>
    <? endif; ?>
    
    <label for="notes">Notes:</label>
    <textarea name="notes"><?=$_POST['notes']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['notes'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['notes'] ?></span>
    <? endif; ?>

    <input type="submit" name="submit" value="Add Bowling Center" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>
