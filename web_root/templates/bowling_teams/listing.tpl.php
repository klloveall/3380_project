<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<html>

<head>
<title> Team Info </title>
</head>

<body>
<h1><b>Team Number </b></h1>

<p><b>Team Id:</b><?=$data['teams_id']?></p>
<p><b>Team Name:</b><?=$data['name']?></p> 
<p><b>Team Owner:</b><?=$data['owners']?></p>
<p><b>Team Notes:</b><?=$data['notes']?></p>
<p><b>Team Members:</b>

<? while($data_two= $results_two->fetch_array()) {?>
<p><b>Team Member:</b><?=$data_two['preferred_name']?> <?=$data_two['last_name']?></p> 
<? } ?>

<a href="?">Back to listing</a>

</body>
</html>        

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>