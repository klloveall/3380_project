<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View Bowling Ball User </h1>

  <p><b>Bowling Ball Name:</b> <?= $_POST['ball_user_name'] ?></p>
   <p><b>User ID:</b> <?= $_POST['user_id'] ?></p>
   <p><b>PDF File:</b> Currently disabled</p>
   <p><b>Custom Name:</b> <?= $_POST['custom_name'] ?></p>
   <p><b>Pearlized:</b> <?= $_POST['pearlized'] ?></p>
<p><b>Ball Notes:</b> <?= $_POST['notes'] ?></p>



<!--<? //while($data_two= $results_two->fetch_array()) {?>
    <p><b>Team Member:</b><?= $data_two['preferred_name'] ?> <?= $data_two['last_name'] ?></p> 
<? //} ?>-->

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>