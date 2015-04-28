<?php

date_default_timezone_set("America/Chicago");
$_DB = mysqli_connect('localhost', 'u3380', 'h898efRG842', '3380project');

if (!$_DB) {
    echo "ERROR!" . mysqli_error($_DB);
    die('Could not connect to MySQL DB: ' . mysqli_connect_error($_DB));
}

$_POST = escape_variable_recursive($_POST);
$_GET = escape_variable_recursive($_GET);

function escape_variable_recursive($var) {
    global $_DB;
    if (is_array($var)) {
        foreach ($var as $key => $data) {
            $var[$key] = escape_variable_recursive($data);
        }
    } else {
        $var = mysqli_real_escape_string($_DB, $var);
    }
    return $var;
}

$_TEMPLATES['location'] = dirname(__FILE__) . '/../templates/';
$_TEMPLATES['root_path'] = '/tracker/';

require_once 'classes/authentication.class.php';
