<?php
require_once '../../includes/includes.php';
require_login();
if (isset($_GET['id'])) {
    $query = "
			SELECT 
				`users`.`first_name`,
				`users`.`preferred_name`,
				`users`.`middle_name`,
				`users`.`last_name`,
				`users`.`cell_phone`,
				`users`.`email`
			FROM
				`users`
			WHERE `users`.`id` ='" . $_GET['id'] . "'
	";
    $results = mysqli_query($_DB, $query);
    if ($results === false) {
        echo "Error reading event: " . mysqli_error($_DB);
        exit();
    }
    $data = mysqli_fetch_array($results, MYSQLI_ASSOC);

    $_TEMPLATES['vars']['first_name'] = $data['first_name'];
    $_TEMPLATES['vars']['preferred_name'] = $data['preferred_name'];
    $_TEMPLATES['vars']['middle_name'] = $data['middle_name'];
    $_TEMPLATES['vars']['last_name'] = $data['last_name'];
    $_TEMPLATES['vars']['cell_phone'] = $data['cell_phone'];
    $_TEMPLATES['vars']['email'] = $data['email'];

    require_once $_TEMPLATES['location'] . 'users/view.tpl.php';
    exit();
} else {
    display_team_listing();
}

function display_team_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
		SELECT 
			`users`.`id`,
			`users`.`first_name`,
			`users`.`preferred_name`,
			`users`.`middle_name`,
			`users`.`last_name`,
			`users`.`cell_phone`,
			`users`.`email`
		  FROM
		   `users`
		 WHERE 1 
	";
    $results = mysqli_query($_DB, $query);
    if ($results === false) {
        echo "Error reading event: " . mysqli_error($_DB);
        exit();
    }
    while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['users'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'users/listing.tpl.php';
    exit();
}
