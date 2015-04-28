<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View Bowling Ball</h1>

<p><b>Bowling Ball Name:</b> <?= $_TEMPLATES['vars']['ball_name'] ?></p>
<p><b>Manufacturer: </b> <?= $_TEMPLATES['vars']['manufacturer_id'] ?></p> 
<p><b>Data Filepath: </b> <?= $_TEMPLATES['vars']['filepath'] ?></p>
<p><b>Core Symmetric: </b> <?= $_TEMPLATES['vars']['symmetric'] ?></p>
<p><b>RG: </b> <?= $_TEMPLATES['vars']['rg'] ?></p>
<p><b>Differential: </b> <?= $_TEMPLATES['vars']['differential'] ?></p>
<p><b>Color: </b> <?= $_TEMPLATES['vars']['color'] ?></p>
<p><b>Color Stock: </b> <?= $_TEMPLATES['vars']['stock'] ?></p>
<p><b>Team Notes:</b> <?= $_TEMPLATES['vars']['notes'] ?></p>
<p><b>Team Members:</b>

<!--<? //while($data_two= $results_two->fetch_array()) {?>
    <p><b>Team Member:</b><?= $data_two['preferred_name'] ?> <?= $data_two['last_name'] ?></p> 
<? //} ?>-->

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>