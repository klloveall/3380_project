a<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<h1>Add New Set</h1>

<form action="" method="post">
    <label for="name"> Center ID:</label>
	<select name = "center_id">
	<?php foreach ($_TEMPLATES['vars']['center'] AS $center): ?>
		
			<option value = "<?=$center['id']?>" > <?=$center['name']?> </option>
  
	<?php endforeach; ?>
	</select>
	
	<label for="name"> Pattern ID:</label>
	<select name = "pattern_id">
	<?php foreach ($_TEMPLATES['vars']['pattern'] AS $pattern): ?>
		
			<option value = "<?=$pattern['id']?>" > <?=$pattern['name']?> </option>
  
	<?php endforeach; ?>
	</select>
	
	<label for="name"> Event ID:</label>
	<select name = "event_id">
	<?php foreach ($_TEMPLATES['vars']['event'] AS $event): ?>
		
			<option value = "<?=$event['id']?>" > <?=$event['name']?> </option>
  
	<?php endforeach; ?>
	</select>
	
    <label for="notes">Notes:</label>
    <textarea name="notes"><?=$_POST['notes']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['notes'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['notes'] ?></span>
    <? endif; ?>

    <input type="submit" name="submit" value="Add Set" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>
