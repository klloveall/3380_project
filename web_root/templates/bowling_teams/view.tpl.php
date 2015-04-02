<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>

<html>

<head>
<title> Teams </title>
</head>

<body>
<h1><b>Team Names</b></h1>

<? while ($data = $results->fetch_array()) {?>

<p><b>Team Id:</b><?=$_Post['teams_id']?></p>
<p><b>Team Name:</b><a href="team_information.php?id=<?=$_Post[teams_id]?>"><?=$_Post['teamname']?></a></p>  
  
<? } ?>

</body>
</html>        


<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>