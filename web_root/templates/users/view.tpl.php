<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View User</h1>
<p><b>User First Name:</b> <?= $_TEMPLATES['vars']['first_name'] ?></p>
<p><b>User Preferred Name: </b> <?= $_TEMPLATES['vars']['preferred_name']?></p>
<p><b>Middle Name: </b> <?= $_TEMPLATES['vars']['middle_name']?></p>
<p><b>Last Name: </b> <?= $_TEMPLATES['vars']['last_name']?></p>
<p><b>Phone Number: </b> <?= $_TEMPLATES['vars']['cell_phone']?></p>
<p><b>Email: </b> <?= $_TEMPLATES['vars']['email']?></p>

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>
