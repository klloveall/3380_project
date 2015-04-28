<?php

require_once '../../includes/includes.php';
require_login();

if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
        $query = "DELETE FROM `events` WHERE `id` = '" . $_GET['id'] . "'";
        mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        } else {
            $_TEMPLATES['vars']['success'] = "Events successfully deleted";
            display_event_listing();
        }
    }

    if (isset($_POST['submit'])) {
        if (!$_POST['name']) {
            $errors['name'] = "Event name required";
        }
        if (isset($errors)) {
            foreach ($errors as $field => $error_message) {
                $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
            }
            require_once $_TEMPLATES['location'] . 'events/edit.tpl.php';
            exit();
        }

        $query = "
        UPDATE `events` SET 
            `name` = '" . $_POST['name'] . "',
            `notes` = '" . $_POST['notes'] . "'
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $_TEMPLATES['vars']['success'] = "Event edited successfully";
        display_event_listing();
    } else {  // Display single listing edit form
        $query = "
        SELECT
            `name`,
            `notes`
        FROM `events`
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_POST['name'] = $data['name'];
        $_POST['notes'] = $data['notes'];

        require_once $_TEMPLATES['location'] . 'events/edit.tpl.php';
        exit();
    }
} else {
    display_event_listing();
}

function display_event_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
        SELECT
            `id`,
            `name`,
            `notes`
        FROM `events`
        WHERE 1";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['events'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'events/listing.tpl.php';
    exit();
}
