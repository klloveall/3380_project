<?php

require_once '../../includes/includes.php';

if (isset($_GET['id'])) {
$query = "
	SELECT 
        `teams`.`id` AS `teams_id`,
        `teams`.`name`,
      FROM
 	   `teams`
	 WHERE 1 
";
$results = mysqli_query($_DB, $query);
if ($results === false)
{
	echo "Error reading event: ". mysqli_error($_DB);
	exit();
}
$data = mysqli_fetch_array($results, MYSQLI_ASSOC);

$_POST['teams_id'] = $data['teams_id'];
$_POST['teamname'] = $data['name'];

require_once $_TEMPLATES['location'] . 'team/view.tpl.php';
exit();

} else {
    display_team_listing();
}

function display_oil_pattern_listing() {
    global $_TEMPLATES, $_DB;

$query = "
	SELECT 
        `teams`.`id` AS `teams_id`,
        `teams`.`name`,
        `teams`.`owners`,
        `teams`.`notes`
      FROM
 	   `teams`
	 WHERE `team_id`='" . $_GET['id'] . "'
";
$query_two = "
     SELECT 
        `users`.`id` AS `user_id`,
        `users`.`preferred_name`,
        `users`.`last_name`
     FROM 'team_users' 
	     INNER JOIN `users` ON `team_users`.`user_id` = `user`.`id`  
     WHERE 'team_id'='" . $_GET['id'] . "' 
";

$results = mysqli_query($_DB, $query);
if ($results === false)
{
	echo "Error reading event: ". mysqli_error($_DB);
	exit();
}
$data = mysqli_fetch_array($result, MYSQLI_ASSOC);

$results_two = mysqli_query($_DB, $query_two);
if ($results_two === false)
{
	echo "Error reading event: ". mysqli_error($_DB);
	exit();
}
$data_two = mysqli_fetch_array($results_two, MYSQLI_ASSOC);

require_once $_TEMPLATES['location'] . 'team/listing.tpl.php';
exit(); 

}

