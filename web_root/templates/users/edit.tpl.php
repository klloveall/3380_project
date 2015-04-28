<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Edit User</h1>
<form action="" method="post">
    <label for="name">First Name:</label>
    <input type="text" maxlength="50" name="first_name" value="<?=$_POST['first_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['first_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['first_name'] ?></span>
    <? endif; ?>
	
	<label for="name">Preferred Name:</label>
    <input type="text" maxlength="50" name="preferred_name" value="<?=$_POST['preferred_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['preferred_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['preferred_name'] ?></span>
    <? endif; ?>

	<label for="name">Middle Name:</label>
    <input type="text" maxlength="50" name="middle_name" value="<?=$_POST['middle_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['middle_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['middle_name'] ?></span>
    <? endif; ?>
	
	<label for="name">Last Name:</label>
    <input type="text" maxlength="50" name="last_name" value="<?=$_POST['last_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['last_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['last_name'] ?></span>
    <? endif; ?>
	
	<label for="name">Phone Number:</label>
    <input type="text" maxlength="50" name="phone_number" value="<?=$_POST['cell_phone']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['cell_phone'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['cell_phone'] ?></span>
    <? endif; ?>
	
	<label for="name">Email:</label>
    <input type="text" maxlength="50" name="email" value="<?=$_POST['email']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['email'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['email'] ?></span>
    <? endif; ?>

    <input type="submit" name="submit" value="Edit User" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>