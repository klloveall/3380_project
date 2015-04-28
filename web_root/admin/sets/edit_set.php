<?php
require_once '../../includes/includes.php';
if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
        $query = "DELETE FROM `sets` WHERE `id` = '" . $_GET['id'] . "'";
        mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        } else {
            $_TEMPLATES['vars']['success'] = "Set successfully deleted";
            display_team_listing();
        }
    }
    if (isset($_POST['submit'])) {
        if (isset($errors)) {
            foreach ($errors as $field => $error_message) {
                $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
            }
            require_once $_TEMPLATES['location'] . 'sets/edit.tpl.php';
            exit();
        }
		
        $query = "
        UPDATE `sets` SET 
			`event_id` = '" . $_POST['event_id'] . "',
			`pattern_id` = '" . $_POST['pattern_id'] . "',
			`center_id` = '" . $_POST['center_id'] . "',
            `notes` = '" . $_POST['notes'] . "'
        WHERE `id` = '" . $_GET['id'] . "'
        ";
		
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }	
		
        $_TEMPLATES['vars']['success'] = "Sets edited successfully";
        display_team_listing();
    } else {  // Display single listing edit form
        $query = "
		SELECT 
			`id`,
			`name`
		FROM `centers`
		WHERE 1
		";
		$result = mysqli_query($_DB, $query);
		if ($result === false) {
			echo "DB ERROR: " . mysqli_error($_DB);
			exit();
		}
		while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$_TEMPLATES['vars']['center'][] = $data;
		}	
		
		$query = "
		SELECT 
			`id`,
			`name`
		FROM `pattern`
		WHERE 1
		";
		$result = mysqli_query($_DB, $query);
		if ($result === false) {
			echo "DB ERROR: " . mysqli_error($_DB);
			exit();
		}
		while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$_TEMPLATES['vars']['pattern'][] = $data;
		}	
		
		$query = "
		SELECT 
			`id`,	
			`name`
		FROM `events`
		WHERE 1
		";
		$result = mysqli_query($_DB, $query);
		if ($result === false) {
			echo "DB ERROR: " . mysqli_error($_DB);
			exit();
		}
		while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$_TEMPLATES['vars']['events'][] = $data;
		}	
		
		$query = "
		SELECT
			`id`,
			`center_id`,
			`event_id`,
			`pattern_id`,
			`notes`
		FROM `sets`
		where `sets`.`id` = '" . $_GET['id'] . "'
		";
			
		$result = mysqli_query($_DB, $query);
		if ($result === false) {
			echo "DB ERROR: " . mysqli_error($_DB);
			exit();
		}
		
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_POST['center_id'] = $data['center_id'];
		$_POST['pattern_id'] = $data['pattern_id'];
		$_POST['event_id'] = $data['event_id'];
        $_POST['notes'] = $data['notes'];
        require_once $_TEMPLATES['location'] . 'sets/edit.tpl.php';
        exit();
    }
} else {
    display_team_listing();
}

function display_team_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
	SELECT 
		`sets`.`id`,
        `sets`.`center_id`,
		`sets`.`pattern_id`,
		`sets`.`event_id`,
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