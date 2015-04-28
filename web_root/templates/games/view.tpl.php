<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>View Game</h1>
<p><b>Set ID:</b> <?= $_TEMPLATES['vars']['set_id'] ?></p>
<p><b>User ID:</b> <?= $_TEMPLATES['vars']['user_id'] ?></p>
<p><b>Game Number:</b> <?= $_TEMPLATES['vars']['game_number'] ?></p>
<p><b>Time Bowled:</b> <?= $_TEMPLATES['vars']['time_bowled'] ?></p>
<p><b>Baker:</b> <?= $_TEMPLATES['vars']['baker'] ?></p>
<p><b>Score:</b> <?= $_TEMPLATES['vars']['scrore'] ?></p>
<p><b>Note:</b> <?= $_TEMPLATES['vars']['notes'] ?></p>

<a href="?">Back to listing</a>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>