<?php
  require_once '../../includes/includes.php';
 
if (isset($_POST['submit'])) {
    if (!$_POST['balls_user']) {
        $errors['balls_user'] = "Balls user name required";
    }
    if (isset($errors)) {
        foreach ($errors as $field => $error_message) {
            $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
        }
        require_once $_TEMPLATES['location'] . 'balls_user/add.pt1.php';
        exit();
    }
//    move_uploaded_file($_FILES['userfile']['tmp_name'], '../../uploads/');
    $query = "
        INSERT INTO `balls_user` (
			`balls_user_id`,
            `ball_id`,
			`user_id`,
			`note`
        ) VALUES (
		    '" . $_POST['ball_user_id'] . "',
		    '" . $_POST['ball_id'] . "',	
            '" . $_POST['ball_id'] . "',
            '" . $_POST['user_id'] . "'
        )";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $_TEMPLATES['vars']['success'] = "Balls user added successfully";
    unset($_POST);
}
require_once $_TEMPLATES['location'] . 'balls_user/add.tpl.php';
