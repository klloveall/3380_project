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
            $_TEMPLATES['vars']['success'] = "An user is successfully deleted";
            display_team_listing();
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
        $_POST['pattern_name'] = $data['name'];
        $_POST['filepath'] = $data['owner_id'];
        $_POST['notes'] = $data['notes'];
        require_once $_TEMPLATES['location'] . 'bowling_teams/edit.tpl.php';
        exit();
    }
} else {
    display_team_listing();
}
function display_team_listing() {
$query = "
	SELECT 
        `teams`.`id` AS `teams_id`,
        `teams`.`name`,
      FROM
 	   `teams`
	 WHERE 1 
";
$results = mysqli_query($_DB, $query);
if ($results === false)
{
	echo "Error reading event: ". mysqli_error($_DB);
	exit();
}
$data = mysqli_fetch_array($results, MYSQLI_ASSOC);
$_POST['teams_id'] = $data['teams_id'];
$_POST['teamname'] = $data['name'];
require_once $_TEMPLATES['location'] . 'team/view.tpl.php';
exit();   
}
