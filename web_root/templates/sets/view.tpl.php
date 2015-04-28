<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View Set</h1>
<p><b>Center ID:</b> <?= $_TEMPLATES['vars']['center_id'] ?></p>
<p><b>Pattern ID:</b> <?= $_TEMPLATES['vars']['pattern_id'] ?></p>
<p><b>Event ID:</b> <?= $_TEMPLATES['vars']['event_id'] ?></p>
<p><b>Notes:</b> <?= $_TEMPLATES['vars']['notes'] ?></p>

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>
