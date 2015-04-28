<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<h1>Add New Bowling Ball</h1>

<form action="" method="post">
    <label for="name"> Ball Name:</label>
    <input type="text" maxlength="50" name="ball_name" value="<?=$_POST['ball_name']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['ball_name'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['ball_name'] ?></span>
    <? endif; ?>

  <label for="name"> Manufacturer ID:</label>
    <input type="text" maxlength="50" name="manufacturer_id" value="<?=$_POST['manufacturer_id']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['manufacturer_id'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['manufacturer_id'] ?></span>
    <? endif; ?>

    <label for="file">PDF File:</label>
    <input type="file" name="filepath" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['filepath'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['filepath'] ?></span>
    <? endif; ?>

<label for="name"> Core Symmetric:</label>
    <input type="text" maxlength="50" name="symmetric" value="<?=$_POST['symmetric']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['symmetric'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['symmetric'] ?></span>
    <? endif; ?>

<label for="name"> RG:</label>
    <input type="text" maxlength="50" name="rg" value="<?=$_POST['rg']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['rg'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['rg'] ?></span>
    <? endif; ?>

<label for="name"> Differential:</label>
    <input type="text" maxlength="50" name="differential" value="<?=$_POST['differential']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['differential'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['differential'] ?></span>
    <? endif; ?>

<label for="name"> Color:</label>
    <input type="text" maxlength="50" name="color" value="<?=$_POST['color']?>" />
    <? if (isset($_TEMPLATES['vars']['form_errors']['color'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['color'] ?></span>
    <? endif; ?>

<label for="name"> Color Stock:</label>    
    
<select name="stock">
  <option value="">Select...</option>
  <option value="plastic">Plastic</option>
  <option value="urethane">Urethane</option>
   <option value="reactive_resin">Reactive Resin</option>
   <option value="urethane">Urethane</option>
   <option value="solid_reactive">Solid Reactive</option>
    <option value="hybird_reactive">Hybrid Reactive</option>
   <option value="particle">Particle</option>
</select>
<br> </br>
    <label for="notes">Notes:</label>
    <textarea name="notes"><?=$_POST['notes']?></textarea>
    <? if (isset($_TEMPLATES['vars']['form_errors']['notes'])): ?>
        <span class="error"><?= $_TEMPLATES['vars']['form_errors']['notes'] ?></span>
    <? endif; ?>

    <input type="submit" name="submit" value="Add Bowling Ball" />
</form>


<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>