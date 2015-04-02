<?php

require_once '../../includes/includes.php';

if (isset($_GET['id'])) {
    $query = "
        SELECT
            `name`,
            `notes`
        FROM `events`
        WHERE `id` = '" . $_GET['id'] . "'
        ";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_POST['name'] = $data['name'];
    $_POST['notes'] = $data['notes'];

    require_once $_TEMPLATES['location'] . 'events/view.tpl.php';
    exit();
} else {
    display_event_listing();
}

function display_event_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
        SELECT
            `id`,
            `name`,
            `notes`
        FROM `events`
        WHERE 1";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['events'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'events/listing.tpl.php';
    exit();
}
