<?php

require_once '../../includes/includes.php';
require_login();

if (isset($_POST['submit'])) {
    if (!$_POST['team_name']) {
        $errors['team_name'] = "Team name required";
    }
    if (isset($errors)) {
        foreach ($errors as $field => $error_message) {
            $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
        }
        require_once $_TEMPLATES['location'] . 'bowling_teams/add.tpl.php';
        exit();
    }

    
    $query = "
        INSERT INTO `teams` (
            `name`,
            `owner_id`,
            `notes`
        ) VALUES (
            '" . $_POST['team_name'] . "',
            '" .$_POST['owner']. "',
            '" . $_POST['notes'] . "'
        )";
    $result = mysqli_query($_DB, $query);
    $teamid=mysqli_insert_id($_DB);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }

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
    $_TEMPLATES['vars']['success'] = "Bowling team added successfully";
    unset($_POST);
}
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
require_once $_TEMPLATES['location'] . 'bowling_teams/add.tpl.php';
