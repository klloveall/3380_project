<?php

date_default_timezone_set("America/Chicago");
$_DB = mysqli_connect('localhost', 'u3380', 'h898efRG842', '3380project');

if (!$_DB) { 
    echo "ERROR!" . mysqli_error($_DB);
    die('Could not connect to MySQL DB: ' . mysqli_connect_error($_DB)); 
} 

foreach ($_POST as $key => $value) {
	$_POST[$key] = mysqli_real_escape_string($_DB, $value);
}
foreach ($_GET as $key => $value) {
	$_GET[$key] = mysqli_real_escape_string($_DB, $value);
}

$_TEMPLATES['location'] = dirname(__FILE__) . '/../templates/';
$_TEMPLATES['root_path'] = '/tracker/';

require_once 'classes/authentication.class.php';