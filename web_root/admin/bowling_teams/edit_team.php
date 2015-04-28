<?php

require_once '../../includes/includes.php';
require_login();
if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
        $users = "DELETE FROM `teams_users` WHERE `team_id` = '" . $_GET['id'] . "'";
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
            `owner_id` = '" . $_POST['owner'] . "',
            `notes` = '" . $_POST['notes'] . "'
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
      $query_delete = "
        DELETE
        FROM `teams_users`
        WHERE `team_id` = '" . $_GET['id'] . "'
        ";
        $result_delete = mysqli_query($_DB, $query_delete);
        if ($result_delete === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
    $teamid=$_GET['id'];
    $values = $_POST['bowlers'];
    if(isset($_POST['bowlers'])){
    foreach($values as $v){
    $bowlers = "
        INSERT INTO `teams_users` (
            `team_id`,
            `user_id`
        ) VALUES (
            '" . $teamid . "',
            '" .$v. "'
        )";
    $result_bowlers = mysqli_query($_DB, $bowlers);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    }
    }
        $_TEMPLATES['vars']['success'] = "Bowling Team edited successfully";
        display_team_listing();
    } else {  // Display single listing edit form
        $query = "
        SELECT
            `name`,
            `owner_id`,
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
        $_POST['owner'] = $data['owner_id'];
        $_POST['notes'] = $data['notes'];

        $query_user = "
        SELECT
        `users`.`preferred_name` AS `name`,
        `users`.`id`
        FROM
        `users`
        WHERE 1
        ";
        $results_user = mysqli_query($_DB, $query_user);
        if ($results_user === false) {
            echo "Error reading event: " . mysqli_error($_DB);
            exit();
        }
        while ($data_user = mysqli_fetch_array($results_user, MYSQLI_ASSOC)) {
            $_TEMPLATES['vars']['bowlers'][] = $data_user;
        }

        $query_bowler = "
        SELECT
        `teams_users`.`user_id`
        FROM
        `teams_users`
        WHERE `team_id`= '" . $_GET['id'] . "'
        ";
        $results_bowler = mysqli_query($_DB, $query_bowler);
        if ($results_bowler === false) {
            echo "Error reading event: " . mysqli_error($_DB);
            exit();
        }
        while ($data_bowler = mysqli_fetch_array($results_bowler, MYSQLI_ASSOC)) {
             $_POST['users'][]= $data_bowler['user_id'];
        }

        require_once($_TEMPLATES['location'] . 'bowling_teams/edit.tpl.php');
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
