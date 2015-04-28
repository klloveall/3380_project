<?php
require_once 'includes/includes.php';

unset($_SESSION['user_id']);

$_TEMPLATES['vars']['success'] = "You have been logged out";

require_once $_TEMPLATES['location'] . 'index.tpl.php';