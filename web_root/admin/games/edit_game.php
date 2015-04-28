<?php
require_once '../../includes/includes.php';
if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
        $query = "DELETE FROM `games` WHERE `id` = '" . $_GET['id'] . "'";
        mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        } else {
            $_TEMPLATES['vars']['success'] = "Game successfully deleted";
            display_team_listing();
        }
    }
    if (isset($_POST['submit'])) {
        if (isset($errors)) {
            foreach ($errors as $field => $error_message) {
                $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
            }
            require_once $_TEMPLATES['location'] . 'games/edit.tpl.php';
            exit();
        }
		
        $query = "
        UPDATE `games` SET 
			`set_id` = '" . $_POST['set_id'] . "',
			`game_number` = '" . $_POST['game_number'] . "',
			`time_bowled` = '" . $_POST['time_bowled'] . "',
			`baker` = '" . $_POST['baker'] . "',
			`user_id` = '" . $_POST['user_id'] . "',
			`score` = '" . $_POST['score'] . "',
            `notes` = '" . $_POST['notes'] . "'
        WHERE `id` = '" . $_GET['id'] . "'
        ";
		
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }	
		
        $_TEMPLATES['vars']['success'] = "Games edited successfully";
        display_team_listing();
    } else {  // Display single listing edit form
        $query = "
		SELECT 
			`id`
		FROM `sets`
		WHERE 1
		";
		$result = mysqli_query($_DB, $query);
		if ($result === false) {
			echo "DB ERROR: " . mysqli_error($_DB);
			exit();
		}
		while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$_TEMPLATES['vars']['sets'][] = $data;
		}	
		
		$query = "
		SELECT 
			`id`,
			`preferred_name`
		FROM `users`
		WHERE 1
		";
		$result = mysqli_query($_DB, $query);
		if ($result === false) {
			echo "DB ERROR: " . mysqli_error($_DB);
			exit();
		}
		while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$_TEMPLATES['vars']['users'][] = $data;
		}	
		
		$query = "
		SELECT
			`id`,
			`set_id`,
			`user_id`,
			`game_number`,
			`time_bowled`,
			`baker`,
			`score`,
			`notes`
		FROM `games`
		where `games`.`id` = '" . $_GET['id'] . "'
		";
			
		$result = mysqli_query($_DB, $query);
		if ($result === false) {
			echo "DB ERROR: " . mysqli_error($_DB);
			exit();
		}
		
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_POST['set_id'] = $data['set_id'];
		$_POST['user_id'] = $data['user_id'];
		$_POST['game_number'] = $data['game_number'];
		$_POST['baker'] = $data['baker'];
		$_POST['time_bowled'] = $data['time_bowled'];
		$_POST['score'] = $data['score'];
        $_POST['notes'] = $data['notes'];
        require_once $_TEMPLATES['location'] . 'games/edit.tpl.php';
        exit();
    }
} else {
    display_team_listing();
}

function display_team_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
	SELECT 
		`games`.`id`,
        `games`.`set_id`,
		`games`.`user_id`,
		`games`.`game_number`;
		`games`.`time_bowled`,
		`games`.`baker`,
		`games`.`score`,
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