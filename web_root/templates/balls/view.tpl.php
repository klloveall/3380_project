<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View Bowling Ball</h1>
<p><b>Bowling Ball Name:</b> <?= $_POST['ball_name'] ?></p>
<p><b>PDF File:</b> Currently disabled</p>
<p><b>Notes:</b> <?= $_POST['notes'] ?></p>

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>