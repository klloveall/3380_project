<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<h1><b>Team Number </b></h1>

<p><b>Team Id:</b> <?= $_TEMPLATES['vars']['teams_id'] ?></p>
<p><b>Team Name:</b> <?= $_TEMPLATES['vars']['name'] ?></p> 
<p><b>Team Owner:</b> <?= $_TEMPLATES['vars']['owners'] ?></p>
<p><b>Team Notes:</b> <?= $_TEMPLATES['vars']['notes'] ?></p>
<p><b>Team Members:</b>

<!--<? //while($data_two= $results_two->fetch_array()) {?>
    <p><b>Team Member:</b><?= $data_two['preferred_name'] ?> <?= $data_two['last_name'] ?></p> 
<? //} ?>-->

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>