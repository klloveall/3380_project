<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View Bowling Ball</h1>

  <p><b>Bowling Ball Name:</b> <?= $_POST['ball_name'] ?></p>
   <p><b>Manufacturer:</b> <?= $_POST['manufacturer_id'] ?></p>
   <p><b>PDF File:</b> Currently disabled</p>
   <p><b>Core Symmetric:</b> <?= $_POST['symmetric'] ?></p>
   <p><b>RG:</b> <?= $_POST['rg'] ?></p>
   <p><b>Differential:</b> <?= $_POST['differential'] ?></p>
   <p><b>Color:</b> <?= $_POST['color'] ?></p>
   <p><b>Color Stock:</b> <?= $_POST['stock'] ?></p>
<p><b>Ball Notes:</b> <?= $_POST['notes'] ?></p>



<!--<? //while($data_two= $results_two->fetch_array()) {?>
    <p><b>Team Member:</b><?= $data_two['preferred_name'] ?> <?= $data_two['last_name'] ?></p> 
<? //} ?>-->

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>