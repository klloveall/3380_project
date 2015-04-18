
<?php
require_once '../../includes/includes.php';
if (isset($_GET['id'])) {
    $query = "
		SELECT 
			`balls_user`.`user_id`,
			`balls_user`.`balls_id`,
			`balls_user`.`notes`
		FROM
			`balls_user`
		WHERE `balls_user`.`id` ='" . $_GET['id'] . "'
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
    
    $_TEMPLATES['vars']['user_id'] = $data['user_id'];
    $_TEMPLATES['vars']['balls_id'] = $data['balls_id'];
    $_TEMPLATES['vars']['notes'] = $data['notes'];
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
        `balls_user`.`id` AS `balls_user_id`,
        `balls_user`.`user_id`,
        `balls_user`.`notes`,
		`balls_user`.`balls_id`
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
