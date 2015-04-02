<?php
  require_once '../../includes/includes.php';
 
if (isset($_POST['submit'])) {
    if (!$_POST['bowling_center_name']) {
        $errors['bowling_center_name'] = "Bowling center name required";
    }
    if (isset($errors)) {
        foreach ($errors as $field => $error_message) {
            $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
        }
        require_once $_TEMPLATES['location'] . 'bowling_centers/add.tpl.php';
        exit();
    }
//    move_uploaded_file($_FILES['userfile']['tmp_name'], '../../uploads/');
    $query = "
        INSERT INTO `bowling_centers` (
            `name`,
            `location`,
            `notes`
        ) VALUES (
            '" . $_POST['pattern_name'] . "',
            '" . $_POST['location'] . "',
            '" . $_POST['notes'] . "'
        )";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $_TEMPLATES['vars']['success'] = "Bowling Center added successfully";
}
require_once $_TEMPLATES['location'] . 'bowling_centers/add.tpl.php';
