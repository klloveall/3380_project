<?php
//
require_once '../../includes/includes.php';

if (isset($_POST['submit'])) {
    if (!$_POST['ball_user_name']) {
        $errors['ball_user_name'] = "Ball User name required";
    }
    if (isset($errors)) {
        foreach ($errors as $field => $error_message) {
            $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
        }
        require_once $_TEMPLATES['location'] . 'balls_users/add.tpl.php';
        exit();
    }
//    move_uploaded_file($_FILES['userfile']['tmp_name'], '../../uploads/');

    $query = "
        INSERT INTO `balls_users` (
            `ball_id`,
            `user_id`,
            `drill_pattern_filename`,
            `custom_name`,
            `pearlized`,
            `notes`
        ) VALUES (
        '" . $_POST['ball_user_name'] . "',
        '" . $_POST['user_id'] . "',
    '" . $_POST['filepath'] . "',
    '" . $_POST['custom_name'] . "',

    '" . $_POST['pearlized'] . "',   
            '" . $_POST['notes'] . "'
        )";
    print_r($query);
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $_TEMPLATES['vars']['success'] = "Ball Users added successfully";
    unset($_POST);
}
require_once $_TEMPLATES['location'] . 'balls_users/add.tpl.php';