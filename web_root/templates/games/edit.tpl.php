<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Edit Game</h1>
<form action="" method="post">
    <label for="name"> Set ID:</label>
	<select name = "set_id">
	<?php foreach ($_TEMPLATES['vars']['sets'] AS $set): ?>
		
			<option value = "<?=$set['id']?>" > <?=$set['id']?> </option>
  
	<?php endforeach; ?>
	</select>
	
	<label for="name"> User ID:</label>
	<select name = "pattern_id">
	<?php foreach ($_TEMPLATES['vars']['users'] AS $users): ?>
		
			<option value = "<?=$users['id']?>" > <?=$users['preferred_name']?> </option>
  
	<?php endforeach; ?>
	</select>
	<p> <br> </br> </p>
	<label for="game_number">Game Number:</label>
    <textarea name="game_number"><?=$_POST['game_number']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['game_number'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['game_number'] ?></span>
    <? endif; ?>
	
	<label for="time_bowled">Time Bowled (year-month-day hour:min:second):</label>
    <textarea name="time_bowled"><?=$_POST['time_bowled']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['time_bowled'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['time_bowled'] ?></span>
    <? endif; ?>
	
	<label for="baker">Baker:</label>
    <textarea name="baker"><?=$_POST['baker']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['baker'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['baker'] ?></span>
    <? endif; ?>
	
	<label for="scores">Score:</label>
    <textarea name="notes"><?=$_POST['score']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['score'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['score'] ?></span>
    <? endif; ?>
	
    <label for="notes">Notes:</label>
    <textarea name="notes"><?=$_POST['notes']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['notes'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['notes'] ?></span>
    <? endif; ?>

    <input type="submit" name="submit" value="Edit Game" />
</form>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>