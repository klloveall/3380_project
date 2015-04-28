<?php

date_default_timezone_set("America/Chicago");
$_DB = mysqli_connect('localhost', 'u3380', 'h898efRG842', '3380project');
session_start('3380Project8');

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

if (!isset($_SESSION['user_id']) && isset($_POST['login_username'])) {
    echo "Running here!";
    $query = "
        SELECT
            `id`,
            `password`
        FROM `users`
        WHERE `email` = '" . $_POST['login_username'] . "'";
    $result = mysqli_query($_DB, $query);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    print_r($data);
    if ($data['password'] == md5($_POST['login_password'])) {
        $_SESSION['user_id'] = $data['id'];
    } else {
        $_TEMPLATES['vars']['error'] = "Password incorrect";
        require_once $_TEMPLATES['location'] . 'login.tpl.php';
        exit();
    }
}

function require_login() {
    echo "I'm running!";
    global $_TEMPLATES;
    print_r($_SESSION);
    if (!isset($_SESSION['user_id'])) {
        require_once $_TEMPLATES['location'] . 'login.tpl.php';
        exit();
    }
}