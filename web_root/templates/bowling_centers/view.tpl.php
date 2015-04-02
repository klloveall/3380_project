<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View Bowling Center</h1>
<p><b>Bowling Center Name:</b> <?= $_POST['center_name'] ?></p>
<p><b>Location: </b> <?= $_POST['location']?></p>
<p><b>Notes:</b> <?= $_POST['notes'] ?></p>

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>
