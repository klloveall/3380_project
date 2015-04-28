<?php

require_once '../../includes/includes.php';
require_login();

if (isset($_GET['id'])) {
    $query = "
        SELECT
            `name`,
            `filepath`,
            `notes`
        FROM   `pattern`
        WHERE `id` = '" . $_GET['id'] . "'
        ";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_POST['pattern_name'] = $data['name'];
    $_POST['filepath'] = $data['filepath'];
    $_POST['notes'] = $data['notes'];

    require_once $_TEMPLATES['location'] . 'oil_patterns/view.tpl.php';
    exit();
} else {
    display_oil_pattern_listing();
}

function display_oil_pattern_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
        SELECT
            `id`,
            `name`,
            `notes`
        FROM `pattern`
        WHERE 1";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['patterns'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'oil_patterns/listing.tpl.php';
    exit();
}
