<?php

require_once '../../includes/includes.php';

if (isset($_POST['submit'])) {
    if (!$_POST['pattern_name']) {
        $errors['pattern_name'] = "Pattern name required";
    }
    if (isset($errors)) {
        foreach ($errors as $field => $error_message) {
            $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
        }
        require_once $_TEMPLATES['location'] . 'oil_patterns/add.tpl.php';
        exit();
    }
//    move_uploaded_file($_FILES['userfile']['tmp_name'], '../../uploads/');

    $query = "
        INSERT INTO `pattern` (
            `name`,
            `filepath`,
            `notes`
        ) VALUES (
            '" . $_POST['pattern_name'] . "',
            '" . $_POST['file'] . "',
            '" . $_POST['notes'] . "'
        )";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $_TEMPLATES['vars']['success'] = "Oil pattern added successfully";
}
require_once $_TEMPLATES['location'] . 'oil_patterns/add.tpl.php';
