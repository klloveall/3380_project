<?php
require_once '../../includes/includes.php';
if (isset($_GET['id'])) {
    $query = "
		SELECT 
			`games`.`set_id`,
			`games`.`user_id`,
			`games`.`game_number`,
			`games`.`time_bowled`,
			`games`.`baker`,
			`games`.`scrore`,
			`games`.`notes`
		FROM
			`games`		
		WHERE `games`.`id` = '" . $_GET['id'] . "'
";

    $results = mysqli_query($_DB, $query);
    if ($results === false) {
        echo "Error reading event: " . mysqli_error($_DB);
        exit();
    }
    $data = mysqli_fetch_array($results, MYSQLI_ASSOC);
    
    $_TEMPLATES['vars']['set_id'] = $data['set_id'];
	$_TEMPLATES['vars']['user_id'] = $data['user_id'];
    $_TEMPLATES['vars']['game_number'] = $data['game_number'];
	$_TEMPLATES['vars']['time_bowled'] = $data['time_bowled'];
	$_TEMPLATES['vars']['baker'] = $data['baker'];
	$_TEMPLATES['vars']['scrore'] = $data['scrore'];
    $_TEMPLATES['vars']['notes'] = $data['notes'];
  
    require_once $_TEMPLATES['location'] . 'games/view.tpl.php';
    exit();
} else {
    display_team_listing();
}
function display_team_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
	SELECT 
		`games`.`set_id`,
		`games`.`user_id`,
		`games`.`game_number`,
		`games`.`time_bowled`,
		`games`.`baker`,
		`games`.`scrore`,
		`games`.`notes`
      FROM
 	   `games`
	 WHERE 1 
	";
	
    $results = mysqli_query($_DB, $query);
    if ($results === false) {
        echo "Error reading event: " . mysqli_error($_DB);
        exit();
    }
	
    while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['games'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'games/listing.tpl.php';
    exit();
}

