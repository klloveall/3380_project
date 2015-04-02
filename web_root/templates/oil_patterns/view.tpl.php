<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View Oil Pattern</h1>
<p><b>Oil Pattern Name:</b> <?= $_POST['pattern_name'] ?></p>
<p><b>PDF File:</b> Currently disabled</p>
<p><b>Notes:</b> <?= $_POST['notes'] ?></p>

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>