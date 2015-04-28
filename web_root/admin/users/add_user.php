<?php
  require_once '../../includes/includes.php';
 
if (isset($_POST['submit'])) {
    if ($_POST['password'] != $_POST['password_confirm']) {
        $errors['password'] = "Password fields must match";
    }
    if (isset($errors)) {
        foreach ($errors as $field => $error_message) {
            $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
        }
        require_once $_TEMPLATES['location'] . 'users/add.pt1.php';
        exit();
    }
//    move_uploaded_file($_FILES['userfile']['tmp_name'], '../../uploads/');
    $query = "
        INSERT INTO `users` (
            `first_name`,
			`preferred_name`,
			`middle_name`,
			`last_name`,
			`cell_phone`,
			`email`,
                        `password`
        ) VALUES (
		    '" . $_POST['first_name'] . "',		
            '" . $_POST['preferred_name'] . "',
			'" . $_POST['middle_name'] . "',	
			'" . $_POST['last_name'] . "',
			'" . $_POST['cell_phone'] . "',
			'" . $_POST['email'] . "',
			'" . md5($_POST['password']) . "'
        )";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $_TEMPLATES['vars']['success'] = "An user added successfully";
    unset($_POST);
}
require_once $_TEMPLATES['location'] . 'users/add.tpl.php';
