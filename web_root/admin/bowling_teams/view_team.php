<?php

require_once '../../includes/includes.php';
require_login();
if (isset($_GET['id'])) {
    $query = "
	SELECT 
        `teams`.`id` AS `teams_id`,
        `teams`.`name`,
        CONCAT(`users`.`preferred_name`, `users`.`last_name`) AS `owner_name`,
        `teams`.`notes`,
        CONCAT(`team_members`.`preferred_name`, `team_members`.`last_name`) AS `member_name`
      FROM
 	   `teams`
           LEFT JOIN `users` ON `teams`.`owner_id` = `users`.`id`
           LEFT JOIN `teams_users` ON `teams`.`id` = `teams_users`.`team_id`
           LEFT JOIN `users` AS `team_members` ON `teams_users`.`user_id` = `team_members`.`id`
	 WHERE `teams`.`id` ='" . $_GET['id'] . "'
";
//    $query_two = "
//     SELECT 
//        `users`.`id` AS `user_id`,
//        `users`.`preferred_name`,
//        `users`.`last_name`
//     FROM `teams_users`
//	     INNER JOIN `users` ON `teams_users`.`user_id` = `users`.`id`  
//     WHERE 'team_id'='" . $_GET['id'] . "' 
//";

    $results = mysqli_query($_DB, $query);
    if ($results === false) {
        echo "Error reading event: " . mysqli_error($_DB);
        exit();
    }
    $data = mysqli_fetch_array($results, MYSQLI_ASSOC);

    $_TEMPLATES['vars']['teams_id'] = $data['teams_id'];
    $_TEMPLATES['vars']['name'] = $data['name'];
    $_TEMPLATES['vars']['owner_name'] = $data['owner_name'];
    $_TEMPLATES['vars']['notes'] = $data['notes'];

    $_TEMPLATES['vars']['members'][] = $data['member_name'];
    while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['members'][] = $data['member_name'];
    }



//    $results_two = mysqli_query($_DB, $query_two);
//    if ($results_two === false) {
//        echo "Error reading event: " . mysqli_error($_DB);
//        exit();
//    }
//    $data_two = mysqli_fetch_array($results_two, MYSQLI_ASSOC);

    require_once $_TEMPLATES['location'] . 'bowling_teams/view.tpl.php';
    exit();
} else {
    display_team_listing();
}

function display_team_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
	SELECT 
        `teams`.`id` AS `teams_id`,
        `teams`.`name`,
        `teams`.`notes`
      FROM
 	   `teams`
	 WHERE 1 
";
    $results = mysqli_query($_DB, $query);
    if ($results === false) {
        echo "Error reading event: " . mysqli_error($_DB);
        exit();
    }

    while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['teams'][] = $data;
    }

    require_once $_TEMPLATES['location'] . 'bowling_teams/listing.tpl.php';
    exit();
}
