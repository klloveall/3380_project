<?php
require_once '../../includes/includes.php';
if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
        $query = "DELETE FROM `pattern` WHERE `id` = '" . $_GET['id'] . "'";
        mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        } else {
            $_TEMPLATES['vars']['success'] = "Bowling center successfully deleted";
             display_bowling_center_listing();
        }
    }
    if (isset($_POST['submit'])) {
        if (!$_POST['bowling_center_name']) {
            $errors['bowling_center_name'] = "Bowling center name required";
        }
        if (isset($errors)) {
            foreach ($errors as $field => $error_message) {
                $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
            }
            require_once $_TEMPLATES['location'] . 'oil_patterns/edit.tpl.php';
            exit();
        }
//        if (isset($_FILES['userfile']['tmp_name']))
//        move_uploaded_file($_FILES['userfile']['tmp_name'], '../../uploads/');
        $query = "
        UPDATE `bowling_center` SET 
            `name` = '" . $_POST['pattern_name'] . "',
            `filepath` = '" . $_POST['file'] . "',
            `location` - '" . $_POST['location'] "',
            `notes` = '" . $_POST['notes'] . "'
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $_TEMPLATES['vars']['success'] = "Bowling Center edited successfully";
        display_bowling_center_listing();
    } else {  // Display single listing edit form
        $query = "
        SELECT
            `name`,
            `filepath`,
            `location`,
            `notes`
        FROM   `bowling_center`
        WHERE `id` = '" . $_GET['id'] . "'
        ";
        $result = mysqli_query($_DB, $query);
        if ($result === false) {
            echo "DB ERROR: " . mysqli_error($_DB);
            exit();
        }
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_POST['bowling_center_name'] = $data['name'];
        $_POST['filepath'] = $data['filepath'];
        $_POST['location'] = $data['location']; 
        $_POST['notes'] = $data['notes'];
        require_once $_TEMPLATES['location'] . 'oil_patterns/edit.tpl.php';
        exit();
    }
} else {
    display_bowling_center_listing();
}
function display_bowling_center_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
        SELECT
            `id`,
            `name`,
            `location`,
            `notes`
        FROM `bowling_center`
        WHERE 1";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['bowling_center'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'oil_patterns/listing.tpl.php';
    exit();
}
