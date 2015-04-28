<?php
require_once '../../includes/includes.php';
if (isset($_GET['id'])) {
    $query = "
		SELECT 
			`events`.`name` AS `event_name`,
			`pattern`.`name` AS `pattern_name`,
			`centers`.`name` AS `center_name`,
			`sets`.`notes`
		FROM
			`sets`
			INNER JOIN `events`
			ON `sets`.`event_id` = `events`.`id`
		
			INNER JOIN `pattern`
			ON `sets`.`pattern_id` = `pattern`.`id`
			
			INNER JOIN `centers`
			ON `sets`.`event_id` = `events`.`id`
		
		WHERE `sets`.`id` = '" . $_GET['id'] . "'
";

    $results = mysqli_query($_DB, $query);
    if ($results === false) {
        echo "Error reading event: " . mysqli_error($_DB);
        exit();
    }
    $data = mysqli_fetch_array($results, MYSQLI_ASSOC);
    
    $_TEMPLATES['vars']['center_id'] = $data['center_name'];
    $_TEMPLATES['vars']['event_id'] = $data['event_name'];
	$_TEMPLATES['vars']['pattern_id'] = $data['pattern_name'];
    $_TEMPLATES['vars']['notes'] = $data['notes'];
  
    require_once $_TEMPLATES['location'] . 'sets/view.tpl.php';
    exit();
} else {
    display_team_listing();
}
function display_team_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
	SELECT 
		`sets`.`id`,
		`sets`.`center_id`,
		`sets`.`event_id`,
		`sets`.`pattern_id`,
		`sets`.`notes`
      FROM
 	   `sets`
	 WHERE 1 
	";
	
    $results = mysqli_query($_DB, $query);
    if ($results === false) {
        echo "Error reading event: " . mysqli_error($_DB);
        exit();
    }
	
    while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['sets'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'sets/listing.tpl.php';
    exit();
}

