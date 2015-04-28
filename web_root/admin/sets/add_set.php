<?php
  require_once '../../includes/includes.php';
require_login();
 
if (isset($_POST['submit'])) {

    if (isset($errors)) {
        foreach ($errors as $field => $error_message) {
            $_TEMPLATES['vars']['form_errors'][$field] = $error_message;
        }
        require_once $_TEMPLATES['location'] . 'sets/add.pt1.php';
        exit();
    }
//    move_uploaded_file($_FILES['userfile']['tmp_name'], '../../uploads/');
    
	$query = "
        INSERT INTO `sets` (
            `event_id`,
            `pattern_id`,
            `center_id`,
            `notes`
        ) VALUES (
            '" . $_POST['event_id'] . "',
            '" . $_POST['pattern_id'] . "',
            '" . $_POST['center_id'] . "',
			'" . $_POST['notes'] . "'
        )";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
	
    $_TEMPLATES['vars']['success'] = "Set is added successfully!";
    unset($_POST);
}

$query = "
		SELECT 
			`id`,
			`name`
		FROM `centers`
		WHERE 1
";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$_TEMPLATES['vars']['center'][] = $data;
}	
$query = "
		SELECT 
			`id`,
			`name`
		FROM `centers`
		WHERE 1
";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$_TEMPLATES['vars']['center'][] = $data;
}	

$query = "
		SELECT 
			`id`,
			`name`
		FROM `pattern`
		WHERE 1
";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$_TEMPLATES['vars']['pattern'][] = $data;
}	

$query = "
		SELECT 
			`id`,
			`name`
		FROM `events`
		WHERE 1
";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$_TEMPLATES['vars']['event'][] = $data;
}

require_once $_TEMPLATES['location'] . 'sets/add.tpl.php';

/*
<html>
<body>
<select>

  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
  
</select>
</body>
</html>
*/
