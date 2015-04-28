 <?php
  require_once '../../includes/includes.php';
 
if (isset($_POST['submit'])) {

    if (isset($errors)) {
        foreach ($errors as $field => $error_message) {
            $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
        }
        require_once $_TEMPLATES['location'] . 'games/add.pt1.php';
        exit();
    }
//    move_uploaded_file($_FILES['userfile']['tmp_name'], '../../uploads/');
    
	$query = "
        INSERT INTO `games` (
            `set_id`,
			`time_bowled`,
			`baker`,
			`user_id`,
            `game_number`,
            `score`,
            `notes`
        ) VALUES (
            '" . $_POST['set_id'] . "',
			'" . $_POST['time_bowled'] . "',
            '" . $_POST['baker'] . "',
            '" . $_POST['user_id'] . "',
			'" . $_POST['game_number'] . "',
			'" . $_POST['score'] . "',
			'" . $_POST['notes'] . "'
        )";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
	
    $_TEMPLATES['vars']['success'] = "Game is added successfully!";
    unset($_POST);
}

$query = "
		SELECT 
			`id`
		FROM `sets`
		WHERE 1
";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$_TEMPLATES['vars']['sets'][] = $data;
}	

$query = "
		SELECT 
			`id`
		FROM `users`
		WHERE 1
";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$_TEMPLATES['vars']['users'][] = $data;
}

require_once $_TEMPLATES['location'] . 'games/add.tpl.php';
