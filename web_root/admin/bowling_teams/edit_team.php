<?php

require_once '../../includes/includes.php';

if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
        $query = "DELETE FROM `teams` WHERE `id` = '" . $_GET['id'] . "'";
        mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        } else {
            $_TEMPLATES['vars']['success'] = "Bowling team successfully deleted";
            display_team_listing();
        }
    }

    if (isset($_POST['submit'])) {
        if (!$_POST['team_name']) {
            $errors['team_name'] = "Bowling team name required";
        }
        if (isset($errors)) {
            foreach ($errors as $field => $error_message) {
                $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
            }
            require_once $_TEMPLATES['location'] . 'bowling_teams/edit.tpl.php';
            exit();
        }

        $query = "
        UPDATE `teams` SET 
            `name` = '" . $_POST['team_name'] . "',
            `notes` = '" . $_POST['notes'] . "'
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $_TEMPLATES['vars']['success'] = "Bowling Team edited successfully";
        display_team_listing();
    } else {  // Display single listing edit form
        $query = "
        SELECT
            `name`,
            `notes`
        FROM   `teams`
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_POST['team_name'] = $data['name'];
//        $_POST['owner'] = $data['owner_id'];
        $_POST['notes'] = $data['notes'];
        require_once $_TEMPLATES['location'] . 'bowling_teams/edit.tpl.php';
        exit();
    }
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
