<?php
require_once '../../includes/includes.php';
if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
        $query = "DELETE FROM `users` WHERE `id` = '" . $_GET['id'] . "'";
        mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        } else {
            $_TEMPLATES['vars']['success'] = "User successfully deleted";
            display_team_listing();
        }
    }
    if (isset($_POST['submit'])) {
  //      if (!$_POST['team_name']) {
  //          $errors['team_name'] = "Bowling team name required";
  //      }
        if (isset($errors)) {
            foreach ($errors as $field => $error_message) {
                $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
            }
            require_once $_TEMPLATES['location'] . 'users/edit.tpl.php';
            exit();
        }
        $query = "
        UPDATE `users` SET 
			`first_name` = '" . $_POST['first_name'] . "',
			`preferred_name` = '" . $_POST['preferred_name'] . "',
			`middle_name`` = '" . $_POST['middle_name'] . "',
			`last_name` = '" . $_POST['last_name'] . "',
			`cell_phone` = '" . $_POST['cell_phone'] . "',
            `email` = '" . $_POST['email'] . "'
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $_TEMPLATES['vars']['success'] = "User edited successfully";
        display_team_listing();
    } else {  // Display single listing edit form
        $query = "
        SELECT
            `first_name`,
			`preferred_name`,
			`middle_name`,
			`last_name`,
			`cell_phone`,
			`email`
        FROM   `users`
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_POST['first_name'] = $data['first_name'];
        $_POST['preferred_name'] = $data['preferred_name'];
		$_POST['middle_name'] = $data['middle_name'];
		$_POST['last_name'] = $data['last_name'];
		$_POST['cell_phone'] = $data['cell_phone'];
        $_POST['email'] = $data['email'];
        require_once $_TEMPLATES['location'] . 'users/edit.tpl.php';
        exit();
    }
} else {
    display_team_listing();
}

function display_team_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
	SELECT 
        `users`.`id` AS `users_id`,
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