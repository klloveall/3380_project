<?php

require_once '../../includes/includes.php';

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
            NULL,
            '" . $_POST['notes'] . "'
        )";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $_TEMPLATES['vars']['success'] = "Bowling team added successfully";
    unset($_POST);
}
require_once $_TEMPLATES['location'] . 'bowling_teams/add.tpl.php';