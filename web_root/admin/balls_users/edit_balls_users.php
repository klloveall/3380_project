<?php
//
require_once '../../includes/includes.php';

if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
        $query = "DELETE FROM `balls_users`  WHERE `id` = '" . $_GET['id'] . "'";
        mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        } else {
            $_TEMPLATES['vars']['success'] = "Ball User successfully deleted";
            display_ball_user_listing();
        }
    }

    if (isset($_POST['submit'])) {
        if (!$_POST['ball_user_name']) {
            $errors['ball_user_name'] = "Ball user name required";
        }
        if (isset($errors)) {
            foreach ($errors as $field => $error_message) {
                $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
            }
            require_once $_TEMPLATES['location'] . 'balls_users/edit.tpl.php';
            exit();
        }

//        if (isset($_FILES['userfile']['tmp_name']))
//        move_uploaded_file($_FILES['userfile']['tmp_name'], '../../uploads/');

        $query = "
        UPDATE `balls_users` SET 
            
            
        `ball_id`='" .$_POST['ball_user_name']."',
        `drill_pattern_filename`= '" . $_POST['filepath']."',
         `user_id`= '" .  $_POST['user_id']."',
         `custom_name`= '" .  $_POST['custom_name']."',
         `pearlized`= '" . $_POST['pearlized']."',
        `notes` = '" . $_POST['notes'] . "',
        WHERE `id`    = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $_TEMPLATES['vars']['success'] = "Ball edited successfully";
        display_ball_user_listing();
    } else {  // Display single listing edit form
        $query = "
        SELECT
            `ball_id`,
            `user_id`,
            `drill_pattern_filename`,
            `custom_name`,
            `pearlized`,
            `notes`
        FROM   `balls_users`
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_POST['ball_user_name'] = $data['name'];
        $_POST['filepath'] = $data['filepath'];
        $_POST['user_id'] = $data['user_id'];
        $_POST['custom_name'] = $data['custom_name'];
        $_POST['pearlized'] = $data['pearlized'];
        $_POST['notes'] = $data['notes'];

        require_once $_TEMPLATES['location'] . 'balls_users/edit.tpl.php';
        exit();
    }
} else {
    display_ball_user_listing();
}

function display_ball_user_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
        SELECT
            `id`,
            `ball_id`,
            `user_id`,
            `drill_pattern_filename`,
            `custom_name`,
            `pearlized`,
            `notes`
        FROM `balls_users`
        WHERE 1";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['balls_users'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'balls_users/listing.tpl.php';
    exit();
}
