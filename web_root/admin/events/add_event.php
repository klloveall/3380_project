<?php

require_once '../../includes/includes.php';
require_login();

if (isset($_POST['submit'])) {
    if (!$_POST['name']) {
        $errors['name'] = "Event name required";
    }
    if (isset($errors)) {
        foreach ($errors as $field => $error_message) {
            $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
        }
        require_once $_TEMPLATES['location'] . 'events/add.tpl.php';
        exit();
    }
    
    $query = "
        INSERT INTO `events` (
            `name`,
            `notes`
        ) VALUES (
            '" . $_POST['name'] . "',
            '" . $_POST['notes'] . "'
        )";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $_TEMPLATES['vars']['success'] = "Event added successfully";
    unset($_POST);
}
require_once $_TEMPLATES['location'] . 'events/add.tpl.php';
