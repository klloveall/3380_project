<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View Event</h1>
<p><b>Event Name:</b> <?= $_POST['name'] ?></p>
<p><b>Notes:</b> <?= $_POST['notes'] ?></p>

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>